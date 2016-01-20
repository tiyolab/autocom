<?php

namespace app\controllers;

use Yii;
use mPDF;
use app\models\PegawaiPayroll;
use app\models\PaymentPayroll;
use app\models\SecretaryForm;
use app\models\PeminjamanPayroll;
use app\controllers\Payroll\Penggajian;

class PayrollController extends SecureController
{
    public function actionIndex()
    {
        $request = Yii::$app->request;

        switch ($request->get('do')) {
            case 'table':
                echo json_encode(
                    $this->dtablePenggajian($request->post())
                    );
                break;
            case 'detail':
                return $this->renderPartial('payment_details', [
                    'details' => (new PaymentPayroll())->getDetails($request->get('id'))
                    ]);
                break;
            case 'create':
                if($request->isPost)
                {
                    (new PaymentPayroll())->createNew($request->post());
                    return $this->render('page_payment');
                }
                else
                {
                    return $this->render('page_payment_create');
                }
                break;
            
            default:
                return $this->render('page_payment');
                break;
        }
    }

    public function actionCetak_slip()
    {
        $request = Yii::$app->request;

        $do = $request->get('do');
        $id = $request->get('id');

        switch ($do) {
            case 'info':
                $payment = new PaymentPayroll();

                header('Content-type:application/json');

                if(!is_numeric($id))
                {
                    echo json_encode(
                        ['success' => false]
                        );
                }
                else
                {
                    $success = false;
                    $data = $payment->getPaymentDate($id);

                    $array_bulan = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni",
                        "Juli", "Agustus", "September", "Oktober", "November", "Desember");

                    if(empty($data))
                    {
                        echo json_encode(
                            ['success' => false]
                            );
                        return;
                    }

                    $i = 0;
                    foreach ($data as $val) {
                        $php_date = strtotime($val->tgl_terima);
                        $bln = intval(date('m', $php_date));
                        $thn = date('Y', $php_date);

                        $json[$i]['value'] = $val->id;
                        $json[$i++]['name'] = $array_bulan[$bln]." ".$thn;
                    }

                    echo json_encode(array(
                        'success' => true,
                        'name' => (new PegawaiPayroll())->getFullName($id),
                        'select' => $json
                        ));
                }
                break;
            case 'pdf':
                if(!is_numeric($id))
                {
                    echo "wrong args";
                    die();
                }

                $mpdf = new mPDF;
                $mpdf->AddPage('L');
                $mpdf->WriteHTML($this->renderPartial('slip_gaji_pdf'));
                $mpdf->Output();
                exit;
                break;

            default:
                return $this->render('page_cetak_slip');
                break;
        }
    }

    private function dtablePenggajian($request)
    {
        $payment = new PaymentPayroll();
        
        $draw = $request['draw'];
        $start = $request['start'];
        $length = $request['length'];
        $a_total = $payment->getCount();

        if(!empty($request['search']['value']))
        {
            $s_key = $request['search']['value'];
        }
        else
        {
            $s_key = null;
        }
        
        if($s_key == null)
        {
            $dump_data = $payment->getDumpData($start, $length);
            $v_total = $payment->getDumpData($start, $length, '', true);
        }
        else
        {
            $dump_data = $payment->getDumpData($start, $length, $s_key);
            $v_total = $payment->getDumpData($start, $length, $s_key, true);
        }

        $i_penggajian = 0;
        $e_penggajian = array();
        foreach($dump_data as $e_data)
        {
            $e_penggajian[$i_penggajian++] =  [
                                        'id' => $e_data['id'],
                                        'id_pegawai' => $e_data['id_pegawai'],
                                        'nip' => $e_data['nip'],
                                        'nama_lengkap' => $e_data['nama_lengkap'],
                                        'status_persetujuan' => ((1 == $e_data['status_persetujuan']) ? 'Ya' : 'Belum'),
                                        'status_penerimaan' => ((1 == $e_data['status_penerimaan']) ? 'Ya' : 'Belum'),
                                        'tgl_terima' => date("d-m-Y", strtotime($e_data['tgl_terima'])),
                                        'tgl_cair' => date("d-m-Y", strtotime($e_data['tgl_terima'])),
                                        'action' => "<button class=\"btn btn-sm btn-primary\" data-toggle=\"modal\" onclick=\"showDetailPayment("
                                            .$e_data['id'].")\" data-target=\"#modal-popup\"><i class=\"fa fa-edit\"></i> Details</button>"
                                    ];
        }

        return (object) array(
                'draw' => intval($draw),
                'recordsTotal' => intval($a_total),
                'recordsFiltered' => intval($v_total),
                'data'=> $e_penggajian
                );
    }
}

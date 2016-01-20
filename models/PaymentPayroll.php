<?php namespace app\models;

use Yii;
use yii\db\Query;
use app\models\DataGajiPayroll;
use app\models\PegawaiPayroll;
use app\models\PaymentExtendsPayroll;
/**
 * This is the model class for table "module".
 *
 * @property integer $id
 * @property string $name
 *
 * @property RoleModule[] $roleModules
 */
class PaymentPayroll extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payment_history';
    }

    public static function primaryKey()
    {
       return 'id';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status_persetujuan', 'status_penerimaan', 'tgl_terima', 'gaji_per_jam_lembur',
             'jam_lembur', 'gaji_pokok', 'jumlah_tunjangan', 'id_pegawai'], 'required'],
            [['tgl_terima', 'tgl_cair'], 'date', 'format' => 'yyyy-M-d']
        ];
    }

    public function createNew($request_post)
    {
        $data_gaji = new DataGajiPayroll();
        $data_gaji->updateInformation($request_post);

        foreach ((new PegawaiPayroll())->getAllId() as $val) {
            $this->clonePaymentData(
                $val->id_pegawai, 
                $request_post
                );
        }
    }

    private function clonePaymentData($id_pegawai, $request_post)
    {

        $data_gaji_val = DataGajiPayroll::find()
            ->where(['id_pegawai' => $id_pegawai])
            ->one();

        $payment = new PaymentPayroll();

        $payment->status_persetujuan = false;
        $payment->status_penerimaan = false;
        $payment->tgl_terima = date('Y-m-d');
        $payment->gaji_per_jam_lembur = $data_gaji_val->gaji_per_jam_lembur;
        $payment->jam_lembur = $data_gaji_val->jam_lembur;
        $payment->gaji_pokok = $data_gaji_val->gaji_pokok;
        $payment->jumlah_tunjangan = ($data_gaji_val->tunjangan_per_tanggungan *
                $data_gaji_val->tanggungan_keluarga);
        $payment->id_pegawai = $id_pegawai;
        $payment->insert();

        $check_exist = $this->find()
                            ->where(['id_pegawai' => $id_pegawai])
                            ->exists();

        if($check_exist)
        {
            $peminjaman = new PeminjamanPayroll();

            $payment_extends = new PaymentExtendsPayroll();
            $payment_extends->id_payment = $payment->id;
            $payment_extends->transportasi = $request_post['transportasi'];
            $payment_extends->makan = $request_post['makan'];
            $payment_extends->peminjaman = $peminjaman->getTotalPeminjaman($id_pegawai);
            $payment_extends->bpjs = $request_post['bpjs'];
            $payment_extends->jamsostek = $request_post['jamsostek'];
            $payment_extends->pajak = $request_post['pajak'];

            $peminjaman->buatPinjamanLunas($id_pegawai);
            
            $payment_extends->insert();
        }
    }

    public function setApproved($id_payment)
    {
        return $this->updateAll(
            [
             'status_persetujuan' => true],
             'id = '.$id_payment
            );
    }

    public function setTaked($id_payment)
    {
        return $this->updateAll(
            [
             'status_penerimaan' => true],
             'id = '.$id_payment
            );
    }

    public function getPaymentDate($id_pegawai)
    {
       return $this->find()
            ->select('DISTINCT(tgl_terima), id')
            ->where(['id_pegawai' => $id_pegawai])
            ->groupBy('tgl_terima')
            ->all();
    }

    public function getCount()
    {
        return $this->find()->count();
    }

    public function getDataRange($start = 0, $length = -1)
    {
        return ((object) $this->find()
            ->limit($length)
            ->offset($start)
            ->all());
    }

    public function getDumpData($start = 0, $length = -1, $s_key = null, $count = false)
    {
        $query = new Query();

        $sql = $query
            ->select("payment_history.id, payment_history.id_pegawai, pegawai.nip, pegawai.nama_lengkap,
                    payment_history.status_persetujuan, payment_history.status_penerimaan,
                    payment_history.tgl_terima, payment_history.tgl_cair")
            ->from('payment_history')
            ->innerJoin('pegawai', 'payment_history.id_pegawai = pegawai.id_pegawai')
            ->limit($length)
            ->offset($start)
            ->orderBy('payment_history.id DESC');

        if(!empty($s_key))
        {
            $sql->andWhere("payment_history.id LIKE '%"
                .$s_key."%' OR payment_history.id_pegawai LIKE '%".$s_key."%' OR pegawai.nip LIKE '%"
                .$s_key."%' OR pegawai.nama_lengkap LIKE '%".$s_key."%'");
        }

        if($count)
        {
            return $sql->count();
        }

        return $sql->all();
    }

    public function getDetails($id_payment)
    {

        $query = new Query();

        $sql = $query
            ->select("PAY.id AS id_payment, PEG.id_pegawai, PEG.nip, PEG.nama_lengkap, PEG.gelar_dpn, PEG.gelar_blk, 
                DEP.nama_departement, JAB.nama_jabatan, TIN.tingkatan, PAY.status_persetujuan, PAY.status_penerimaan, 
                PAY.tgl_terima, PAY.tgl_cair, PAY.gaji_pokok, PAY.jumlah_tunjangan, PAY.gaji_per_jam_lembur, 
                PAY.jam_lembur, PAE.transportasi, PAE.makan, PAE.peminjaman, PAE.bpjs, PAE.jamsostek, PAE.pajak")
            ->from('payment_history AS PAY')
            ->innerJoin('payment_data_extends AS PAE', 'PAE.id_payment = PAY.id')
            ->innerJoin('pegawai AS PEG', 'PEG.id_pegawai = PAY.id_pegawai')
            ->innerJoin('departement AS DEP', 'DEP.id_departement = PEG.id_departement')
            ->innerJoin('jabatan AS JAB', 'JAB.id_jabatan = PEG.id_jabatan')
            ->innerJoin('tingkatan AS TIN', 'TIN.id_tingkatan = PEG.id_tingkatan')
            ->andWhere('PAY.id = '.$id_payment);

        $results = $sql->one();

        if(is_array($results))
        {
            $pajak = $results['gaji_pokok'] * $results['pajak'] / 100;
            $lembur = $results['gaji_per_jam_lembur'] * $results['jam_lembur'];
            $total = $results['gaji_pokok'] + $results['jumlah_tunjangan'] + $lembur
                    + $results['transportasi'] + $results['makan'] - $results['peminjaman']
                    - $results['bpjs'] - $results['jamsostek'] - $pajak;

            $next_calc = array(
                'tgl_terima' => $this->newDate($results['tgl_terima']),
                'tgl_cair' => $this->newDate($results['tgl_cair']),
                'total_pajak' => $pajak,
                'lembur' => $lembur,
                'total' => $total
                );

            $results = array_merge($results, $next_calc);
        }

        return $results;
    }

    private function newDate($mysql_date)
    {
        $array_bulan = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni",
            "Juli", "Agustus", "September", "Oktober", "November", "Desember");
        $php_date = strtotime($mysql_date);

        return (date('d', $php_date)." ".$array_bulan[intval(date('m', $php_date))]
            ." ".date('Y', $php_date));
    }
}

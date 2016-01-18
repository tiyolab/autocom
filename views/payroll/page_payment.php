<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

$this->title = 'Payment History';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-login">
    <div class="col-lg-12">
        <div class="widget widget-green">
            <div class="widget-title">
                <div class="widget-controls">
                    <a href="#" class="widget-control widget-control-full-screen" data-toggle="tooltip" data-placement="top" title="" data-original-title="Full Screen"><i class="fa fa-expand"></i></a>
                    <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="fa fa-minus-circle"></i></a>
                </div>
                <h3><i class="fa fa-table"></i> <?= $this->title; ?></h3>
            </div>
            <div class="widget-content" style="min-height:420px;padding-left: 15px;">
                <button id="create-payment" class="btn btn-primary" style="margin-bottom:22px;">
                    <i class="fa fa-plus-square"></i> Buat Penggajian 
                </button>
                <table id="penggajian-pegawai"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ID</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Diterima?</th>
                            <th>Disetujui?</th>
                            <th>Tgl Diterima</th>
                            <th>Tgl Disetujui</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?= Yii::$app->request->BaseUrl ?>/assets/js/ajax/jquery.min.js"></script>
<script type="text/javascript">
var tbl = $('#penggajian-pegawai');

var dTable = tbl.DataTable({
        serverSide: true,
        processing: true,
        ajax: {
            url: "<?= Yii::$app->request->BaseUrl ?>/payroll?do=table",
            type: 'POST',
            data:{
                '_csrf': '<?= Yii::$app->request->csrfToken; ?>'
            },
        },
        columns: [
            { data: 'id' },
            { data: 'id_pegawai' },
            { data: 'nip' },
            { data: 'nama_lengkap' },
            { data: 'status_persetujuan' },
            { data: 'status_penerimaan' },
            { data: 'tgl_terima' },
            { data: 'tgl_cair' },
            { data: 'action' }
        ],
        lengthMenu: [[10, 20, 50], [10, 20, 50]]
    });

tbl.removeClass('display').addClass('table table-striped table-bordered');

var showDetailPayment = function(paymentId){
    $.get("<?= Yii::$app->request->BaseUrl ?>/payroll?do=detail&id=" + paymentId, function(data, status){
        if(status == 'success'){
            $('#modal-popup').find('.modal-content').html(data);
        }
    });
};

$("#create-payment").click(function(){
    location.replace("<?= Yii::$app->request->BaseUrl ?>/payroll?do=create");
});
</script>
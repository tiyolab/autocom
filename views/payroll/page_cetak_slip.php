<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;

$this->title = 'Cetak Slip Gaji';
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
                <div class="col-sm-4">
                    <form action="" role="form" onsubmit="return false;">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Nomor Pegawai</label>
                                    <input type="number" name="id_pegawai" class="form-control" placeholder="ID Pegawai">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12" style="padding-left:0;">
                            <div class="form-group">
                                <label>A.N.</label> <span class="text-danger">Input first</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Pilih Tanggal Pembayaran</label>
                            <select name="id_payment" class="form-control">
                                <option>Berikan id pegawai..</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-eye"></i> Lihat slip
                        </button>
                        <div class="alert alert-warning" style="margin-top:15px">
                          <i class="fa fa-exclamation-circle"></i>
                          Silahkan mencetak atau mengunduh slip gaji pada menu sebelah kanan!
                        </div>
                    </form>
                </div>
                <div id="display-pdf" class="col-sm-8 table-bordered" style="min-height:380px;margin:0;padding:0">
                    <div style="position:absolute;left:40%;top:50%">                        
                        <i class="fa fa-info"></i> Slip akan ditampilkan disini.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?= Yii::$app->request->BaseUrl ?>/assets/js/ajax/jquery.min.js"></script>
<script type="text/javascript">
var formValid = false;
checkValidAndReadyToShowUp();

$("form").find("input[name=id_pegawai]").keyup(function(){
    formValid = false;
    checkValidAndReadyToShowUp();

    $.ajax({
        type: 'GET',
        url: '<?= Yii::$app->request->BaseUrl ?>/payroll/cetak_slip?do=info',
        data: { 'id': $(this).val() },
        success: function(response){      
            var data = $.parseJSON(response);
            var dataNama = 'Tidak ditemukan';
            var dataHtmlSelect = 'Berikan id yang benar';

            if(data.success){
                formValid = true;

                dataNama = data.name;
                dataHtmlSelect = '';
                for (var i = 0; i < data.select.length; i++) {
                    var a = data.select[i].value;
                    dataHtmlSelect += "<option value=\"" + data.select[i].value + "\">" + data.select[i].name + "</option>";
                }
            }

            $($('form').find('span')).html(dataNama);
            $($('form').find('select')).html(dataHtmlSelect);
        },
        error: function(request,status,errorThrown) {
            console.log("call Login ajax failed with error, status:" + status + " errorThrown:" + errorThrown);
            console.log("call Login ajax failed with errorCode : " + request.status);

            $($('form').find('span')).html('Error');
            $($('form').find('select')).html('<option value=\""\">Error..</option>');
        }
    });
});

function checkValidAndReadyToShowUp(){
    $('form').unbind('submit');

    $('form').submit(function(){
        if(!formValid){
            alert('Silahkan periksa apakah data sudah benar!');
        }else{
            $('#display-pdf').html(
                "<embed src=\"http://localhost/sim/web/payroll/cetak_slip?do=pdf&id="
                + $(this).find('select').val() +"\" type=\"application/pdf\" internalinstanceid=\"134\" title=\"\" style=\""
                + "position: absolute;width: 100%;height: 100%;\">");
        }
    });
}
</script>
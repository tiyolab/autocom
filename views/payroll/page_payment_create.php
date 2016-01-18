<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\DataGajiPayroll;
use app\models\PaymentExtendsPayroll;

$this->title = 'Buat penggajian';
$this->params['breadcrumbs'][] = $this->title;

$data_gaji = (new DataGajiPayroll())->getLastRow();
$payment_ext = (new PaymentExtendsPayroll())->getLastRow();
?>

<div class="merchant-info">
    <form id="form-create-payment" class="form-horizontal" method="post">
        <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
        <div style="float:right">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-check-square-o"></i>
                Tambah
            </button>
            <button type="button" class="btn btn-default">
                <i class="fa fa-rotate-left"></i>
                Kembali
            </button>
        </div>
        <div class="widget-title">
            <h2 class="page-title page-title-hard-bordered">
                <i class="fa fa-pencil-square-o"></i> <?= $this->title ?>
            </h2>
        </div>
        <div class="widget-content" style="min-height:450px">
            <div class="form-group">
                <div class="col-lg-offset-3 col-lg-6">
                    <div class="alert alert-warning alert-dismissable">
                        <i class="fa fa-exclamation-circle"></i>
                        <strong>Pengaturan default untuk seluru pegawai</strong>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-5 control-label">Tunjangan (per)</label>
                <div class="col-lg-3">
                    <?= Html::input('number', 'tunjangan_per_tanggungan', $data_gaji['tunjangan_per_tanggungan'], ['class' => 'form-control', 'required' => true]) ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-5 control-label">Gaji lembur (per)</label>
                <div class="col-lg-3">
                    <?= Html::input('number', 'gaji_per_jam_lembur', $data_gaji['gaji_per_jam_lembur'], ['class' => 'form-control', 'required' => true]) ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-5 control-label">Uang transportasi</label>
                <div class="col-lg-3">
                    <?= Html::input('number', 'transportasi', $payment_ext['transportasi'], ['class' => 'form-control', 'required' => true]) ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-5 control-label">Uang makan</label>
                <div class="col-lg-3">
                    <?= Html::input('number', 'makan', $payment_ext['makan'], ['class' => 'form-control', 'required' => true]) ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-5 control-label">BPJS</label>
                <div class="col-lg-3">
                    <?= Html::input('number', 'bpjs', $payment_ext['bpjs'], ['class' => 'form-control', 'required' => true]) ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-5 control-label">Jamsostek</label>
                <div class="col-lg-3">
                    <?= Html::input('number', 'jamsostek', $payment_ext['jamsostek'], ['class' => 'form-control', 'required' => true]) ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-5 control-label">Pajak (%)</label>
                <div class="col-lg-3">
                    <?= Html::input('number', 'pajak', $payment_ext['pajak'], ['class' => 'form-control', 'required' => true, 'max' => 50]) ?>
                </div>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript">
$("button[type=button]").click(function(){
    location.replace("<?= Yii::$app->request->BaseUrl ?>/payroll");
});

$("#form-create-payment").submit(function(){
    return confirm("Penggajian akan dibuat sekarang?");
});
</script>
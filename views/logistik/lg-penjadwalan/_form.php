<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\logistic\LgPenjadwalan;
use app\models\logistic\LgKendaraan;
use app\models\logistic\LgPegawai;

/* @var $this yii\web\View */
/* @var $model app\models\logistic\LgPengiriman */
/* @var $form yii\widgets\ActiveForm */

$model = new LgPenjadwalan();
foreach ( $model->findPenjadwalan() as $key=> $value);
    $kode = $value['kode'];
    $tgl1 = $value['date_order_placed'];
    $tgl2 = date('Y-m-d', strtotime('+3 days', strtotime($tgl1)));
?>

    <?php $form = ActiveForm::begin(); ?>
   
    <?= $form->field($model, 'tgl_pengiriman')->textInput(['readonly' => true , 'value'=>$tgl2]) ?>

    <?= $form->field($model, 'kendaraan')->dropdownList(LgKendaraan::find()->select(['nomor_polisi', 'kode'])->indexBy('kode')->column(),['prompt'=>'Select Kendaraan']); ?>

    <?= $form->field($model, 'kurir')->dropdownList(LgPegawai::find()->select(['nama_lengkap', 'id_pegawai'])->indexBy('id_pegawai')->column(),['prompt'=>'Select Pegawai']); ?>
    
   <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'update' : 'Submit', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

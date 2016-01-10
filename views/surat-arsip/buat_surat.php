<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Surat;

$model = new Surat();

$form = ActiveForm::begin([
    'id' => 'buatsurat',
    'options' => ['class' => 'form'],
]) ?>

<?= $form->field($model, 'nomor_surat') ?>
<?php // $form->field($model, 'id_jenis_surat') ?>

<div class="form-group field-surat-id_jenis_surat required">
    <label class="control-label" for="surat-id_jenis_surat">Jenis Surat</label>
<!--    <input type="text" value="--><?php //echo date("Y-m-d") ?><!--" id="surat-tanggal_surat" class="form-control" name="Surat[tanggal_surat]">-->
    <select id="surat-id_jenis_surat" name="Surat[id_jenis_surat]">
        <option>Pilih</option>
        <?php

        foreach( $model -> showjenissurat() as $item => $value){
            echo "<option value=".$value['id_jenis_surat'].">".$value['nama_jenis_surat']."</option>";
        }

        ?>
    </select>
</div>

<?= $form->field($model, 'id_pengirim') ?>
<div class="form-group field-surat-tanggal_surat required">
    <label class="control-label" for="surat-tanggal_surat">Tanggal Surat</label>
    <input type="text" value="<?php echo date("Y-m-d") ?>" id="surat-tanggal_surat" class="form-control" name="Surat[tanggal_surat]">
</div>
<?= $form->field($model, 'perihal') ?>
<?= $form->field($model, 'isi_surat') ?>

<?= Html::submitButton('Simpan', ['class' => 'btn btn-success', 'name' => 'send-button ' ]) ?>

<?php
    ActiveForm::end()
?>
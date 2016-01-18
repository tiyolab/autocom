<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\logistic\LgStatusKendaraan;

$status = new LgStatusKendaraan();

/* @var $this yii\web\View */
/* @var $model app\models\logistic\LgStatusKendaraan */

$this->title = 'Detail Status Kendaraan: ' . ' ' . $model->kode;
$this->params['breadcrumbs'][] = ['label' => 'Lg Status Kendaraans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-12">
<div class="col-md-12">
    <div class="widget widget-green">
        <div class="widget-title">
            <div class="widget-controls">
                <a href="#" class="widget-control widget-control-full-screen" data-toggle="tooltip" data-placement="top" title="" data-original-title="Full Screen"><i class="fa fa-expand"></i></a>
                <a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Exit Full Screen"><i class="fa fa-expand"></i></a>
                <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
                <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="fa fa-minus-circle"></i></a>
            </div>
            <h3><i class="fa fa-ok-circle"></i><?= Html::encode($this->title) ?></h3>
        </div>
            <div class="widget-content">
                <div class="row">
                    <div class="col-md-12">
                        <p>
                                <?= Html::a('back', Yii::$app->urlManager->createUrl(['logistik/status-kendaraan']), ['class' => 'btn btn-success']) ?>
                        </p>
                        <table class="table">
                            <tbody>
                                <?php $i=1; foreach ( $status->findDetailStatusKendaraan($model->kode) as $key => $value) { ?>
                                        <tr>
                                            <td>Kode</td><td><?=$value['kode']?></td>
                                        </tr>
                                        <tr>
                                            <td>Kendaraan</td><td><?=$value['kendaraan']?></td>
                                        </tr>
                                        <tr>
                                            <td>Tgl Permasalahan</td><td><?=$value['tgl_permasalahan']?></td>
                                        </tr>
                                        <tr>
                                            <td>Permasalahan</td><td><?=$value['permasalahan']?></td>
                                        </tr>
                                        <tr>
                                            <td>Tgl Solusi</td><td><?php if($value['tanggal_solusi']=="0000-00-00"){echo"";}else{echo $value['tanggal_solusi'];}?></td>
                                        </tr>
                                        <tr>
                                            <td>Solusi</td><td><?=$value['solusi']?></td>
                                        </tr>
                                <?php $i++; } ?>  
                            </tbody>                       
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

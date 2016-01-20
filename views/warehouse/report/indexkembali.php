<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\ActiveForm;
use app\models\warehouse\Report;

/* @var $this yii\web\View */
/* @var $searchModel app\models\logistic\LgPengirimanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Warehouse Report';
$this->params['breadcrumbs'][] = $this->title;


$findReportBarang = new Report();


?>
<div class="side">
    <div class="sub-sidebar-wrapper">
      <ul class="nav">
        <?php
            echo Nav::widget([
                    'items' => [
                    ['label' => 'Report Barang Masuk', 'url' => ['/warehouse/reportmasukindex']],
                    ['label' => 'Report Barang Keluar', 'url' => ['/warehouse/reportkeluarindex']],
                    ['label' => 'Report Pengembalian Barang', 'url' => ['/warehouse/reportkembaliindex']],
                ],
            ]);
        ?>
      </ul>
    </div>
</div>
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
                        <?php $form = ActiveForm::begin(); ?>
                        <div class="col-md-12">
                            <?= $form->field($findReportBarang, 'date')->textInput(['maxlength' => 255, 'class' => 'form-control input-daterangepicker']) ?>
                        <?= Html::a('<span class="glyphicon glyphicon-file btn btn-warning"></span>', Yii::$app->urlManager->createUrl(['warehouse/pdfbarangkembali',"id"=>$hasil])) ?>
                        </div><div class="col-md-11"></div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
                            </div>
                        </div>
                        <?php ActiveForm::end(); ?>
                        <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID</th>
                                            <th>No Faktur</th>
                                            <th>No Surat Jalan</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah</th>
                                            <th>Tanggal Surat</th>
                                            <th>Tanggal Terima</th>
                                            <th>Kondisi</th>
                                            <th>Tanggal Order</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                        $i=1; foreach ( $hasil as $key=> $value) { ?>

                                        <tr>
                                            <td><?=$i?></td>
                                            <td><?=$value['ID_Bab']?></td>
                                            <td><?=$value['No_Faktur']?></td>
                                            <td><?=$value['No_Surat_Jalan']?></td>
                                            <td><?=$value['Nama_Barang']?></td>
                                            <td><?=$value['Jumlah']?></td>
                                            <td><?=$value['Tanggal_Surat']?></td>
                                            <td><?=$value['Tanggal_Terima']?></td>
                                            <td><?=$value['Kondisi']?></td>
                                            <td><?=$value['Tanggal_Order']?></td>
                                            <td><?=$value['Status']?></td>
                                            <td>       
                                              
                                                
                                            </td>
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


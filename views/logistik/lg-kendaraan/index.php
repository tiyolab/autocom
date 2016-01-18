<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\logistic\LgKendaraan;

$status = new LgKendaraan();

/* @var $this yii\web\View */
/* @var $searchModel app\models\logistic\LgKendaraanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Monitoring Kendaraan';
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
                        <?php 
                            $session=Yii::$app->session;
                            $session->open();
                            $ss = $session['session.user']['user_type'];
                            if ($ss == 'super admin'){
                        ?>
                            <p>
                                <?= Html::a('<span class="glyphicon glyphicon-plus"></span>', ['create-kendaraan'], ['class' => 'btn btn-success']) ?>
                            </p>
                        <?php } ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nomor Polisi</th>
                                    <th>Tahun Pembelian</th>
                                    <th>Jenis Transportasi</th>
                                    <th>Penanggung Jawab</th>
                                    <th>Bahan Bakar</th>
                                    <th>Berat Muatan</th>
                                    <th>Status Pemakaian</th>
                                </tr>
                            </thead>
                            <tbody>
                        <?php $i=1; foreach ( $status->findKendaraan() as $key => $value) { ?>
                                <tr>
                                    <td><?=$i?></td>
                                    <td><?=$value['nomor_polisi']?></td>
                                    <td><?=$value['tahun_pembelian']?></td>
                                    <td><?=$value['jenis_transportasi']?></td>
                                    <td><?=$value['penanggung_jawab']?></td>
                                    <td><?=$value['bahan_bakar']?></td>
                                    <td><?=$value['berat_muatan']?></td>
                                    <td>
                                        <?php 
                                            if($value['status_pemakaian']==0){echo"<span class='label label-success' disabled>active</span>";}
                                            else if($value['status_pemakaian']==1){echo"<span class='label label-warning' disabled>repair</span>";}
                                            else if($value['status_pemakaian']==2){echo"<span class='label label-danger' disabled>broken</span>";}
                                         ?>
                                    </td>
                                    <?php 
                                        $session=Yii::$app->session;
                                        $session->open();
                                        $ss = $session['session.user']['user_type'];
                                        if ($ss == 'super admin'){
                                    ?>
                                    <td>
                                        <?= Html::a('<span class="glyphicon glyphicon-eye-open btn btn-primary"></span>', Yii::$app->urlManager->createUrl(['logistik/view',"id"=>$value['kode']])) ?>
                                        <?= Html::a('<span class="glyphicon glyphicon-pencil btn btn-success"></span>', Yii::$app->urlManager->createUrl(['logistik/update',"id"=>$value['kode']])) ?>
                                        <?= Html::a('<span class="glyphicon glyphicon-trash btn btn-danger"></span>', Yii::$app->urlManager->createUrl(['logistik/delete',"id"=>$value['kode']])) ?>
                                    </td>
                                    <?php } ?>
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

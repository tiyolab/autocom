<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\logistic\LgStatusKendaraan;

$status = new LgStatusKendaraan();

/* @var $this yii\web\View */
/* @var $searchModel app\models\logistic\LgStatusKendaraanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Monitoring Status Kendaraan';
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
                            <?= Html::a('<span class="glyphicon glyphicon-plus btn btn-success"></span>', ['create-status-kendaraan']) ?>
                        </p>
                        <?php } ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kendaraan</th>
                                    <th>Tgl Permasalahan</th>
                                    <th>Permasalahan</th>
                                    <th>Tgl Solusi</th>
                                    <th>Solusi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                        <?php $i=1; foreach ( $status->findStatusKendaraan() as $key => $value) { ?>
                                <tr>
                                    <td><?=$i?></td>
                                    <td><?=$value['kendaraan']?></td>
                                    <td><?=$value['tgl_permasalahan']?></td>
                                    <td><?=$value['permasalahan']?></td>
                                    <td><?php if($value['tanggal_solusi']=="0000-00-00"){echo"";}else{echo $value['tanggal_solusi'];}?></td>
                                    <td><?=$value['solusi']?></td>
                                    <?php 
                                        $session=Yii::$app->session;
                                        $session->open();
                                        $ss = $session['session.user']['user_type'];
                                        if ($ss == 'super admin'){
                                    ?>
                                    <td>
                                        <?= Html::a('<span class="glyphicon glyphicon-eye-open btn btn-primary"></span>', Yii::$app->urlManager->createUrl(['logistik/view',"id"=>$value['kode']])) ?>
                                        <?php if($value['solusi']==""){ ?>
                                        <?= Html::a('<span class="glyphicon glyphicon-pencil btn btn-success"></span>', Yii::$app->urlManager->createUrl(['logistik/update',"id"=>$value['kode']])) ?>
                                        <?= Html::a('<span class="glyphicon glyphicon-trash btn btn-danger"></span>', Yii::$app->urlManager->createUrl(['logistik/delete',"id"=>$value['kode']])) ?>
                                        <?php } ?>
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

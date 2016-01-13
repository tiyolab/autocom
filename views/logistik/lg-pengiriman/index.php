<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\logistic\LgPengiriman;
use app\models\logistic\LgPengirimanSearch;

/* @var $this yii\web\View */
/* @var $searchModel app\models\logistic\LgPengirimanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Logistik Pengiriman';
$this->params['breadcrumbs'][] = $this->title;


$a = new LgPengiriman();


?>
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
                        <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal Order</th>
                                            <th>Tanggal Pengiriman</th>
                                            <th>Tujuan</th>
                                            <th>Status Approve</th>
                                            <th>Status Pengiriman</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                            if (null !== $a->findPengiriman()){
                                            $i=1; foreach ( $a->findPengiriman() as $key=> $value) { ?>

                                        <tr>
                                            <td><?=$i?></td>
                                            <td><?=$value['date_order_placed']?></td>
                                            <td><?=$value['tgl_pengiriman']?></td>
                                            <td><?=$value['shipping_address']?><?php echo","; ?><?=$value['shipping_city']?><?php echo","; ?><?=$value['shipping_province']?><?php echo","; ?><?=$value['shipping_zip_code']?><?php echo","; ?><?=$value['shipping_country']?></td>
                                            <td><?php
                                                    $status = 0;
                                                    if ($value['status_approve'] == '0'){
                                                        echo "<span class='label label-warning'>waiting</span>";
                                                    }
                                                    else if ($value['status_approve'] == '1'){
                                                        echo "<span class='label label-success'>approved</span>";
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    $status = 0;
                                                    if ($value['status_pengiriman'] == '0'){
                                                        echo "<span class='label label-primary'>not sent yet</span>";
                                                    }
                                                    else if ($value['status_pengiriman'] == '1'){
                                                        echo "<span class='label label-warning'>sending</span>";
                                                    }
                                                    else if ($value['status_pengiriman'] == '2'){
                                                        echo  "<span class='label label-success'>sent</span>";
                                                    }
                                                    else if ($value['status_pengiriman'] == '3'){
                                                        echo  "<span class='label label-danger'>not sent</span>";
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?= Html::a('<span class="glyphicon glyphicon-eye-open btn btn-primary"></span>', Yii::$app->urlManager->createUrl(['logistik/view',"id"=>$value['kode']])) ?>
                                                <!--SUPER ADMIN-->
                                                <?php 
                                                    $session=Yii::$app->session;
                                                    $session->open();
                                                    $ss = $session['session.user']['user_type'];
                                                    if ($ss == 'super admin'){
                                                ?>
                                                        <?php if ($value['status_approve'] == '1'){ ?>
                                                            <?= Html::a('<span class="glyphicon glyphicon-file btn btn-warning"></span>', Yii::$app->urlManager->createUrl(['logistik/pdf',"id"=>$value['kode']])) ?>                                                
                                                        <?php } if ($value['status_pengiriman'] != '2'&&$value['status_pengiriman'] != '3'){ ?>
                                                        <?= Html::a('<span class="glyphicon glyphicon-remove btn btn-danger"></span>', ['delete', 'id' => $value['kode']], [
                                                                "data" => ['confirm' => 'Are you sure you want to not sent this shipment?','method' => 'post']
                                                        ]) ?>
                                                        <?php } ?>
                                                    <!--KURIR-->
                                                    <?php }else if ($ss == 'kurir'&&$value['status_pengiriman'] == '1'){ ?>
                                                        <?= Html::a('<span class="glyphicon glyphicon-ok btn btn-success"></span>', Yii::$app->urlManager->createUrl(['logistik/update',"id"=>$value['kode']])) ?>
                                                    <?php } ?>
                                            </td>
                                        </tr>
                                        <?php $i++; }}
                                     ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


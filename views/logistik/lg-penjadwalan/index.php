<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\logistic\LgPenjadwalan;
use app\models\logistic\LgPenjadwalanSearch;

/* @var $this yii\web\View */
/* @var $searchModel app\models\logistic\LgPengirimanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Logistik Penjadwalan';
$this->params['breadcrumbs'][] = $this->title;


$a = new LgPenjadwalan();


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
                                            <th>tanggal Order</th>
                                            <th>Tanggal Pengiriman</th>
                                            <th>Tujuan</th>
                                            <th>status pengiriman</th>
                                            <th>Ongkos Kirm</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                            if ($a->findPenjadwalan() != null ){
                                            $i=1; foreach ( $a->findPenjadwalan() as $key=> $value) { ?>

                                        <tr>
                                            <td><?=$i?></td>
                                            <td><?=$value['date_order_placed']?></td>
                                            <td><?=$value['tgl_pengiriman']?></td>
                                            <td><?=$value['shipping_address'],$value['shipping_city'],$value['shipping_province'],$value['shipping_zip_code'],$value['shipping_country']?></td>
                                            <td><?=$value['tgl_pengiriman']?></td>
                                            <td> 
                                                <?php
                                                    $status = 0;
                                                    if ($value['status_pengiriman'] == '0'){
                                                        echo "<span class='label label-primary' disabled>not sent yet</span>";
                                                    }
                                                    else if ($value['status_pengiriman'] == '1'){
                                                        echo "<span class='label label-warning' disabled>sending</span>";
                                                    }
                                                    else if ($value['status_pengiriman'] == '2'){
                                                        echo  "<span class='label label-success' disabled>sent</span>";
                                                    }
                                                    else if ($value['status_pengiriman'] == '3'){
                                                        echo  "<span class='label label-danger' disabled>not sent</span>";
                                                    }
                                                ?>
                                            </td>
                                            <td><?=$value['ongkir']?></td>
                                            <td>
                                                <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span>', Yii::$app->urlManager->createUrl(['logistik/update',"id"=>$value['kode']]), ['class' => 'btn btn-primary']) ?>
                                                
                                            </td>
                                        </tr>
                                        <?php $i++; }} ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


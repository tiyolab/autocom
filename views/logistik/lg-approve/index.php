<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\logistic\LgApprove;
use app\models\logistic\LgApproveSearch;

/* @var $this yii\web\View */
/* @var $searchModel app\models\logistic\LgPengirimanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Logistik Approval';
$this->params['breadcrumbs'][] = $this->title;


$findapprove = new LgApprove();


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
                                            <th>Kendaraan</th>
                                            <th>Tanggal Order</th>
                                            <th>Tanggal Pengiriman</th>
                                            <th>Tanggal Terima</th>
                                            <th>Tujuan</th>
                                            <th>Ongkos Kirm</th>
                                            <th>Status pengiriman</th>
                                            <th>Action</th>
                                            <th>Approve</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $i=1; foreach ( $findapprove->findKendaraan() as $key=> $valuesk) {
                                            foreach ( $findapprove->findApprovebyKendaraan($valuesk['kode']) as $key=> $value) { ?>

                                        <tr>
                                            <?php if($i==1){echo"<td rowspan=";?><?=$valuesk['count_kendaraan']?><?php echo">";?><?=$valuesk['nomor_polisi']?><?php echo "</td>";} ?>
                                            <td><?=$value['date_order_placed']?></td>
                                            <td><?=$value['tgl_pengiriman']?></td>
                                            <td><?=$value['tgl_terima']?></td>
                                            <td><?=$value['shipping_address']?><?php echo","; ?><?=$value['shipping_city']?><?php echo","; ?><?=$value['shipping_province']?><?php echo","; ?><?=$value['shipping_zip_code']?><?php echo","; ?><?=$value['shipping_country']?></td>
                                            <td><?=$value['ongkir']?></td>
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
                                                
                                            </td>
                                            <?php if($i==1){echo"<td rowspan=";?><?=$valuesk['count_kendaraan']?><?php echo">";?><?= Html::a('oke', ['update', 'id' => $valuesk['kode']], ['class' => 'btn btn-primary']) ?><?php echo"</td>";} ?>
                                        </tr>
                                        <?php $i++; }$i=1; } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\logistic\LgApprove;
use app\models\logistic\LgApproveSearch;

$findapprove = new LgApprove();

/* @var $this yii\web\View */
/* @var $model app\models\logistic\LgPengiriman */

$this->title = 'Approve Pengiriman: ' . ' ' . $model->kode;
$this->params['breadcrumbs'][] = ['label' => 'Lg Approve', 'url' => ['index']];
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
                            <?= Html::a('back', Yii::$app->urlManager->createUrl(['logistik/approve']), ['class' => 'btn btn-success']) ?>
                        </p>

                        <table class="table">
                            <tbody>
                                <?php $i=1; foreach ( $findapprove->findApprove($model->kode) as $key => $value) { ?>
                                        <tr>
                                            <td>Kode</td><td><?=$value['kode']?></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Order</td><td><?=$value['date_order_placed']?></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Pengiriman</td><td><?=$value['tgl_pengiriman']?></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Terima</td><td><?=$value['tgl_terima']?></td>
                                        </tr>
                                        <tr>
                                            <td>Tujuan</td><td><?=$value['shipping_address']?><?php echo","; ?><?=$value['shipping_city']?><?php echo","; ?><?=$value['shipping_province']?><?php echo","; ?><?=$value['shipping_zip_code']?><?php echo","; ?><?=$value['shipping_country']?></td>
                                        </tr>
                                        <tr>
                                            <td>Kurir</td><td><?=$value['namakurir']?></td>
                                        </tr>
                                        <tr>
                                            <td>Kendaraan</td><td><?=$value['nomor_polisi']?></td>
                                        </tr>
                                        <tr>
                                            <td>Barang</td><td><?=$value['barang']?></td>
                                        </tr>
                                        <tr>
                                            <td>Ongkos Kirim</td><td><?=$value['ongkir']?></td>
                                        </tr>
                                        <tr>
                                            <td>Status Pengiriman</td>
                                            <td>
                                            <?php 
                                            if($value['status_pengiriman']==0){echo"<span class='label label-primary'>not yet sent</span>";}
                                            else if($value['status_pengiriman']==1){echo"<span class='label label-warning'>process sending</span>";}
                                            else if($value['status_pengiriman']==2){echo"<span class='label label-success'>sent</span>";}
                                             ?>
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


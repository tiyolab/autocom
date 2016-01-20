<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\models\warehouse\PurchaseOrder;

$roleModel = new PurchaseOrder();

/* @var $this yii\web\View */
/* @var $searchModel app\models\PurchaseOrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Purchase Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="side">
    <div class="sub-sidebar-wrapper">
      <ul class="nav">
        <?php
            echo Nav::widget([
                    'items' => [
                    ['label' => 'Purchase Order', 'url' => ['/warehouse/purchaseorderindex']],
                    ['label' => 'Sales Order', 'url' => ['/warehouse/salesorderindex']],
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
                            <p>
                                <?= Html::a('Tambah Data Purchase Order', ['warehouse/purchaseordercreate'], ['class' => 'btn btn-success']) ?>
                            </p>
                             <table class="table">
                                <thead>
                                     <tr>
                                        <th>ID PO</th>
                                        <th>Kode PO</th>
                                        <th>Kode Barang</th>
                                        <th>Jumlah</th>
                                        <th>Distributor ID</th>
                                        <th>Tanggal Order</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach ( $roleModel->findPurchaseOrderWithModule() as $key => $value) { ?>
                                    <tr>

                                        <td><?=$value['ID_PO']?></td>
                                        <td><?=$value['Kode_PO']?></td>
                                        <td><?=$value['Kode_Barang']?></td>
                                        <td><?=$value['Jumlah']?></td>
                                        <td><?=$value['Distributor_ID']?></td> 
                                        <td><?=$value['Tanggal_Order']?></td> 
                                        <td><?=$value['Status']?></td> 
                                            
                                        <td>
                                        <?= Html::a("<i class='glyphicon glyphicon-eye-open'></i>",Yii::$app->urlManager->createUrl(['warehouse/purchaseorderview',"id"=>$value['ID_PO']]), [])?> &nbsp;
                                         <a href="<?=Yii::$app->urlManager->createUrl(['warehouse/purchaseorderedit',"id"=>$value['ID_PO']])?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Update Status"><i class="fa fa-refresh"></i></a>   
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
</div>


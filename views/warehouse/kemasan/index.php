<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\models\warehouse\Kemasan;

$roleModel = new Kemasan();


/* @var $this yii\web\View */
/* @var $searchModel app\models\KemasanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Kemasan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="side">
    <div class="sub-sidebar-wrapper">
      <ul class="nav">
      <?php
            echo Nav::widget([
                    'items' => [
                    ['label' => 'Barang', 'url' => ['/warehouse/barangindex']],
                    ['label' => 'Kemasan', 'url' => ['/warehouse/kemasanindex']],
                    ['label' => 'Jenis Barang', 'url' => ['/warehouse/jenisbarangindex']],                  
                    ['label' => 'Gudang', 'url' => ['/warehouse/gudangindex']],
                    ['label' => 'Blok', 'url' => ['/warehouse/blokindex']],
                    ['label' => 'Distributor', 'url' => ['warehouse/distributorindex']],
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
                                <?= Html::a('Tambah Data Kemasan', ['warehouse/kemasancreate'], ['class' => 'btn btn-success']) ?>
                            </p>
                             <table class="table">
                                <thead>
                                        <tr>
                                            <th>Kemasan ID</th>
                                            <th>Nama</th>
                                            <th>Qty</th>
                                            <th>Action</th>
                                          
                                            </tr>
                                </thead>
                                <tbody>
                                        <?php $i=1; foreach ( $roleModel->findKemasanWithModule() as $key => $value) { ?>
                                        <tr>

                                            <td><?=$value['Kemasan_ID']?></td>
                                            <td><?=$value['Nama']?></td>
                                            <td><?=$value['Qty']?></td>
                                    
                                            <td>
                                            <?= Html::a("<i class='glyphicon glyphicon-eye-open'></i>",Yii::$app->urlManager->createUrl(['warehouse/kemasanview',"id"=>$value['Kemasan_ID']]), [])?> &nbsp;
                                            <?= Html::a("<i class='glyphicon glyphicon-pencil'></i>", Yii::$app->urlManager->createUrl(['warehouse/kemasanedit',"id"=>$value['Kemasan_ID']]), [])?> &nbsp;
                                            <?= Html::a("<i class='glyphicon glyphicon-trash'></i>",Yii::$app->urlManager->createUrl(['warehouse/kemasandelete',"id"=>$value['Kemasan_ID']]),[])?> &nbsp;
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


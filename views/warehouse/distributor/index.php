<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\models\warehouse\Distributor;
$roleModel = new Distributor();

/* @var $this yii\web\View */
/* @var $searchModel app\models\DistributorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Distributor';
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
                                <?= Html::a('Tambah Data Distributor', ['warehouse/distributorcreate'], ['class' => 'btn btn-success']) ?>
                            </p>
                             <table class="table">
                                <thead>
                                        <tr>
                                            <th>ID Distributor</th>
                                            <th>Nama</th>
                                            <th>Action</th>
                                            </tr>
                                </thead>
                                <tbody>
                                        <?php $i=1; foreach ( $roleModel->findDistributorWithModule() as $key => $value) { ?>
                                        <tr>

                                            <td><?=$value['ID_Distributor']?></td>
                                            <td><?=$value['Nama']?></td>
                                            
                                            <td>
                                            <?= Html::a("<i class='glyphicon glyphicon-eye-open'></i>",Yii::$app->urlManager->createUrl(['warehouse/distributorview',"id"=>$value['ID_Distributor']]), [])?> &nbsp;
                                            <?= Html::a("<i class='glyphicon glyphicon-pencil'></i>", Yii::$app->urlManager->createUrl(['warehouse/distributoredit',"id"=>$value['ID_Distributor']]), [])?> &nbsp;
                                            <?= Html::a("<i class='glyphicon glyphicon-trash'></i>", Yii::$app->urlManager->createUrl(['warehouse/distributordelete',"id"=>$value['ID_Distributor']]),[])?> &nbsp;
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


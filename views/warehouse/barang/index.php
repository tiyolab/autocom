<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\models\warehouse\Barang;

$roleModel = new Barang();

/* @var $this yii\web\View */
/* @var $searchModel app\models\BarangSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Barang';
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
                    ['label' => 'Distributor', 'url' => ['/warehouse/distributorindex']],
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
                                <?= Html::a('Tambah Data Barang', ['warehouse/barangcreate'], ['class' => 'btn btn-success']) ?>
                            </p>
                             <table class="table">
                                <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Kode Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Jenis Barang</th>
                                            <th>Kemasan ID</th>
                                            <th>Stock</th>
                                            <th>Stock_temp</th>
                                            <th>Picture</td>
                                            <th>Action</th>
                                            </tr>
                                </thead>
                                <tbody>
                                        <?php $i=1; foreach ( $roleModel->findBarangWithModule() as $key => $value) { ?>
                                        <tr>

                                            <td><?=$value['ID']?></td>
                                            <td><?=$value['Kode_Barang']?></td>
                                            <td><?=$value['Nama_Barang']?></td>
                                            <td><?=$value['Jenis_Barang']?></td>
                                            <td><?=$value['Kemasan_ID']?></td>
                                            <td><?=$value['Stock']?></td>
                                            <td><?=$value['Stock_temp']?></td>
                                            <th><a href="/autocom/asset/images/<?=$value['Gambar']?>"><img src="/autocom-master/web/<?=$value['Gambar']?>" width="40px" height="40px"></a></th>
                                            <td>
                                            <?= Html::a("<i class='glyphicon glyphicon-eye-open'></i>",Yii::$app->urlManager->createUrl(['warehouse/barangview',"id"=>$value['Kode_Barang']]), [])?> &nbsp;
                                            <?= Html::a("<i class='glyphicon glyphicon-pencil'></i>", Yii::$app->urlManager->createUrl(['warehouse/barangedit',"id"=>$value['Kode_Barang']]), [])?> &nbsp;
                                            <?= Html::a("<i class='glyphicon glyphicon-trash'></i>", Yii::$app->urlManager->createUrl(['warehouse/barangdelete',"id"=>$value['Kode_Barang']]),[])?> &nbsp;
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


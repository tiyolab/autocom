<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\models\warehouse\BabMasuk;

$roleModel = new BabMasuk();


/* @var $this yii\web\View */
/* @var $searchModel app\models\BabMasukSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Berita Acara Barang Masuk';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="side">
    <div class="sub-sidebar-wrapper">
      <ul class="nav">
        <?php
            echo Nav::widget([
                    'items' => [
                    ['label' => 'Berita Acara Masuk', 'url' => ['/warehouse/babmasukindex']],
                    ['label' => 'Berita Acara Keluar', 'url' => ['warehouse/babkeluarindex']],
                    ['label' => 'Berita Acara Pengembalian', 'url' => ['warehouse/bapengembalianindex']],
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
                                <?= Html::a('Tambah Data Berita Acara Barang Masuk', ['warehouse/babmasukcreate'], ['class' => 'btn btn-success']) ?>
                            </p>
                             <table class="table">
                                <thead>
                                        <tr>
                                            <th>ID Bab Masuk</th>
                                            <th>No Faktur</th>
                                            <th>No Surat Jalan</th>
                                            <th>ID PO</th>
                                            <th>Tanggal Surat</th>
                                            <th>Tanggal_Terima</th>
                                            <th>Kondisi</th>
                                            <th>User_Id</th>
                                            <th>Action</th>
                                            </tr>
                                </thead>
                                <tbody>
                                        <?php $i=1; foreach ( $roleModel->findBabMasukWithModule() as $key => $value) { ?>
                                        <tr>

                                            <td><?=$value['ID_Bab_masuk']?></td>
                                            <td><?=$value['No_Faktur']?></td>
                                            <td><?=$value['No_Surat_Jalan']?></td>
                                            <td><?=$value['ID_PO']?></td>
                                            <td><?=$value['Tanggal_Surat']?></td>
                                            <td><?=$value['Tanggal_Terima']?></td>
                                            <td><?=$value['Kondisi']?></td>
                                            <td><?=$value['User_Id']?></td>
                                            <td>
                                            <?= Html::a("<i class='glyphicon glyphicon-eye-open'></i>",Yii::$app->urlManager->createUrl(['warehouse/babmasukview',"id"=>$value['ID_Bab_masuk']]), [])?> &nbsp;
                                            <?= Html::a("<i class='glyphicon glyphicon-pencil'></i>", Yii::$app->urlManager->createUrl(['warehouse/babmasukedit',"id"=>$value['ID_Bab_masuk']]), [])?> &nbsp; 
                                            <?= Html::a("<i class='glyphicon glyphicon-trash'></i>", Yii::$app->urlManager->createUrl(['warehouse/babmasukdelete',"id"=>$value['ID_Bab_masuk']]),[])?>
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



<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\models\warehouse\BabKeluar;

$roleModel = new BabKeluar();


/* @var $this yii\web\View */
/* @var $searchModel app\models\BabKeluarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Berita Acara Barang Keluar';
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
                                <?= Html::a('Tambah Data Berita Acara Barang Keluar', ['warehouse/babkeluarcreate'], ['class' => 'btn btn-success']) ?>
                            </p>
                             <table class="table">
                                <thead>
                                        <tr>
                                            <th>ID_Bab_Keluar</th>
                                            <th>NO_Surat_Jalan</th>
                                            <th>ID_SO</th>
                                            <th>Tanggal_Surat</th>
                                            <th>Tanggal_Keluar</th>
                                            <th>Kondisi</th>
                                            <th>User_Id</th>
                                            <th>Action</th>
                                            </tr>
                                </thead>
                                <tbody>
                                        <?php $i=1; foreach ( $roleModel->findBabKeluarWithModule() as $key => $value) { ?>
                                        <tr>

                                            <td><?=$value['ID_Bab_Keluar']?></td>
                                            <td><?=$value['NO_Surat_Jalan']?></td>
                                            <td><?=$value['ID_SO']?></td>
                                            <td><?=$value['Tanggal_Surat']?></td>
                                            <td><?=$value['Tanggal_Keluar']?></td>
                                            <td><?=$value['Kondisi']?></td>
                                            <td><?=$value['User_Id']?></td>
                                            <td>
                                            <?= Html::a("<i class='glyphicon glyphicon-eye-open'></i>",Yii::$app->urlManager->createUrl(['warehouse/babkeluarview',"id"=>$value['ID_Bab_Keluar']]), [])?> &nbsp;
                                            <?= Html::a("<i class='glyphicon glyphicon-pencil'></i>", Yii::$app->urlManager->createUrl(['warehouse/babkeluaredit',"id"=>$value['ID_Bab_Keluar']]), [])?> &nbsp;
                                            <?= Html::a("<i class='glyphicon glyphicon-trash'></i>", Yii::$app->urlManager->createUrl(['warehouse/babkeluardelete',"id"=>$value['ID_Bab_Keluar']]),[])?>
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



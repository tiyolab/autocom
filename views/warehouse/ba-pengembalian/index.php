<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\models\warehouse\BaPengembalian;

$roleModel = new BaPengembalian();

/* @var $this yii\web\View */
/* @var $searchModel app\models\BaPengembalianSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Berita Acara Barang Pengembalian';
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
								<?= Html::a('Tambah Data Berita Acara Pengembalian Barang', ['warehouse/bapengembaliancreate'], ['class' => 'btn btn-success']) ?>
                            </p>
                             <table class="table">
                                <thead>
                                        <tr>
                                            <th>ID Bab</th>
											<th>NO Faktur</th>
                                            <th>NO Surat Jalan</th>
                                            <th>ID PO</th>
                                            <th>Tanggal Surat</th>
                                            <th>Tanggal Terima</th>
                                            <th>Kondisi</th>
											<th>Gudang</th>
                                            <th>User</th>
                                            <th>Action</th>
                                            </tr>
                                </thead>
                                <tbody>
                                        <?php $i=1; foreach ( $roleModel->findBaPengembalianWithModule() as $key => $value) { ?>
                                        <tr>
											<? print_r($value['NO_Faktur']); ?>
                                            <td><?=$value['ID_Bab']?></td>
											<td><?=$value['No_Faktur']?></td>
                                            <td><?=$value['No_Surat_Jalan']?></td>
                                            <td><?=$value['ID_PO']?></td>
                                            <td><?=$value['Tanggal_Surat']?></td>
                                            <td><?=$value['Tanggal_Terima']?></td>
                                            <td><?=$value['Kondisi']?></td>
											<td><?=$value['Gudang_ID']?></td>
                                            <td><?=$value['User_Id']?></td>
                                            <td>
                                            <?= Html::a("<i class='glyphicon glyphicon-eye-open'></i>",Yii::$app->urlManager->createUrl(['warehouse/bapengembalianview',"id"=>$value['ID_Bab']]), [])?> &nbsp;
                                            <?= Html::a("<i class='glyphicon glyphicon-pencil'></i>", Yii::$app->urlManager->createUrl(['warehouse/bapengembalianedit',"id"=>$value['ID_Bab']]), [])?> &nbsp;
                                            <?= Html::a("<i class='glyphicon glyphicon-trash'></i>", Yii::$app->urlManager->createUrl(['warehouse/bapengembaliandelete',"id"=>$value['ID_Bab']]),[])?>
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



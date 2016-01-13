<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\logistic\LgKendaraan;

$status = new LgKendaraan();

/* @var $this yii\web\View */
/* @var $model app\models\logistic\LgKendaraan */

$this->title = 'Detail Kendaraan: ' . ' ' . $model->kode;
$this->params['breadcrumbs'][] = ['label' => 'Lg Kendaraans', 'url' => ['index']];
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
                            <?php 
                                $session=Yii::$app->session;
                                $session->open();
                                $ss = $session['session.user']['user_type'];
                                if ($ss == 'super admin'){
                            ?>
                                <?= Html::a('Update', ['update', 'id' => $model->kode], ['class' => 'btn btn-primary']) ?>
                                <?= Html::a('Delete', ['delete', 'id' => $model->kode], [
                                    'class' => 'btn btn-danger',
                                    'data' => [
                                        'confirm' => 'Are you sure you want to delete this item?',
                                        'method' => 'post',
                                    ],
                                ]) ?>
                                <?= Html::a('back', Yii::$app->urlManager->createUrl(['logistik/kendaraan']), ['class' => 'btn btn-success']) ?>
                            <?php } ?>
                        </p>

                        <table class="table">
                            <tbody>
                                <?php $i=1; foreach ( $status->findDetailKendaraan($model->kode) as $key => $value) { ?>
                                        <tr>
                                            <td>Kode</td><td><?=$value['kode']?></td>
                                        </tr>
                                        <tr>
                                            <td>Nomor Polisi</td><td><?=$value['nomor_polisi']?></td>
                                        </tr>
                                        <tr>
                                            <td>Tahun Pembelian</td><td><?=$value['tahun_pembelian']?></td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Transportasi</td><td><?=$value['jenis_transportasi']?></td>
                                        </tr>
                                        <tr>
                                            <td>Penanggung Jawab</td><td><?=$value['penanggung_jawab']?></td>
                                        </tr>
                                        <tr>
                                            <td>Bahan Bakar</td><td><?=$value['bahan_bakar']?></td>
                                        </tr>
                                        <tr>
                                            <td>Berat Muatan</td><td><?=$value['berat_muatan']?></td>
                                        </tr>
                                        <tr>
                                            <td>Status Pemakaian</td>
                                            <td>
                                            <?php 
                                            if($value['status_pemakaian']==0){echo"<span class='btn btn-success'>active</span>";}
                                            else if($value['status_pemakaian']==1){echo"<span class='btn btn-warning'>repair</span>";}
                                            else if($value['status_pemakaian']==2){echo"<span class='btn btn-danger'>broken</span>";}
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

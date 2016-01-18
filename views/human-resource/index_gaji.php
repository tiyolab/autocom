<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

use app\models\HrdGaji;

$HrdGaji = new HrdGaji();

$this->title = 'Data Gaji Pokok Pegawai';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="side">
	<div class="sub-sidebar-wrapper">
	  <ul class="nav">
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
						<a href="<?= Yii::$app->urlManager->createUrl(['human-resource/create-gaji'])?>" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-plus"></i></a>
						<table class="table">
							<thead>
								<tr>
									<th>No</th>
									<th>Tingkatan</th>
									<th>Gaji Minimal</th>
									<th>Gaji Maksimal</th>
									<th>Persetujuan</th>
									<th width="100px">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $i=1; foreach ( $HrdGaji->findGaji() as $key => $value) { ?>
									<tr>
										<td><?=$i?></td>
										<td><?=$value['tingkatan']?></td>
										<td><?=$value['gaji_min']?></td>
										<td><?=$value['gaji_max']?></td>
										<td><?php 
											if($value['persetujuan_gaji'] == 1){
												echo "Disetujui";
											}else{
												echo "Ditolak";
											}
										?></td>
										<td>
											<a href="<?= Yii::$app->urlManager->createUrl(['human-resource/update-gaji',"id"=>$value['id_gaji']])?>" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-pencil"></i></a>
											
											<a href="<?= Yii::$app->urlManager->createUrl(['human-resource/delete-gaji',"id"=>$value['id_gaji']])?>" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i></a>
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
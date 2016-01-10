<?php
use yii\helpers\Html;

use app\models\Role;

$roleModel = new Role();
$detailRole = $roleModel->findRoleWithDetail(Yii::$app->request->get()['id']);
//print_r($detailRole);die;
?>


<div class="col-md-12">
    <div class="widget widget-green">
        <div class="widget-title">
            <div class="widget-controls">
				<a href="#" class="widget-control widget-control-full-screen" data-toggle="tooltip" data-placement="top" title="" data-original-title="Full Screen"><i class="fa fa-expand"></i></a>
				<a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Exit Full Screen"><i class="fa fa-expand"></i></a>
				<a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
				<a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="fa fa-minus-circle"></i></a>
			</div>
            <h3><i class="fa fa-ok-circle"></i>detail role for <i><b><?= $detailRole[0]['role'] ?></b></i></h3>
        </div>
			<div class="widget-content">
				<div class="row">
					<div class="col-md-12">
						
						<table class="table">
							<thead>
								<tr>
									<th>No</th>
									<th>Module name</th>
									<th>Action Allowed</th>
								</tr>
							</thead>
							<tbody>
								<?php $i=1; foreach ( $detailRole as $key => $value) { ?>
									<tr>
										<td><?=$i?></td>
										<td><?=$value['module']?></td>
										<td><?=$value['hak_akses']?></td>
									</tr>
								<?php $i++; } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
	</div>
</div>	

<!-- 
<h3>detail role for <?= $detailRole[0]['role'] ?></h3>
<table border = "1" style="border-collapse:collapse">
	<tr>
		<th>No</th>
		<th>Module name</th>
		<th>Action Allowed</th>
	</tr>
<?php $i=1; foreach ( $detailRole as $key => $value) { ?>
	<tr>
		<td><?=$i?></td>
		<td><?=$value['module']?></td>
		<td><?=$value['hak_akses']?></td>
	</tr>
<?php $i++; } ?>
</table>
 -->
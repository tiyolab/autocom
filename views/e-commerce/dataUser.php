<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

use app\models\ecommerceDataUser;

$dataUserModel = new ecommerceDataUser();

$this->title = 'Data User';
$this->params['breadcrumbs'][] = $this->title;
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
            <h3><i class="fa fa-ok-circle"></i><?= Html::encode($this->title) ?></h3>
        </div>
			<div class="widget-content">
				<div class="row">
					<div class="col-md-12">
						<table class="table">
							<thead>
								<tr>
									<th>No</th>
									<th>Tgl Terdaftar</th>
									<th>Nama Login</th>	
									<th>Password</th>
									<th>Email</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
						<?php $i=1; foreach ( $dataUserModel->findDataUser() as $key => $value) { ?>
							<tr>
								<td><?=$i?></td>
								<td><?=$value['user_registered']?></td>
								<td><?=$value['login_name']?></td>
								<td><?=$value['login_password']?></td>
								<td><?=$value['email_address']?></td>
								<td>
									<?= Html::a("detail",Yii::$app->urlManager->createUrl(['e-commerce/detail_data',"id"=>$value['customers_id']]), [])?> | 
									<?= Html::a("delete", Yii::$app->urlManager->createUrl(['e-commerce/delete_data',"id"=>$value['customers_id']]),[])?>
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

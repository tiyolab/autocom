<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\models\ecommerceDataUser;

$dataUserModel = new ecommerceDataUser();
$detailUser = $dataUserModel->findDetailUser(Yii::$app->request->get()['id']);
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
							<tbody>
							<?php $i=1; foreach ( $detailUser as $key => $value) { ?>
							<tr>
								<th>Customer ID</th>
								<th>:</th>
								<td><?=$value['customers_id']?></td>
							</tr>
							<tr>
								<th>Tanggal Registrasi</th>
								<th>:</th>
								<td><?=$value['user_registered']?></td>
							</tr>
							<tr>
								<th>Organization Name</th>
								<th>:</th>
								<td><?=$value['organization_name']?></td>
							</tr>
							<tr>
								<th>First Name</th>
								<th>:</th>
								<td><?=$value['first_name']?></td>
							</tr>
							<tr>
								<th>Middle Name</th>
								<th>:</th>
								<td><?=$value['middle_name']?></td>
							</tr>
							<tr>
								<th>Last Name</th>
								<th>:</th>
								<td><?=$value['last_name']?></td>
							</tr>
							<tr>
								<th>Email</th>
								<th>:</th>
								<td><?=$value['email_address']?></td>
							</tr>
							<tr>
								<th>Nama Login</th>
								<th>:</th>
								<td><?=$value['login_name']?></td>
							</tr>
							<tr>
								<th>Password</th>
								<th>:</th>
								<td><?=$value['login_password']?></td>
							</tr>
							<tr>
								<th>No Telepon</th>
								<th>:</th>
								<td><?=$value['phone_number']?></td>
							</tr>
							<tr>
								<th>Kota</th>
								<th>:</th>
								<td><?=$value['city']?></td>
							</tr>
							<tr>
								<th>Negara</th>
								<th>:</th>
								<td><?=$value['country']?></td>
							</tr>
						<?php $i++; } ?>
					</tbody>
					<td>
						<?= Html::a("Back",Yii::$app->urlManager->createUrl(['e-commerce/data']))?> 
					</td>
						</table>
					</div>
				</div>
			</div>
	</div>
</div>	

<?php
use yii\helpers\Html;

use app\models\User;

$model = new User();
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
            <h3><i class="fa fa-ok-circle"></i>list of user</h3>
        </div>
			<div class="widget-content">
				<div class="row">
					<div class="col-md-12">
						<a href="<?= Yii::$app->urlManager->createUrl(['security/create-user']) ?>" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-plus"></i></a>
						<table class="table">
							<thead>
								<tr>
									<th>No</th>
									<th>Username</th>
									<th>Email</th>
									<th>User type</th>
									<th width="150px">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $i=1; foreach ( $model->findUser() as $key => $value) { ?>
									<tr>
										<td><?=$i?></td>
										<td><?=$value['username']?></td>
										<td><?=$value['email']?></td>
										<td><?=$value['user_type_name']?></td>
										<td>
											
											<a href="<?= Yii::$app->urlManager->createUrl(['security/update-user',"id"=>$value['id']])?>" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-pencil"></i></a>
											
											<a href="<?= Yii::$app->urlManager->createUrl(['security/delete-user',"id"=>$value['id']])?>" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i></a>
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



<!-- 
<?= Html::a("Create new user", Yii::$app->urlManager->createUrl(['security/create-user']), ["class"=>["btn","btn-primary"]])?>
<table border = "1" style="border-collapse:collapse">
	<tr>
		<th>No</th>
		<th>Username</th>
		<th>Email</th>
		<th>User type</th>
		<th>Action</th>
	</tr>
<?php $i=1; foreach ( $model->findUser() as $key => $value) { ?>
	<tr>
		<td><?=$i?></td>
		<td><?=$value['username']?></td>
		<td><?=$value['email']?></td>
		<td><?=$value['user_type_name']?></td>
		<td>
			<?= Html::a("edit", Yii::$app->urlManager->createUrl(['security/update-user',"id"=>$value['id']]), [])?> | 
			<?= Html::a("delete", Yii::$app->urlManager->createUrl(['security/delete-user',"id"=>$value['id']]),[])?>
		</td>
	</tr>
<?php $i++; } ?>
</table>
 -->
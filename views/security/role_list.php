<?php
use yii\helpers\Html;

use app\models\Role;

$roleModel = new Role();
?>
<?= Html::a("Create role", Yii::$app->urlManager->createUrl(['security/create-role']), ["class"=>["btn","btn-primary"]])?>
<table border = "1" style="border-collapse:collapse">
	<tr>
		<th>No</th>
		<th>Role Name</th>
		<th>Module Allowed</th>
		<th>Action</th>
	</tr>
<?php $i=1; foreach ( $roleModel->findRoleWithModule() as $key => $value) { ?>
	<tr>
		<td><?=$i?></td>
		<td><?=$value['role']?></td>
		<td><?=$value['module']?></td>
		<td>
			<?= Html::a("detail",Yii::$app->urlManager->createUrl(['security/detail-role',"id"=>$value['id_role']]), [])?> | 
			<?= Html::a("edit", Yii::$app->urlManager->createUrl(['security/update-role',"id"=>$value['id_role']]), [])?> | 
			<?= Html::a("delete", Yii::$app->urlManager->createUrl(['security/delete-role',"id"=>$value['id_role']]),[])?>
		</td>
	</tr>
<?php $i++; } ?>
</table>
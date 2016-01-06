<?php
use yii\helpers\Html;

use app\models\UserType;
?>
<?= Html::a("Create user type", Yii::$app->urlManager->createUrl(['security/create-user-type']), ["class"=>["btn","btn-primary"]])?>
<table border = "1" style="border-collapse:collapse">
	<tr>
		<th>No</th>
		<th>User Type Name</th>
		<th>Role Name</th>
		<th>Action</th>
	</tr>
<?php $i=1; foreach ( UserType::find()->with('role0')->asArray()->all() as $key => $value) { ?>
	<tr>
		<td><?=$i?></td>
		<td><?=$value['name']?></td>
		<td><?=$value['role0']['name']?></td>
		<td>
			<?= Html::a("edit", Yii::$app->urlManager->createUrl(['security/update-user-type',"id"=>$value['id']]), [])?> | 
			<?= Html::a("delete", Yii::$app->urlManager->createUrl(['security/delete-user-type',"id"=>$value['id']]),[])?>
		</td>
	</tr>
<?php $i++; } ?>
</table>
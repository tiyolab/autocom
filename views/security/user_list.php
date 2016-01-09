<?php
use yii\helpers\Html;

use app\models\User;

$model = new User();
/*echo "<pre>";
print_r($model->findUser());die;
echo "</pre>";*/

?>
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
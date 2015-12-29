<?php
use yii\helpers\Html;

use app\models\Role;

$roleModel = new Role();
$detailRole = $roleModel->findRoleWithDetail(Yii::$app->request->get()['id']);
//print_r($detailRole);die;
?>
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
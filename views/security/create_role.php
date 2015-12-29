<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

use app\models\Module;
use app\models\HakAkses;
?>
<h3>Create new role</h3>
<?php $form = ActiveForm::begin([
	'id' => 'create-role-form',
	'options' => ['class' => 'form-horizontal', 'data-toggle'=>'validator'],
	'fieldConfig' => [
	'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
	'labelOptions' => ['class' => 'col-lg-1 control-label'],
	],
]); ?>

	<?= Html::input("text", "role", null, ["placeholder"=>"role name", "required"=>"required"]) ?>

	<table>
	<?php
		$module = Module::find()->all();
		$hakAkses = HakAkses::find()->all();
		$i = 0;
		foreach ($module as $key => $value) {
			echo "<tr>";
				echo "<td>";
					echo Html::checkbox("module[$i][name]", false, ["label"=>$value["name"], "value"=>$value["id"]]);
				echo "</td>";
				echo "<td>";
				foreach ($hakAkses as $key2 => $value2) {
					echo Html::checkbox("module[$i][role][]", false, ["label"=>$value2["name"], "value"=>$value2["id"]]);
				}
				echo "</td>";
			echo "</tr>";
			$i++;
		}
	?>
	</table>

	<div class="form-group">
		<div class="col-lg-offset-1 col-lg-11">
			<?= Html::submitButton('Save', ['class' => 'btn btn-primary', 'name' => 'save-button']) ?>
		</div>
	</div>

<?php ActiveForm::end(); ?>
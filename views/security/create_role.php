<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

use app\models\Module;
use app\models\HakAkses;
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
            <h3><i class="fa fa-ok-circle"></i>create new role</h3>
        </div>
			<div class="widget-content">
				<div class="row">
					<div class="col-md-12">
						
						<?php $form = ActiveForm::begin([
							'id' => 'create-role-form',
							'options' => ['class' => 'form-horizontal', 'data-toggle'=>'validator', 'role'=>'form'],
							'fieldConfig' => [
							'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
							'labelOptions' => ['class' => 'col-lg-1 control-label'],
							],
						]); ?>
							<div class="form-group">
				                <label>Role name</label>
				                <input type="text" class="form-control" placeholder="" name="role" required = "required">
				           	</div>
							<!-- <?= Html::input("text", "role", null, ["placeholder"=>"role name", "required"=>"required"]) ?> -->
							<div class="form-group">
                				<label>Module and it's access rule</label><br>
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
							</div>

							<?= Html::submitButton('Save', ['class' => 'btn btn-primary', 'name' => 'save-button']) ?>

						<?php ActiveForm::end(); ?>

					</div>
				</div>
			</div>
	</div>
</div>	
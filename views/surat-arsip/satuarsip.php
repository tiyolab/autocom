<?php

use app\models\Arsip;

$id = Yii::$app->request->get()['id'];

$arsip = new Arsip();

$value = $arsip -> showonedata($id);
echo '<td><img src="data:image/jpeg;base64,'.base64_encode( $value['imageFile'] ).'"/></td>';

?>
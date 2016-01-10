<?php

use yii\helpers\Html;
use app\models\Arsip;

$dataarsip = new Arsip();

?>

<div class="widget widget-blue">
    <div class="widget-title">
        Arsip
    </div>
    <div class="widget-content">
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <tr>
                        <th>Nama Arsip</th>
                        <th>Waktu</th>
                        <th>File</th>
                    </tr>
                    <?php
                    foreach( $dataarsip -> showalldata() as $item => $value){
                        echo "<tr>";
                        echo "<td>".$value['nama']."</td>";
                        echo "<td>".$value['waktu_arsip']."</td>";
                        echo "<td>".Html::a("Show", Yii::$app->urlManager->createUrl(["surat-arsip/arsip", "id"=>$value["id_arsip"]]),[])."</td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>
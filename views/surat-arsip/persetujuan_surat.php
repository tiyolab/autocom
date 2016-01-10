<?php

use yii\helpers\Html;
use app\models\Surat;

$datasurat = new Surat();

?>
<div class="widget widget-blue">
    <div class="widget-title">
        Surat yang harus disetujui
    </div>
    <div class="widget-content">
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <tr>
                        <th>Nomor Surat</th>
                        <th>Jenis Surat</th>
                        <th>Pengirim</th>
                        <th>Tanggal</th>
                        <th>Perihal</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    foreach( $datasurat -> showsuratsetuju() as $item => $value){
                        echo "<tr>";
                        echo "<td>".$value['nomor_surat']."</td>";
                        echo "<td>".$value['id_jenis_surat']."</td>";
                        echo "<td>".$value['id_pengirim']."</td>";
                        echo "<td>".$value['tanggal_surat']."</td>";
                        echo "<td>".$value['perihal']."</td>";
                        echo "<td>".Html::a("Setujui", Yii::$app->urlManager->createUrl(["surat-arsip/setuju", "id"=>$value["nomor_surat"]]),[])." | ".
                            Html::a("Lihat", Yii::$app->urlManager->createUrl(["surat-arsip/print", "id"=>$value["nomor_surat"]]),[])
                            ."</td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>

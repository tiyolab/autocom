<?php

use yii\helpers\Html;
use app\models\Surat;

$datasurat = new Surat();

$session = Yii::$app->session;
$session->open();
$user_session = $session['session.user'];
$session->close();

$id = $user_session['login'];

?>
<div class="widget widget-blue">
    <div class="widget-title">
        Surat Keluar
    </div>
    <div class="widget-content">
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <tr>
                        <th>Nomor Surat</th>
                        <th>Jenis Surat</th>
                        <th>Penerima</th>
                        <th>Tanggal</th>
                        <th>Perihal</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    foreach( $datasurat -> showsuratkeluar($id) as $item => $value){
                        echo "<tr>";
                        echo "<td>".$value['nomor_surat']."</td>";
                        echo "<td>".$value['nama_jenis_surat']."</td>";
                        echo "<td>".$value['penerima']."</td>";
                        echo "<td>".$value['tanggal_surat']."</td>";
                        echo "<td>".$value['perihal']."</td>";
                        echo "<td>".Html::a("Delete", Yii::$app->urlManager->createUrl(["surat-arsip/delete", "id"=>$value["nomor_surat"]]),[])." | ".
                            Html::a("Print", Yii::$app->urlManager->createUrl(["surat-arsip/print", "id"=>$value["nomor_surat"]]),[])
                            ."</td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>

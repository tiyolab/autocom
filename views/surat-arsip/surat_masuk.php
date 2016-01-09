<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

use app\models\Surat;

$datasurat = new Surat();

echo "Surat Masuk<br><br>";

?>

    <table>
        <tr>
            
        </tr>
    <?php
        foreach( $datasurat -> showalldata() as $item => $value){
            echo "<tr>";
            echo "<td>".$value['nomor_surat']."</td>";
            echo "<td>".$value['id_jenis_surat']."</td>";
            echo "<td>".$value['id_pengirim']."</td>";
            echo "<td>".$value['tanggal_surat']."</td>";
            echo "<td>".$value['perihal']."</td>";
            echo "<td>".$value['isi_surat']."</td>";
            echo "</tr>";
        }
    ?>
    </table>

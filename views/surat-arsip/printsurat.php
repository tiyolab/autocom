<?php

use app\models\Surat;

$surat = new Surat();

$id = Yii::$app->request->get()['id'];

echo $id;

foreach ($surat -> detailSurat($id) as $item => $value){
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
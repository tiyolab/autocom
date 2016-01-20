<?php
use yii\helpers\Html;
use app\models\warehouse\Report;

$findReportBarang = new Report();

$id = Yii::$app->request->get('id'); 
?>

	<h1 align="center"><b><u>REPORT BARANG MASUK</u></b></h1>
	<br>
	<table class="table">
        <thead>
            <tr>
                <th width="5%" align="left">No</th>
                <th width="10%" align="left">Faktur</th>
                <th width="15%" align="left">No Surat Jalan</th>
                <th width="15%" align="left">Nama Barang</th>
                <th width="5%" align="left">Jumlah</th>
                <th width="15%" align="left">Tanggal Order</th>
                <th width="20%" align="left">Tanggal Terima</th>
                <th width="10%" align="left">Status</th>
                <!-- <th>status pengiriman</th>
                <th>Ongkos Kirm</th> 
                <th>Action</th>-->
            </tr>
        </thead>
        <tbody>

        <?php
            $i=1; foreach ( $id as $key=> $value) { ?>

            <tr>
                <td><?=$i?></td>
                <td><?=$value['No_Faktur']?></td>
                <td><?=$value['No_Surat_Jalan']?></td>
                <td><?=$value['Nama_Barang']?></td>
                <td><?=$value['Jumlah']?></td>
                <td><?=$value['Tanggal_Order']?></td>
                <td><?=$value['Tanggal_Terima']?></td>
                <td><?=$value['Status']?></td>
     
            </tr>
            <?php $i++; } ?>
</tbody>
</table>
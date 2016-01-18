<?php
use yii\helpers\Html;
use app\models\logistic\LgPengiriman;
use app\models\logistic\LgPengirimanSearch;

$a = new LgPengiriman();

$id = Yii::$app->request->get('id'); ?>

	<h1 align="center"><b><u>SURAT JALAN AUTOCOM</u></b></h1>
	<br>
<?php foreach ($a->findHeaderpdf($id) as $key=> $value){ $nama=$value['first_name'];$nama1=$value['middle_name'];$nama2=$value['last_name'];?>
	<table width="100%" border="0">
		<tr>
			<td><b>Nama Pelanggan : </b></td>
			<td><b>Nomor : </td>
		</tr>
		<tr>
			<td><?=$value['first_name']?> <?=$value['middle_name']?> <?=$value['last_name']?></td>
			<td><?=$value['surat_jalan']?></td>			
		</tr>
		<tr>
			<td><b>Alamat : </b></td>
			<td><b>Tanggal : </b></td>
		</tr>
		<tr>
			<td><?=$value['shipping_address']?><?php echo","; ?><?=$value['shipping_city']?><?php echo","; ?><?=$value['shipping_province']?><?php echo","; ?><?=$value['shipping_zip_code']?><?php echo","; ?><?=$value['shipping_country']?></td>
			<td><?=$value['tgl_pengiriman']?></td>
		</tr>
		<tr>
			<td><b>Telp/Hp : </b></td>
			<td><b>No.Invoice : </b></td>
		</tr>
		<tr>
			<td><?=$value['phone_number']?></td>
			<td><b>-</b></td>
		</tr>
	</table>
<?php } ?><br>
<table width="100%" border="1">
	<tr>
		<td align="center" width="5%"><b>No</b></td>
		<td align="center" width="10%"><b>Kode Barang</b></td>
		<td align="center"><b>Nama Barang</b></td>
		<td align="center" width="10%"><b>Kemasan</b></td>
		<td align="center" width="5%"><b>Qty</b></td>
		<td align="center" width="6%"><b>Berat</b></td>
		<td align="center" width="10%"><b>Keterangan</b></td>
	</tr>
	<?php $i=1;$tb=0;$qty=0; foreach ($a->findPengirimanpdf($id) as $key=> $values){ $tb+=$values['berat'];$qty=$values['order_item_quantity'];?>
	<tr>
		<td align="center" width="5%"><?=$i?></td>
		<td width="10%"><?=$values['Kode_Barang']?></td>
		<td><?=$values['Nama_Barang']?></td>
		<td align="center" width="10%"><?=$values['nama']?></td>
		<td align="center" width="5%"><?=$values['order_item_quantity']?></td>
		<td align="center" width="6%"><?=$values['berat']?></td>
		<td align="center" width="30%"></td>
	</tr>
	<?php $i++;} ?>
	<tr>
		<td colspan="4"><b>Total</b></td>
		<td><b><?php echo $tb; ?></b></td>
		<td><b><?php echo $qty; ?></b></td>
	</tr>
</table>
<p><i>BARANG SUDAH DITERIMA DALAM KEADAAN BAIK DAN CUKUP oleh: (tanda tangan dan (stempel) perusahaan)</i></p>
<table width="60%" border="1">
	<tr>
		<td align="center" align="center"><b>Mengetahui</b></td>
		<td align="center"><b>Gudang</b></td>
		<td align="center"><b>Penerima/Pembeli</b></td>
	</tr>
	<tr>
		<td align="center"><br><br><br><br><br>(Manager Logistik)</td>
		<td align="center" align="center"><br><br><br><br><br>(Manager Gudang)</td>
		<td align="center"><br><br><br><br><br>(<?php echo "$nama $nama1 $nama2"; ?>)</td>
	</tr>
</table>
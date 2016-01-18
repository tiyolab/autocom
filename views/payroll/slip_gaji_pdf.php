<?php
use yii\helpers\Html;
use app\models\PDFPayroll;

$id_payment = Yii::$app->request->get('id');

$pegawai = new PDFPayroll();
foreach ($pegawai -> getDataPegawai($id_payment) as $item => $value){
//echo $pegawai;
?>
	<table width="100%"  border="0" cellpadding="1" cellspacing="1">
		<tr>
			<td align="center" colspan="4" style="font-size:25px;" height="80px">SLIP GAJI KARYAWAN </td>
		</tr>
  
		<tr>
			<td>Nama Perusahaan</td>
			<td>: Auto Comp</td>
			<td width="200px">ID Pegawai</td>
			<td>: <?php echo $value['id_pegawai'];?></td>
		</tr>
  
		<tr>
			<td>Tgl Peri/ode</td>
			<td>: <?php echo $value['tgl_terima']?></td>
			<td>Nama Karyawan</td>
			<td>: <?php echo $value['nama_lengkap'].', '.$value['gelar_dpn'].', '.$value['gelar_blk'];?></td>
		</tr>
  
		<tr>
			<td>Departemen</td>
			<td>: <?php echo $value['nama_departement']?></td>
			<td>Jabatan</td>
			<td>: <?php echo $value['nama_jabatan']?></td>
		</tr>
	</table>

	<table width="100%" border="0" cellpadding="1" cellspacing="1">
		<tr>
			<td colspan="6"></td>
		</tr>
	
		<tr>
			<td colspan="3" style="border-top:0.02" solid #000000;></td>
			<td colspan="3" style="border-top:0.02" solid #000000;></td>
		</tr>
	
		<tr>
			<td colspan="3" width="80px"><strong>Penerimaan(+)</strong></td>
			<td colspan="3" ><strong>Potongan(-)</strong></td>
		</tr>
		
		<tr>
			<td colspan="6" height="10px"></td>
		</tr>
	</table>
	
	<table width="100%" border="0" cellpadding="1" cellspacing="1">
	<tr>
		<td>Gaji pokok</td>
		<td align="right" width="10px">:</td>
		<td align="right" width="200px"><?= "Rp ".number_format($value['gaji_pokok'],2,",",".")?></td>
		<td width="50px"></td>
		<td>Pajak</td>
		<td align="right" width="10px">:</td>
		<td align="right"><?php echo $value['pajak']?> %</td>
	</tr>
	
	<tr>
		<td>Uang transport</td>
		<td align="right">:</td>
		<td align="right"><?= "Rp ".number_format($value['transportasi'],2,",",".")?></td>
		<td></td>
		<td>BPJS</td>
		<td align="right">:</td>
		<td align="right"><?= "Rp ".number_format($value['bpjs'],2,",",".")?></td>
	</tr>
	
	<tr>
		<td>Uang makan</td>
		<td align="right">:</td>
		<td align="right"><?= "Rp ".number_format($value['makan'],2,",",".")?></td>
		<td></td>
		<td>Jamsostek</td>
		<td align="right">:</td>
		<td align="right"><?= "Rp ".number_format($value['jamsostek'],2,",",".")?></td>
	</tr>
	
	<tr>
		<td>Upah lembur</td>
		<td align="right">:</td>
		<td align="right"><?= "Rp ".$value['jam_lembur']*$value['gaji_per_jam_lembur']?></td>
		<td></td>
		<td>Pinjaman</td>
		<td align="right">:</td>
		<td align="right"><?= "Rp ".number_format($value['peminjaman'],2,",",".")?></td>
	</tr>
	
	<tr>
		<td>Tunjangan</td>
		<td align="right">:</td>
		<td align="right"><?= "Rp ".number_format($value['jumlah_tunjangan'],2,",",".")?></td>
		<td colspan="4"></td>
	</tr>
	
	<?php
		$total_penerimaan=$value['gaji_pokok']+($value['jam_lembur']*$value['gaji_per_jam_lembur'])+($value['jumlah_tunjangan'])+$value['transportasi']+$value['makan'];
		$total_potongan=$value['peminjaman']+$value['jamsostek']+$value['bpjs']+($value['pajak']*$value['gaji_pokok']/100);
	?>
	
	<tr>
		<td><strong>Total Penerimaan</strong></td>
		<td align="right"><strong>:</strong></td>
		<td align="right"><strong><?= "Rp ".number_format($total_penerimaan,2,",",".")?></strong></td>
		<td></td>
		<td><strong>Total Potongan</strong></td>
		<td align="right"><strong>:</strong></td>
		<td align="right"><strong><?= "Rp ".number_format($total_potongan,2,",",".")?></strong></td>
	</tr>
	
	<tr>
		<td colspan="7"></td>
	</tr>
	
	<tr>
		<td><strong><u>Gaji yang diterima</u></strong></td>
		<td align="right"><strong>:</strong></td>
		<td align="right"><strong><?= "Rp ".number_format($total_penerimaan-$total_potongan,2,",",".")?></strong></td>
		<td></td>
		<td>Tgl. Cetak</td>
		<td align="right">:</td>
		<td width="200px"><?php echo date("d.m.Y ").date("h:i:s a")?></td>
	</tr>
	</table>

	<table width="100%" border="0" cellpadding="1" cellspacing="1">
	<tr>
		<td colspan="6">++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++</td>
	</tr>
	
	<tr>
		<td colspan="6"></td>
	</tr>
	</table>

	<table width="100%" border="0" cellpadding="1" cellspacing="1">
	<tr>
		<td>Nama Perusahaan</td>
		<td>: Auto Comp</td>
		<td></td>
		<td></td>
	</tr>
	
	<tr>
		<td>Tgl. Periode</td>
		<td>: <?php echo $value['tgl_terima']?></td>
		<td align="center">Diserahkan oleh,</td>
		<td align="center">Diterima oleh,</td>
	</tr>
	
	<tr>
		<td>Departemen</td>
		<td>: <?php echo $value['nama_departement'];?></td>
		<td colspan="2"></td>
	</tr>
	
	<tr>
		<td>NIK</td>
		<td>: <?php echo $value['id_pegawai'];?></td>
		<td colspan="2"></td>
	</tr>
	
	<tr>
		<td>Nama</td>
		<td>: <?php echo $value['nama_lengkap'].', '.$value['gelar_dpn'].', '.$value['gelar_blk'];?></td>
		<td align="center">admin</td>
		<td align="center"><?php echo $value['nama_lengkap'].', '.$value['gelar_dpn'].', '.$value['gelar_blk'];?></td>
	</tr>
	
	<tr>
		<td>Jabatan</td>
		<td>: <?php echo $value['nama_jabatan'];?></td>
		<td align="center">Tgl. Cetak : <?php echo date("d.m.Y ").date("h:i:s a")?></td>
		<td></td>
	</tr>
	</table>
<?php
	}
?>
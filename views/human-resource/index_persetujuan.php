<?php

function DateToIndo($date) {
		$BulanIndo = array("Januari", "Februari", "Maret",
						   "April", "Mei", "Juni",
						   "Juli", "Agustus", "September",
						   "Oktober", "November", "Desember");
	
		$tahun = substr($date, 0, 4);
		$bulan = substr($date, 5, 2);
		$tgl   = substr($date, 8, 2);
		
		$result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;
		return($result);
}

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

use app\models\HrdJadwal;
use app\models\HrdLembur;

$HrdJadwal = new HrdJadwal();
$HrdLembur = new HrdLembur();

$this->title = 'Persetujuan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="side">
	<div class="sub-sidebar-wrapper">
	  <ul class="nav">
		<?php
			echo Nav::widget([
					'items' => [
					['label' => 'Persetujuan Jadwal Lembur', 'url' => [Yii::$app->urlManager->createUrl(['../../human-resource/persetujuan-lembur'])]],
				],
			]);
		?>
	  </ul>
	</div>
</div>
<div class="col-md-12">
    </div><div class="jumbotron">
    <h1>Persetujuan</h1>
	<p class="lead">Beberapa persyaratan persetujuan yang perlu disetujui</p>
	</div>
</div>	
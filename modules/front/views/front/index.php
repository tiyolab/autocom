<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

use app\modules\front\models\homeModel;


$homeModel = new homeModel();
$this->title = 'Home';

?>




<div class="slider">
	  <div class="callbacks_container">
	     <ul class="rslides" id="slider">
	         <li>
				 <div class="banner1">				  
					  <div class="banner-info">
					  <h3>PT Autocom Surabaya</h3>
					  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. consectetur adipiscing elit. consectetur adipiscing elit.</p>
					  </div>
				 </div>
	         </li>
	      </ul>
	  </div>
  </div>
<!---->
<script src="js/bootstrap.js"> </script>

<div class="items">
	 <div class="container">
		 <div class="items-sec">
			<?php $i=1; foreach ( $homeModel->findData() as $key => $value) {
				echo '
				<div class="col-md-3 feature-grid">
				 <a href="'.Url::To(['/front/front/detail-product',"id"=>$value['Kode_Barang']]).'"><img  width="10%" height="10%" src="/autocom'.$value['Gambar'].'" alt=""/>	
					 <div class="arrival-info">
						 <h4>'.$value['Nama_Barang'].'</h4>
						 <p>Rp '.$value['Harga_Satuan'].'</p>
					 </div>
					 <div class="viw">
						<a href="'.Url::To(['/front/front/detail-product',"id"=>$value['Kode_Barang']]).'"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>View</a>
					 </div>
				  </a>
				</div>';
			$i++; } ?>
			 
			 <div class="clearfix"></div>
		 </div>
	 </div>
</div>
<!---->
<div class="offers">
	 <div class="container">
	 <h3><a href="<?=Url::To(['/front/front/product'])?>">Show More!!</a></h3>
	 </div>
</div>
<div class="subscribe">
	 <div class="container">
		 <h3>Autocom Inc - Best ......</h3>
	 </div>
</div>
<!---->

<!---->


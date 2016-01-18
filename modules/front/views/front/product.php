<?php


use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

use app\modules\front\models\productModel;
use app\modules\front\models\addToChartModel;
$session = Yii::$app->session;
$session->open();
$user_session = $session['session.user'];
$session->close();
$productModel = new productModel();
$this->title = 'Product';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="product-model">	 
	 <div class="container">
			<ol class="breadcrumb">
		  <li><a href="<?=Yii::$app->urlManager->createUrl('/front/front/home')?>">Home</a></li>
		  <li class="active">Products</li>
		 </ol>
			<h2>Our Products</h2>			
		 <div class="col-md-12 product-model-sec">
		 <?php $i=1; foreach ( $productModel->findData() as $key => $value) {
			if($value['Stock_temp']>0 && $user_session['login']){
				$disabled='';
			}else{
				$disabled='disabled="disabled"';
			}
			$form = ActiveForm::begin([
    		'action' => Yii::$app->urlManager->createUrl('front/front/add-to-chart')]);
			echo '
				 <a href="'.Url::To(['/front/front/detail-product',"id"=>$value['Kode_Barang']]).'"><div class="product-grid">
						<div class="more-product"><span> </span></div>						
						<div class="product-img b-link-stripe b-animate-go  thickbox">
							<img src="/autocom'.$value['Gambar'].'" class="img-responsive" alt="">
							<div class="b-wrapper">
							<h4 class="b-animate b-from-left  b-delay03">							
							<button action="'.Url::To(['/front/front/detail-product',"id"=>$value['Kode_Barang']]).'"><span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>Quick View</button>
							</h4>
							</div>
						</div></a>						
						<div class="product-info simpleCart_shelfItem">
							<div class="product-info-cust prt_name">
							
								<h4>'.$value['Nama_Barang'].'</h4>								
								<span class="item_price">Rp '.$value['Harga_Satuan'].'</span>
								<div class="ofr">
								  <p class="pric1">Availibility Stock_temp</p>
						          <p class="disc">'.$value['Stock_temp'].'</p>
								</div>
								<input type="hidden" name="addToChartModel[kode_barang]" class="item_add items" value="'.$value['Kode_Barang'].'">
								<input type="hidden" name="addToChartModel[berat]" class="item_add items" value="'.$value['Berat'].'">
								<input type="hidden" name="addToChartModel[stok]" class="item_add items" value="'.$value['Stock_temp'].'">
								<input type="hidden" name="addToChartModel[harga]" class="item_add items" value="'.$value['Harga_Satuan'].'">
								<input type="number" '.$disabled.' name="addToChartModel[qty]" min="1" max="'.$value['Stock_temp'].'" class="item_quantity" placeholder="" />
								<input type="submit" '.$disabled.' class="item_add items" value="ADD">
								<div class="clearfix"> </div>
								
							</div>												
							
						</div>
					</div>	
			';
			ActiveForm::end(); 
			
		 $i++; } ?>
					
			</div>
		
</div>

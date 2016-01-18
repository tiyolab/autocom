<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$session = Yii::$app->session;
$session->open();
$user_session = $session['session.user'];
$session->close();
$this->title = 'Detail Product';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="product">
	 <div class="container">				
		 <div class="product-price1">
			 <div class="top-sing">
			 <?php $i=1; foreach ( $hasil as $key => $value) {
					if($value['Stock_temp']>0 && $user_session['login']){
						$disabled='';
					}else{
						$disabled='disabled="disabled"';
					}
			 ?>
				  <div class="col-md-7 single-top">	
					 <div class="flexslider">
							  <img src="/autocom<?=$value['Gambar']?>" data-imagezoom="true" class="img-responsive" alt=""/> 
						</div>					 					 
					 <script src="js/imagezoom.js"></script>
						<script defer src="js/jquery.flexslider.js"></script>
						<script>
						// Can also be used with $(document).ready()
						$(window).load(function() {
						  $('.flexslider').flexslider({
							animation: "slide",
							controlNav: "thumbnails"
						  });
						});
						</script>

				 </div>	
			     <div class="col-md-5 single-top-in simpleCart_shelfItem">
					  <div class="single-para ">
						 <h4><?=$value['Nama_Barang']?></h4>							
							<h5 class="item_price">Rp <?=$value['Harga_Satuan']?></h5>							
							<p class="para"></p>
							<div class="prdt-info-grid">
								 <ul>
									 <li>- Nama Barang : <?=$value['Kode_Barang']?></li>
									 <li>- Nama Barang : <?=$value['Nama_Barang']?></li>
									 <li>- Harga : Rp <?=$value['Harga_Satuan']?></li>
									 <li>- Isi Kemasan : <?=$value['Qty']?>/<?=$value['Nama']?></li>
									 <li>- Berat : <?=$value['Berat']?></li>
									 <li>- Stock Barang : <?=$value['Stock_temp']?></li>
								 </ul>
							</div>
							<div class="check">
							 <p><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>Masukkan jumlah barang jika ingin memesan</p>
						<?php	$form = ActiveForm::begin([
    		'action' => Yii::$app->urlManager->createUrl('front/front/add-to-chart'
			)]);?>
								  <div class="form-group">
									<input type="hidden" name="addToChartModel[kode_barang]" class="item_add items" value="<?=$value['Kode_Barang']?>">
									<input type="hidden" name="addToChartModel[berat]" class="item_add items" value="<?=$value['Berat']?>">
									<input type="hidden" name="addToChartModel[stok]" class="item_add items" value="<?=$value['Stock_temp']?>">
									<input type="hidden" name="addToChartModel[harga]" class="item_add items" value="<?=$value['Harga_Satuan']?>">
									<input type="number" name="addToChartModel[qty]"  <?=$disabled?> class="form-control" min="1" max="<?=$value['Stock_temp']?>" placeholder="max <?=$value['Stock_temp']?>">
								  </div>
								  <button type="submit"  <?=$disabled?> class="btn btn-default">ADD</button>
							<?php ActiveForm::end(); ?>
						    </div>						
					 </div>
				 </div>
				 <div class="clearfix"> </div>
			 <?php $i++; } ?>
			 </div>
	     </div>
		 <div class="bottom-prdt">
			 <div class="btm-grid-sec">
				 <div class="col-md-2 btm-grid">
					 <a href="product.html">
						<img src="images/p3.jpg" alt=""/>
						<h4>Product#1</h4>
						<span>$1200</span></a>
				 </div>
				 <div class="col-md-2 btm-grid">
					 <a href="product.html">
						<img src="images/p10.jpg" alt=""/>
						<h4>Product#1</h4>
						<span>$700</span></a>
				 </div>
				 <div class="col-md-2 btm-grid">
					  <a href="product.html">
						<img src="images/p5.jpg" alt=""/>
						<h4>Product#1</h4>
						<span>$1300</span></a>
				 </div>
				 <div class="col-md-2 btm-grid">
					  <a href="product.html">
						<img src="images/p4.jpg" alt=""/>
						<h4>Product#1</h4>
						<span>$9000</span></a>
				 </div>
				 <div class="col-md-2 btm-grid">
					  <a href="product.html">
						<img src="images/p2.jpg" alt=""/>
						<h4>Product#1</h4>
						<span>$450</span></a>
				 </div>
				  <div class="clearfix"></div>
			 </div>			
		 </div>
	 </div>
</div>
<!---->
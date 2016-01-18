<?php


use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

use app\modules\front\models\checkoutModel;
$session = Yii::$app->session;
$session->open();
$user_session = $session['session.user'];
$session->close();
$this->title = 'Checkout';
$this->params['breadcrumbs'][] = $this->title;

if($user_session['shipping_price']==0&&$user_session['zip_code']==0){
	$price = 'isi alamat pengiriman';
	$status='false';
}else{
	$status='true';
	$price = $user_session['shipping_price'];
}

?><!-- check out -->
<div class="container">
	<div class="check-sec">	 
		<div class="col-md-3 cart-total">
			<a class="continue" href="<?=Url::To('product')?>">Kembali Belanja</a>
			<div class="price-details">
				<h3>Detail Harga</h3>
				<span>Total</span>
				<span class="total1"><?=$user_session['subprice']?></span>
				<span>Biaya Pengiriman</span>
				<span class="total1"><?=$price?></span>
				<span>Alamat</span>
				<span class="total1"><?php echo $user_session['address'].','.$user_session['zip_code'].','.$user_session['city'];?></span>
				<div class="clearfix"></div>				 
			</div>	
			<ul class="total_price">
			   <li class="last_price"> <h4>TOTAL</h4></li>	
			   <li class="last_price"><span><?php echo $user_session['subprice']+$price;?></span></li>			   
			</ul> 
			<div class="clearfix"></div>
			<div class="clearfix"></div>
			<a class="order" onclick="return <?=$status?>" href="<?=Url::To('place-order')?>">Place Order</a>
			<div class="total-item">
				<h3>OPTIONS</h3>
				<h4>Alamat Pengiriman</h4>
				<a class="cpns" href="<?=Url::To('isi-alamat-pengiriman')?>">Isi data</a>
			</div>
		</div>
		<div class="col-md-9 cart-items">
			<h1>Keranjang Belanja Saya (<?=$user_session['jml_check_out']?>)</h1>
			
			<?php
			if($user_session['jml_check_out']!=0){
			for($i=0;$i<$user_session['jml_check_out'];$i++){
			$model = new checkoutModel();
			$value1=$model->findProduct($user_session['check_out'][$i]);
			 foreach ($value1 as $key => $value) {?>
			<div class="cart-header">
				<a href="<?=Url::To(['/front/front/delete-item-chart',"i"=>$i,"berat"=>$value['Berat'],"harga"=>$value['Harga_Satuan']])?>"><div class="close1"> </div></a>
				<div class="cart-sec simpleCart_shelfItem">
						 
						<div class="cart-item cyc">
							<img src="/autocom<?=$value['Gambar']?>" class="img-responsive" alt=""/>
						</div>
					   <div class="cart-item-info">
						    <h3><a href="single.html"><?=$value['Nama_Barang']?></a></h3>
							<ul class="qty">
								<li><p>Harga Satuan : <?=$value['Harga_Satuan']?></p></li>
								<li><p>Qty : <?=$user_session['qty'][$i]?></p></li>
							</ul>
							<div class="delivery">
								 <p>Subharga : Rp <?=$value['Harga_Satuan']*$user_session['qty'][$i]?></p>
								 <span>Delivered in 2-3 bussiness days</span>
								 <div class="clearfix"></div>
							</div>								
					   </div>
					   <div class="clearfix"></div>
										
				  </div>
			 </div>
			 <?php }}}?>		
		</div>
		<div class="clearfix"> </div>
	</div>
</div>
<!-- //check out -->
<!---->
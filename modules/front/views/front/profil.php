<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\modules\front\models\placeOrderModel;
use yii\helpers\Url;

$model=new placeOrderModel();
$session = Yii::$app->session;
$session->open();
$user_session = $session['session.user'];
$session->close();

$user = $model->findUser($user_session['username'],$user_session['email']);

$this->title = 'profil';
$this->params['breadcrumbs'][] = $this->title;


?>
<!-- check out -->
<div class="container">
	<div class="check-sec">	 
		<div class="col-md-3 cart-total">
			<a class="continue" href="<?=Url::To('product')?>">Lanjut Belanja</a>
			<div class="price-details">
			<?php foreach($user as $key => $value){ $id = $value['customers_id'];?>
				<h3>Profil Pelanggan</h3>
				<span>Nama</span>
				<span class="total1"><?=$value['first_name']?> <?=$value['middle_name']?> <?=$value['last_name']?></span>
				<span>Terdaftar Sejak</span>
				<span class="total1"><?=$value['user_registered']?></span>
				<span>Email</span>
				<span class="total1"><?=$value['email_address']?></span>
				<span>Phone</span>
				<span class="total1"><?=$value['phone_number']?></span>
				<span>City</span>
				<span class="total1"><?=$value['city']?></span>
				<span>Country</span>
				<span class="total1"><?=$value['country']?></span>
				<div class="clearfix"></div>
			<?php } ?>
			</div>	
			
			<div class="clearfix"></div>
			<div class="clearfix"></div>
			<a class="order" href="#">Edit Profil</a>
		</div>
		<div class="col-md-9 cart-items">
			<h1>Riwayat Pembelian</h1>
			<?php $i=1; foreach ( $model->findUserOrder($id) as $key => $value) {	
			?>
			<div class="cart-header">
				
				<div class="cart-sec simpleCart_shelfItem">
					   <div class="cart-item-info">
						    <h3><a href="single.html">Pembelian tgl : <?=$value['date_order_placed']?></a><span>Item yang dibeli</span></h3>
							<ul class="qty">
								<?php foreach ( $model->findItemOrder($value['order_id']) as $key => $item) {	?>
								<li><p><?=$item['Nama_Barang']?> </p></li>
								<li><p>Qty : <?=$item['order_item_quantity']?> <?=$item['Nama']?></p></li><br>
								<?php }?><br>
								<li><p>Status Pemesanan </p></li>
								<li><p><?php if($value['order_status_code']==0)
											echo 'Belum Dibayar';
											else if($value['order_status_code']==1)
											echo 'Telah dibayar';
											else
											echo 'Pembayaran dikonfirmasi';?></p></li><br>
							</ul>
							<div class="delivery">
								 <p>Rp <?=$value['shipping_price']?> (Biaya Pengiriman) </p><br>
								 <p>Rp <?php echo $value['shipping_price']+$value['total_price']?> (Total Biaya)  </p>
								 <span><?php if($value['order_status_code']<1) echo '<a class="cpns" href="'.Url::To(['/front/front/confirm',"id"=>$value['order_id']]).'">confim pembayaran</a>';
											else echo '<a class="cpns" href="'.Yii::$app->urlManager->createUrl(['/front/front/print',"id"=>$value['order_id']]).'">invoice</a>';?></span><br>
								 <?php if($value['order_status_code']==2){
									foreach ( $model->findShippingOrder($value['order_id']) as $key => $shipping) {
										if($shipping['status_pengiriman']=0)
											echo '<p>Dalam Proses</p>';
										else if($shipping['status_pengiriman']=1)
											echo '<p>Telah Dikirim</p><span>'.$shipping['tgl_pengiriman'].'</span>';
										else
											echo '<p>Telah diterima</p><span>'.$shipping['tgl_diteri'].'</span>';
									}
								 }?>
								 <div class="clearfix"></div>
								 
								 <hr>
							</div>								
					   </div>
					   <div class="clearfix"></div>
											
				  </div>
			 </div>
			
		<?php } ?>
		<div class="clearfix"> </div>
	</div>
</div>
<!-- //check out -->
<div class="clearfix"></div>
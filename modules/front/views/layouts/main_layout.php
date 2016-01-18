<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

$session = Yii::$app->session;
$session->open();
$user_session = $session['session.user'];
$session->close();

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<?= Html::a("login", Yii::$app->urlManager->createUrl('site/login'), array(["class"=>["btn btn-primary"]])) ?>
<!--header-->	
<script src="js/responsiveslides.min.js"></script>
<script>  
    $(function () {
      $("#slider").responsiveSlides({
      	auto: true,
      	nav: true,
      	speed: 500,
        namespace: "callbacks",
        pager: false,
      });
    });
  </script>
  
<div class="header-top">
	 <div class="header-bottom">			
				<div class="logo">
					<h1><a href="<?=Yii::$app->urlManager->createUrl('/front/front/')?>">Autocom</a></h1>					
				</div>
			 <!---->		 
			 <div class="top-nav">
				<ul class="memenu skyblue"><li class="grid"><a href="<?=Yii::$app->urlManager->createUrl('/front/front/')?>">Home</a></li>
					<li class="grid"><a href="<?=Yii::$app->urlManager->createUrl('/front/front/product')?>">Products</a>
					</li>
					<?php if($user_session['login']) echo '
					<li class="grid"><a href="'.Yii::$app->urlManager->createUrl('/front/front/profile').'">Profile</a></li>';
					?>
				</ul>				
			 </div>
			 <?php
			 	if($user_session['login']){
					if($user_session['jml_check_out'])
						$url_co=Url::to(['/front/front/checkout']);
					else
						$url_co="#";
				 	echo '
				 		<div class="cart box_1"><p><a href="'.Url::to(['/site/logout-ecommerce']).'" class="simpleCart_empty">Logout</a></p></div>
				 		<div class="cart box_1">
							 <a href="'.$url_co.'">
								<div class="total">
								<span>Rp '.$user_session['subprice'].'</span> (<span>'.$user_session['jml_check_out'].'</span>)</div>
								<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
							</a>
							<p><a href="'.Url::to(['/front/front/empty-chart']).'" class="simpleCart_empty">Empty Cart</a></p>
						 	<div class="clearfix"> </div>
						 </div >
						 ';
			 	}else{

			 		echo '
			 		<div class="cart box_1"><p><a href="'.Yii::$app->urlManager->createUrl('/front/front/create_user').'" class="simpleCart_empty">Sign Up</a> | 
			 		<a href="'.Yii::$app->urlManager->createUrl('/front/front/login_user').'" class="simpleCart_empty">Login</a></p></div> 
			 		
			 		';
			 	}
			 ?>
			 
			 <!---->
			 
			 <div class="clearfix"> </div>
			 <!---->			 
			 </div>
			<div class="clearfix"> </div>
</div>
        <?= $content ?>
<div class="copywrite">
	 <div class="container">
		 <div class="copy">
			 <p>© 2015 Lighting. All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
		 </div>
		 <div class="social">							
				<a href="#"><i class="facebook"></i></a>
				<a href="#"><i class="twitter"></i></a>
				<a href="#"><i class="dribble"></i></a>	
				<a href="#"><i class="google"></i></a>	
				<a href="#"><i class="youtube"></i></a>	
		 </div>
		 <div class="clearfix"></div>
	 </div>
</div>
<!---->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

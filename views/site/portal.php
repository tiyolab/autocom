<?php

use app\models\Module;
use yii\helpers\Url;

use yii\helpers\Html;

$module = Module::find()->asArray()->all();

$session = Yii::$app->session;
$session->open();
$user_session = $session['session.user'];
$session->close();
?>

<style>
.active{
	background: rgb(3, 169, 245) !important;
}

.diactive{
	background: rgb(51, 51, 51) !important;
}
</style>

<div id = "kotak-logout" style="text-align: right; padding: 15dp">
	<label style="color:white; margin-right:15dp">Welcome <?=$user_session['username']?>, You're Login as <?=$user_session['user_type']?> | </label> <a href="<?= Yii::$app->urlManager->createUrl("site/logout") ?>" data-method="post"><i class="fa fa-power-off"></i> Logout</a><br>
</div>

<?php 
/*foreach ($module as $key => $value) {
	if(isset($user_session['hak_akses'][$value['id']]) && !empty($user_session['hak_akses'][$value['id']])){
		echo Html::a($value['name'], Yii::$app->urlManager->createUrl(strtolower($value['name'])), ["disabled"=>false, "class"=>["btn", "btn-primary"], "style"=>["color"=>"white"]]);
	}else{
		echo Html::a($value['name'], null, ["disabled"=>true, "class"=>["btn", "btn-primary"], "style"=>["color"=>"black"]]);
	}
}*/


function isModule($user_session, $module, $string){
	foreach ($module as $key => $value) {
		if(strtolower($value['name']) === $string){
			if(isset($user_session['hak_akses'][$value['id']]) && !empty($user_session['hak_akses'][$value['id']])){
				echo " class = 'active my_link' destination = '".Yii::$app->urlManager->createUrl(strtolower($value['name']))."'";
			}else{
				echo " class = 'diactive my_link' destination = ''";
			}
		}
	}
}

?>
 

<div class="logocontainer">
    	<div class="row">
        	<h1><a href="#">Autocomp Information System</a></h1>
            <div class="clear"></div>
            <div class="templatemo_smalltitle">D'Most Corp.</div>
       </div>
    </div>
    <div class="container">
        <div class="row templatemo_gallerygap">
            <div class="col-md-3 col-sm-12">
                <a href="#"><img src="<?=Url::to('@web/portal_assets')?>/images/fix.png" alt="Polygon HTML5 Template"><br><br></a>
            </div>
        </div>
    </div>
	
    <!-- logo end -->    
   <div id="menu-container" class="main_menu">
   <!-- homepage start -->
    <div class="content homepage" id="menu-1">
  	<div class="container">
          	<div class="col-md-3 col-lg-4 templatemo_leftgap">
            	
                <div class="templatemo_mainservice templatemo_botgap"><img src="<?=Url::to('@web/portal_assets')?>/images/security.png" alt="home img 01" <?=isModule($user_session, $module, "security")?> ></div>
                <div class="templatemo_mainimg"><img src="<?=Url::to('@web/portal_assets')?>/images/accounting.png" alt="home img 01" <?=isModule($user_session, $module, "accounting")?> ></div>
            </div>
            
			<div class="col-md-3 col-lg-3 templatemo_leftgap">
                <div class="templatemo_mainservice templatemo_botgap"><img src="<?=Url::to('@web/portal_assets')?>/images/hrd.png" alt="home img 01" <?=isModule($user_session, $module, "human-resource")?> ></div>
                <div class="templatemo_mainservice templatemo_botgap"><img src="<?=Url::to('@web/portal_assets')?>/images/payroll.png" alt="home img 01" <?=isModule($user_session, $module, "payroll")?> ></div>
                <div class="templatemo_mainservice templatemo_botgap"><img src="<?=Url::to('@web/portal_assets')?>/images/logistic.png" alt="home img 01" <?=isModule($user_session, $module, "logistik")?> ></div>
            	
            </div>
			<div class="col-md-3 col-lg-3 templatemo_leftgap">
                <div class="templatemo_mainservice templatemo_botgap"><img src="<?=Url::to('@web/portal_assets')?>/images/warehouse.png" alt="home img 01" <?=isModule($user_session, $module, "warehouse")?> ></div>
                <div class="templatemo_mainservice templatemo_botgap"><img src="<?=Url::to('@web/portal_assets')?>/images/arsip.png" alt="home img 01" <?=isModule($user_session, $module, "surat-arsip")?> ></div>
                <div class="templatemo_mainservice templatemo_botgap"><img src="<?=Url::to('@web/portal_assets')?>/images/e_commerce.png" alt="home img 01" <?=isModule($user_session, $module, "e-commerce")?> ></div>

            </div>
    </div>
    
   </div>
    <!-- homepage end -->
        <!-- contact end --> 
    
    </div>
    
    	<!-- logo start -->
    <div class="logocontainer">
    	<div class="row">
            <div class="templatemo_footer">Copyright © Autocomp D'Most adapted by Matrix template</div>
       </div>
    </div>


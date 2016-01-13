<?php

if (class_exists('yii\debug\Module')) {
    $this->off(\yii\web\View::EVENT_END_BODY, [\yii\debug\Module::getInstance(), 'renderToolbar']);
}

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

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
<body class="glossed">
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-42863888-4', 'pinsupreme.com');
  ga('send', 'pageview');

</script>

<?php $this->beginBody() ?>

<div class="all-wrapper fixed-header left-menu hide-side-menu">
  <div class="page_header">
  <div class="header-links hidden-xs">
    <div class="top-search-w pull-right">
      <input type="text" class="top-search" placeholder="Search"/>
    </div>

    <div class="dropdown">
      <a href="#" class="header-link clearfix" data-toggle="dropdown">
        <div class="avatar">
          <img src="assets/images/avatar-small.jpg" alt="">
        </div>
        <div class="user-name-w">
          <?= Yii::$app->user->identity->username ?> <i class="fa fa-caret-down"></i>
        </div>
      </a>
      <ul class="dropdown-menu dropdown-inbar">
        <li><a href="<?= Url::to(['/site/logout'])?>" data-method="post"><i class="fa fa-power-off"></i> Logout</a></li>
      </ul>
    </div>
  </div>
  <a class="current logo hidden-xs" href="index.php"><i class="fa fa-rocket"></i></a>
  
  <h1>E-Commerce Department</h1>
</div>

<div class="side">
	  <div class="sidebar-wrapper">
	  <ul>	  
			<li>
			  <a href="<?= Url::to(['logistik/index'])?>" data-toggle="tooltip" data-placement="right" title="" data-original-title="Dashboard">
				<i class="fa fa-home"></i>
			  </a>
			</li>
			<li>
				<a href="<?= Url::to(['logistik/kendaraan'])?>" data-toggle="tooltip" data-placement="right" title="" data-original-title="Monitoring Kendaraan">
				<i class="fa fa-truck"></i>
			  </a>
			</li>
			<li>
				<a href="<?= Url::to(['logistik/pengiriman'])?>" data-toggle="tooltip" data-placement="right" title="" data-original-title="Monitoring Pengiriman">
				<i class="fa fa-shopping-cart"></i>
			  </a>
			</li>
	  	</ul>
	</div>
</div>
  
<div class="main-content">
    <?=$content?>
  </div>
<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>
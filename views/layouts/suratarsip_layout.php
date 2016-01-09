<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;
use yii\bootstrap\Nav;
use yii\helpers\Url;

AppAsset::register($this);

if(class_exists('yii\debug\Module')){
	$this->off(\yii\web\View::EVENT_END_BODY, [\yii\debug\Module::getInstance(), 'renderToolbar']);
}

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
			<div class="dropdown hidden-sm hidden-xs">
				<a href="#" data-toggle="dropdown" class="header-link"><i class="fa fa-bolt"></i> User Alerts <span class="badge alert-animated">5</span></a>

				<ul class="dropdown-menu dropdown-inbar dropdown-wide">
					<li><a href="#"><span class="label label-warning">1 min</span> <i class="fa fa-bell"></i> New Mail Received</a></li>
					<li><a href="#"><span class="label label-warning">4 min</span> <i class="fa fa-fire"></i> Server Crash</a></li>
					<li><a href="#"><span class="label label-warning">12 min</span> <i class="fa fa-flag-o"></i> Pending Alert</a></li>
					<li><a href="#"><span class="label label-warning">15 min</span> <i class="fa fa-smile-o"></i> User Signed Up</a></li>
				</ul>
			</div>
			<div class="dropdown hidden-sm hidden-xs">
				<a href="#" data-toggle="dropdown" class="header-link"><i class="fa fa-cog"></i> Settings</a>

				<ul class="dropdown-menu dropdown-inbar">
					<li><a href="#"><span class="label label-warning">2</span> <i class="fa fa-envelope"></i> Messages</a></li>
					<li><a href="#"><span class="label label-warning">4</span> <i class="fa fa-users"></i> Friends</a></li>
					<li><a href="#"><i class="fa fa-cog"></i> Account Settings</a></li>
					<li><a href="#"><i class="fa fa-power-off"></i> Logout</a></li>
				</ul>
			</div>

			<div class="dropdown">
				<a href="#" class="header-link clearfix" data-toggle="dropdown">
					<div class="avatar">
						<img src="assets/images/avatar-small.jpg" alt="">
					</div>
					<div class="user-name-w">
						Lionel Messi <i class="fa fa-caret-down"></i>
					</div>
				</a>
				<ul class="dropdown-menu dropdown-inbar">
					<li><a href="#"><span class="label label-warning">2</span> <i class="fa fa-envelope"></i> Messages</a></li>
					<li><a href="#"><span class="label label-warning">4</span> <i class="fa fa-users"></i> Friends</a></li>
					<li><a href="#"><i class="fa fa-cog"></i> Account Settings</a></li>
					<li><a href="#"><i class="fa fa-power-off"></i> Logout</a></li>
				</ul>
			</div>
		</div>
		<a class="current logo hidden-xs" href="index.html"><i class="fa fa-rocket"></i></a>
		<h1>Dashboard</h1>
	</div>
	<div class="side">
		<div class="sidebar-wrapper">
			<ul>
				<li class='current'>
					<a href="<?php echo Url::to('buat-surat') ?>" class="current" data-toggle="tooltip" data-placement="right" title="" data-original-title="Buat Surat">
						<i class="fa fa-home"></i>
					</a>
				</li>
				<li>
					<a href="<?php echo Url::to('surat-masuk') ?>" data-toggle="tooltip" data-placement="right" title="" data-original-title="Surat Masuk">
						<i class="fa fa-file-text-o"></i>
					</a>
				</li>
				<li>
					<a href="<?php echo Url::to('surat-keluar') ?>" data-toggle="tooltip" data-placement="right" title="" data-original-title="Surat Keluar">
						<span class="badge"></span>
						<i class="fa fa-code-fork"></i>
					</a>
				</li>
				<li>
					<a href="<?php echo Url::to('persetujuan-surat') ?>" data-toggle="tooltip" data-placement="right" title="" data-original-title="Persetujuan Surat">
						<i class="fa fa-bar-chart-o"></i>
					</a>
				</li>
				<li>
					<a class="menu-toggler" href="#" data-toggle="tooltip" data-placement="right" title="" data-original-title="Arsip">
						<i class="fa fa-th"></i>
					</a>
				</li>

			</ul>
		</div>
		<div class="sub-sidebar-wrapper">
			<ul class="nav">
				<?php
				echo Nav::widget([
					'items' => [
						['label' => 'Buat Arsip', 'url' => ['/surat-arsip/buat-arsip']],
						['label' => 'Arsip', 'url' => ['/surat-arsip/arsip']],
						['label' => 'Buat Memo', 'url' => ['/surat-arsip/buat-memo']],
						['label' => 'Memo Masuk', 'url' => ['/surat-arsip/memo-masuk']],
						['label' => 'Memo Keluar', 'url' => ['/surat-arsip/memo-keluar']],

					],
				]);
				?>
			</ul>
		</div>
	</div>
	<div class="main-content">
		<?=$content;   ?>
	</div>
	<div class="page-footer">
		© 2013 Saturn Admin Template.
	</div>
</div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
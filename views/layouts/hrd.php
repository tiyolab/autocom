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

<?php 
	$session = Yii::$app->session;
	$session->open();
	$user_session = $session['session.user'];
	$session->close();
?>

<div class="all-wrapper fixed-header left-menu">
  <div class="page_header">
  <div class="header-links hidden-xs">
    <div class="top-search-w pull-right">
      <input type="text" class="top-search" placeholder="Search"/>
    </div>

    <div class="dropdown">
      <a href="#" class="header-link clearfix" data-toggle="dropdown">
        <div class="avatar">
          <img src="<?= Yii::$app->urlManager->createUrl(['assets/images/avatar-small.jpg']) ?>" alt="">
        </div>
        <div class="user-name-w">
          <?php echo $user_session['username']?> <i class="fa fa-caret-down"></i>
        </div>
      </a>
      <ul class="dropdown-menu dropdown-inbar">
        <li><a href=<?= Yii::$app->urlManager->createUrl("site/logout") ?> data-method="post"><i class="fa fa-power-off"></i> Logout</a></li>
      </ul>
    </div>
  </div>
  <a class="current logo hidden-xs" href="<?= Yii::$app->urlManager->createUrl(['human-resource']) ?>"><i class="fa fa-rocket"></i></a>
  <a class="menu-toggler" href="#"><i class="fa fa-bars"></i></a>
  <h1>Human Resource Department</h1>
</div>

<div class="side">
	  <div class="sidebar-wrapper">
	  <ul>	
		<?php 
		
		if($user_session['user_type'] == 'sekretaris'){
			//echo "super";		
		?>		
			<li>
			  <a href="<?= Yii::$app->urlManager->createUrl(['human-resource']) ?>" data-toggle="tooltip" data-placement="right" title="" data-original-title="Dashboard">
				<i class="fa fa-home"></i>
			  </a>
			</li>
			<li>			
				<a href="<?= Yii::$app->urlManager->createUrl(['human-resource/profil']) ?>" data-toggle="tooltip" data-placement="right" title="" data-original-title="Data Pegawai">
				<i class="fa fa-group"></i>
				</a>
			</li>
			<li>			
				<a href="<?= Yii::$app->urlManager->createUrl(['human-resource/absensi']) ?>" data-toggle="tooltip" data-placement="right" title="" data-original-title="Absensi Pegawai">
				<i class="fa fa-bell-o"></i>
				</a>
			</li>
			<li>
			  <a href="<?= Yii::$app->urlManager->createUrl(['human-resource/aktivitas']) ?>" data-toggle="tooltip" data-placement="right" title="" data-original-title="Aktivitas Pegawai">
				<i class="fa fa-bar-chart-o"></i>
			  </a>
			</li>
			<li>
			  <a href="<?= Yii::$app->urlManager->createUrl(['human-resource/lembur']) ?>" data-toggle="tooltip" data-placement="right" title="" data-original-title="Jadwal Lembur Pegawai">
				<i class="fa fa-calendar"></i>
			  </a>
			</li>
			<li>
			  <a href="<?= Yii::$app->urlManager->createUrl(['human-resource/rekrut']) ?>" data-toggle="tooltip" data-placement="right" title="" data-original-title="Perekrutan Pegawai">
				<i class="fa fa-check-circle"></i>
			  </a>
			</li>
			<li>
			  <a href="<?= Yii::$app->urlManager->createUrl(['human-resource/gaji']) ?>" data-toggle="tooltip" data-placement="right" title="" data-original-title="Gaji Pokok Pegawai">
				<i class="fa fa-usd"></i>
			  </a>
			</li>
			<li>
			  <a href="<?= Yii::$app->urlManager->createUrl(['human-resource/pelanggaran']) ?>" data-toggle="tooltip" data-placement="right" title="" data-original-title="Pelangaran Pegawai">
				<i class="fa fa-warning"></i>
			  </a>
			</li>
		<?php } else if($user_session['user_type'] == 'super admin'){?>
			<li>
			  <a href="<?= Yii::$app->urlManager->createUrl(['human-resource']) ?>" data-toggle="tooltip" data-placement="right" title="" data-original-title="Dashboard">
				<i class="fa fa-home"></i>
			  </a>
			</li>
			<li>			
				<a href="<?= Yii::$app->urlManager->createUrl(['human-resource/profil']) ?>" data-toggle="tooltip" data-placement="right" title="" data-original-title="Data Pegawai">
				<i class="fa fa-group"></i>
				</a>
			</li>
			<li>			
				<a href="<?= Yii::$app->urlManager->createUrl(['human-resource/absensi']) ?>" data-toggle="tooltip" data-placement="right" title="" data-original-title="Absensi Pegawai">
				<i class="fa fa-bell-o"></i>
				</a>
			</li>
			<li>
			  <a href="<?= Yii::$app->urlManager->createUrl(['human-resource/aktivitas']) ?>" data-toggle="tooltip" data-placement="right" title="" data-original-title="Aktivitas Pegawai">
				<i class="fa fa-bar-chart-o"></i>
			  </a>
			</li>
			<li>
			  <a href="<?= Yii::$app->urlManager->createUrl(['human-resource/lembur']) ?>" data-toggle="tooltip" data-placement="right" title="" data-original-title="Jadwal Lembur Pegawai">
				<i class="fa fa-calendar"></i>
			  </a>
			</li>
			<li>
			  <a href="<?= Yii::$app->urlManager->createUrl(['human-resource/rekrut']) ?>" data-toggle="tooltip" data-placement="right" title="" data-original-title="Perekrutan Pegawai">
				<i class="fa fa-check-circle"></i>
			  </a>
			</li>
			<li>
			  <a href="<?= Yii::$app->urlManager->createUrl(['human-resource/gaji']) ?>" data-toggle="tooltip" data-placement="right" title="" data-original-title="Gaji Pokok Pegawai">
				<i class="fa fa-usd"></i>
			  </a>
			</li>
			<li>
			  <a href="<?= Yii::$app->urlManager->createUrl(['human-resource/pelanggaran']) ?>" data-toggle="tooltip" data-placement="right" title="" data-original-title="Pelangaran Pegawai">
				<i class="fa fa-warning"></i>
			  </a>
			</li>
			<li>
			  <a href="<?= Yii::$app->urlManager->createUrl(['human-resource/persetujuan']) ?>" data-toggle="tooltip" data-placement="right" title="" data-original-title="Persetujuan">
				<i class="fa fa-envelope-o"></i>
			  </a>
			</li>
			<li>
			  <a href="<?= Yii::$app->urlManager->createUrl(['human-resource/laporan-absensi']) ?>" data-toggle="tooltip" data-placement="right" title="" data-original-title="Laporan">
				<i class="fa fa-book"></i>
			  </a>
			</li>
		<?php } else if($user_session['user_type'] == 'manajer'){?>
			<li>
			  <a href="<?= Yii::$app->urlManager->createUrl(['human-resource']) ?>" data-toggle="tooltip" data-placement="right" title="" data-original-title="Dashboard">
				<i class="fa fa-home"></i>
			  </a>
			</li>
			<li>			
				<a href="<?= Yii::$app->urlManager->createUrl(['human-resource/profil']) ?>" data-toggle="tooltip" data-placement="right" title="" data-original-title="Data Pegawai">
				<i class="fa fa-group"></i>
				</a>
			</li>
			<li>			
				<a href="<?= Yii::$app->urlManager->createUrl(['human-resource/absensi']) ?>" data-toggle="tooltip" data-placement="right" title="" data-original-title="Absensi Pegawai">
				<i class="fa fa-bell-o"></i>
				</a>
			</li>
			<li>
			  <a href="<?= Yii::$app->urlManager->createUrl(['human-resource/rekrut']) ?>" data-toggle="tooltip" data-placement="right" title="" data-original-title="Perekrutan Pegawai">
				<i class="fa fa-check-circle"></i>
			  </a>
			</li>
			<li>
			  <a href="<?= Yii::$app->urlManager->createUrl(['human-resource/pelanggaran']) ?>" data-toggle="tooltip" data-placement="right" title="" data-original-title="Pelangaran Pegawai">
				<i class="fa fa-warning"></i>
			  </a>
			</li>
			<li>
			  <a href="<?= Yii::$app->urlManager->createUrl(['human-resource/persetujuan']) ?>" data-toggle="tooltip" data-placement="right" title="" data-original-title="Persetujuan">
				<i class="fa fa-envelope-o"></i>
			  </a>
			</li>
			<li>
			  <a href="<?= Yii::$app->urlManager->createUrl(['human-resource/laporan-absensi']) ?>" data-toggle="tooltip" data-placement="right" title="" data-original-title="Laporan">
				<i class="fa fa-book"></i>
			  </a>
			</li>
		
		<?php } else if($user_session['user_type'] == 'pegawai'){?>
		
			<li>
			  <a href="<?= Yii::$app->urlManager->createUrl(['human-resource']) ?>" data-toggle="tooltip" data-placement="right" title="" data-original-title="Dashboard">
				<i class="fa fa-home"></i>
			  </a>
			</li>
			<li>			
				<a href="<?= Yii::$app->urlManager->createUrl(['human-resource/profil']) ?>" data-toggle="tooltip" data-placement="right" title="" data-original-title="Data Pegawai">
				<i class="fa fa-group"></i>
				</a>
			</li>
			<li>			
				<a href="<?= Yii::$app->urlManager->createUrl(['human-resource/absensi']) ?>" data-toggle="tooltip" data-placement="right" title="" data-original-title="Absensi Pegawai">
				<i class="fa fa-bell-o"></i>
				</a>
			</li>
			<li>
			  <a href="<?= Yii::$app->urlManager->createUrl(['human-resource/aktivitas']) ?>" data-toggle="tooltip" data-placement="right" title="" data-original-title="Aktivitas Pegawai">
				<i class="fa fa-bar-chart-o"></i>
			  </a>
			</li>
			<li>
			  <a href="<?= Yii::$app->urlManager->createUrl(['human-resource/lembur']) ?>" data-toggle="tooltip" data-placement="right" title="" data-original-title="Jadwal Lembur Pegawai">
				<i class="fa fa-calendar"></i>
			  </a>
			</li>
			<li>
			  <a href="<?= Yii::$app->urlManager->createUrl(['human-resource/pelanggaran']) ?>" data-toggle="tooltip" data-placement="right" title="" data-original-title="Pelangaran Pegawai">
				<i class="fa fa-warning"></i>
			  </a>
			</li>
		<?php }?>
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

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


<div class="modal fade" id="modalFormStyle1" tabindex="-1" role="dialog" aria-labelledby="modalFormStyle1Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="widget widget-blue">
        <div class="widget-title">
            <div class="widget-controls">
				<a href="#" class="widget-control widget-control-full-screen" data-toggle="tooltip" data-placement="top" title="" data-original-title="Full Screen"><i class="fa fa-expand"></i></a>
				<a href="#" class="widget-control widget-control-full-screen widget-control-show-when-full" data-toggle="tooltip" data-placement="left" title="" data-original-title="Exit Full Screen"><i class="fa fa-expand"></i></a>
				<a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top" title="" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
				<a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top" title="" data-original-title="Minimize"><i class="fa fa-minus-circle"></i></a>
			</div>
            <h3><i class="fa fa-ok-circle"></i>Modal Form</h3>
        </div>
        <div class="widget-content">
          <div class="modal-body">
            <div class="form-group">
              <label>Regular Input</label>
              <input type="email" class="form-control" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-group">
              <div class="checkbox">
                <label>
                  <input type="checkbox"> Remember me
                </label>
              </div>
            </div>
            <button type="button" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="all-wrapper fixed-header left-menu">
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
          User <i class="fa fa-caret-down"></i>
        </div>
      </a>
      <ul class="dropdown-menu dropdown-inbar">
        <li><a href="#"><i class="fa fa-power-off"></i> Logout</a></li>
      </ul>
    </div>
  </div>
  <a class="current logo hidden-xs" href="index.php"><i class="fa fa-rocket"></i></a>
  <a class="menu-toggler" href="#"><i class="fa fa-bars"></i></a>
  <h1>Warehouse</h1>
</div>

<div class="side">
	  <div class="sidebar-wrapper">
	  <ul>
		<li>
		  <a href="<?= Url::to(['/warehouse/index'])?>" data-toggle="tooltip" data-placement="right" title="" data-original-title="Dashboard">
			<i class="fa fa-home"></i>
		  </a>
		</li>
		<li>
		  <a href="<?= Url::to(['/warehouse/datamaster'])?>" data-toggle="tooltip" data-placement="right" title="" data-original-title="Data Master">
			<i class="fa fa-folder"></i>
		  </a>
		</li>
		<li>
		  <a href="<?= Url::to(['/warehouse/order'])?>" data-toggle="tooltip" data-placement="right" title="" data-original-title="Order">
			<i class="fa fa-shopping-cart"></i>
		  </a>
		</li>
		<li>
		  <a href="<?= Url::to(['/warehouse/beritaacara'])?>" data-toggle="tooltip" data-placement="right" title="" data-original-title="Berita Acara">
			<i class="fa fa-envelope"></i>
		  </a>
		</li>
		<li>
		  <a href="<?= Url::to(['/warehouse/report'])?>" data-toggle="tooltip" data-placement="right" title="" data-original-title="Report">
			<i class="fa fa-book"></i>
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

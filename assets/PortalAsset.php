<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class PortalAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'portal_assets/css/animate.css',
        'portal_assets/css/bootstrap.min.css',
        'portal_assets/css/easy-responsive-tabs.css',
        'portal_assets/css/font-awesome.css',
        'portal_assets/css/font-awesome.min.css',
        'portal_assets/css/templatemo_misc.css',
        'portal_assets/css/templatemo_style.css',
    ];
    public $js = [
        'portal_assets/js/easyResponsiveTabs.js',
        'portal_assets/js/jquery.lightbox.js',
        'portal_assets/js/templatemo_custom.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}

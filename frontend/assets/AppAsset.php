<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/font-awesome.min.css',
        'css/owl.carousel.min.css',
        'css/style.css',
        'css/responsive.css',
        'css/animate.css',
    ];
    public $js = [
        'js/bootstrap.min.js',
        'js/wow.min.js',
        'js/jquery.easing.min.js',
        'js/parallax.min.js',
        'js/owl.carousel.min.js',
        'js/function.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}

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
        'css/slick.css',
        'css/bootstrap.min.css',
        'css/venobox.css',
        'css/style.css',
    ];
    public $js = [
       // 'js/jquery-2.2.4.min.js',
        'js/jquery-ui.min.js',
        'js/bootstrap.min.js',
        'js/headhesive.min.js',
        'js/matchHeight.min.js',
        'js/modernizr.custom.js',
        'js/slick.min.js',
        'js/venobox.min.js',
        'js/custom.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}

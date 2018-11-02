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
        // <!-- Bootstrap Core CSS -->
        'vender/css/bootstrap.min.css',
        // <!-- Customizable CSS -->
        'vender/css/main.css',
        'vender/css/green.css',
        'vender/css/owl.carousel.css',
        'vender/css/owl.transitions.css',
        // <!--'css/owl.theme.css',-->
        'vender/css/lightbox.css',
        'vender/css/animate.min.css',
        'vender/css/rateit.css',
        'vender/css/bootstrap-select.min.css',
        // <!-- Demo Purpose Only. Should be removed in production -->
        'vender/css/config.css',
        'vender/css/green.css',
        'vender/css/blue.css',
        'vender/css/red.css',
        'vender/css/orange.css',
        'vender/css/dark-green.css',
        // <!-- Demo Purpose Only. Should be removed in production : END -->
        // <!-- Icons/Glyphs -->
        // 'vender/css/font-awesome.min.css',
        'awesome/css/font-awesome.min.css',
        // <!-- Fonts -->
        'http://fonts.googleapis.com/css?family=Roboto:300,400,500,700',
        'vender/css/mystyle.css',
        // <!-- Favicon -->
    ];
    public $js = [
        // <!-- JavaScripts placed at the end of the document so the pages load faster -->
        // 'vender/js/jquery-1.11.1.min.js',
        // 'vender/js/jquery.min.js',
        'vender/js/jquery.number.min.js',
        'vender/js/bootstrap.min.js',
        // 'vender/js/bootstrap-hover-dropdown.min.js',
        'vender/js/owl.carousel.min.js',
        'vender/js/echo.min.js',
        'vender/js/jquery.easing-1.3.min.js',
        'vender/js/bootstrap-slider.min.js',
        'vender/js/jquery.rateit.min.js',
        'vender/js/lightbox.min.js',
        'vender/js/bootstrap-select.min.js',
        'vender/js/wow.min.js',
        'vender/js/scripts.js',
        // <!-- For demo purposes – can be removed on production -->
        'switchstylesheet/switchstylesheet.js',
        'vender/js/main.js',
        // <!-- For demo purposes – can be removed on production : End -->
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}

<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/custom.css',
        'theme/Bootstrap/dist/css/bootstrap-reboot.css',
        'theme/Bootstrap/dist/css/bootstrap.css',
        'theme/Bootstrap/dist/css/bootstrap-grid.css',
        'theme/css/main.css',
        'theme/css/fonts.min.css'
        
    ];
    public $js = [
        'theme/js/jquery.appear.js',
        'theme/js/jquery.mousewheel.js',
        'theme/js/perfect-scrollbar.js',
        'theme/js/jquery.matchHeight.js',
        'theme/js/svgxuse.js',
        'theme/js/imagesloaded.pkgd.js',
        'theme/js/Headroom.js',
        'theme/js/velocity.js',
        'theme/js/ScrollMagic.js',
        'theme/js/jquery.waypoints.js',
        'theme/js/jquery.countTo.js',
        'theme/js/popper.min.js',
        'theme/js/material.min.js',
        'theme/js/bootstrap-select.js',
        'theme/js/smooth-scroll.js',
        'theme/js/selectize.js',
        'theme/js/swiper.jquery.js',
        'theme/js/moment.js',
        'theme/js/daterangepicker.js',
        'theme/js/simplecalendar.js',
        'theme/js/fullcalendar.js',
        'theme/js/isotope.pkgd.js',
        'theme/js/ajax-pagination.js',
        'theme/js/Chart.js',
        'theme/js/chartjs-plugin-deferred.js',
        'theme/js/circle-progress.js',
        'theme/js/loader.js',
        'theme/js/run-chart.js',
        'theme/js/jquery.magnific-popup.js',
        'theme/js/jquery.gifplayer.js',
        'theme/js/mediaelement-and-player.js',
        'theme/js/mediaelement-playlist-plugin.min.js',
        'theme/js/base-init.js',
        'theme/fonts/fontawesome-all.js',
        'theme/Bootstrap/dist/js/bootstrap.bundle.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
        'yii\web\JqueryAsset',
    ];
}

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
        'styles/bootstrap.min.css',
        'styles/shards-dashboards.1.0.0.min.css',
    ];
    public $js = [
        "scripts/jquery-3.3.1.min.js",
        "scripts/popper.min.js",
        "scripts/bootstrap.min.js",
        "scripts/Chart.min.js",
        "scripts/shards.min.js",
        "scripts/shards-dashboards.1.0.0.min.js",
        "scripts/app/app-blog-overview.1.0.0.js",
    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];

    public $cssOptions = [

        'position' => \yii\web\View::POS_HEAD
    ];
}

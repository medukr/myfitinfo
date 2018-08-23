<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\modules\admin\assets;

use yii\web\AssetBundle;
use Yii;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        '/adm/bower_components/bootstrap/dist/css/bootstrap.min.css',     // Bootstrap 3.3.7
        '/adm/bower_components/font-awesome/css/font-awesome.min.css',    // Font Awesome
        '/adm/bower_components/Ionicons/css/ionicons.min.css',            // Ionicons
        '/adm/dist/css/AdminLTE.min.css',                                 // Theme style
        '/adm/dist/css/skins/_all-skins.min.css',     // AdminLTE Skins. Choose a skin from the css/skins
                                                        // folder instead of downloading all of them to
                                                        // reduce the load.
    ];

    public $js = [
//        Зависимость $depends [yii\bootstrap\BootstrapPluginAsset] подключает самостоятельно
//    JQuery, Bootstrap css, Bootstrap js

//        '/adm/bower_components/jquery/dist/jquery.min.js',                    // jQuery 3
//        '/adm/bower_components/bootstrap/dist/js/bootstrap.min.js',           // Bootstrap 3.3.7
        '/adm/bower_components/jquery-slimscroll/jquery.slimscroll.min.js',   // SlimScroll
        '/adm/bower_components/fastclick/lib/fastclick.js',                   // FastClick
        '/adm/dist/js/adminlte.min.js',                                       // AdminLTE App
        '/adm/dist/js/demo.js',                                               // AdminLTE for demo purposes

    ];


    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];

    public $cssOptions = [

        'position' => \yii\web\View::POS_HEAD
    ];

    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub

        $controller = Yii::$app->controller->id;
        $action = Yii::$app->controller->action->id;
//
//        if ( $controller == 'user' ) {
//            if ($action == 'index'){
//
//                /*----Data Tables----*/
//                $this->css[] = '/adm/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css';
//
//                $this->js[] = '/adm/bower_components/datatables.net/js/jquery.dataTables.min.js';
//                $this->js[] = '/adm/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js';
//                $this->js[] = '/adm/scripts/dataTablesScript.js';
//            }
//        }

        if ($action == 'update' || $action == 'create'){

            /*----CK Editor----*/
            $this->js[] = '/adm/bower_components/ckeditor/ckeditor.js';
            $this->js[] = '/adm/scripts/ckeditorScripts.js';
        }


    }


}

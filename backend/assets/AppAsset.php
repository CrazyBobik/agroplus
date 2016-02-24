<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/style.css',
        'css/form.css',
        'plugins/font-awesome-4.5.0/css/font-awesome.min.css',
    ];
    public $js = [
        'js/admin-engine.js',
        'js/admin-configs.js',
        'js/admin-menu.js',
        'js/jquery.form.min.js',
        'js/ajax.js',
        'plugins/tinymce/js/tinymce/tinymce.min.js',
        'plugins/tinymce/js/tinymce/langs/ru.js',
        'plugins/cookie/cookie.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

    public function init(){
        parent::init();

        $style = \Yii::$app->request->cookies->getValue('style', 'blue');
        $this->css[] = 'css/colors/'.$style.'.css';
    }


}

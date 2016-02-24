<?php
/**
 * Created by PhpStorm.
 * User: CrazyBobik
 * Date: 15.02.2016
 * Time: 23:45
 */

namespace frontend\assets;


use yii\web\AssetBundle;

class AgroAsset extends AssetBundle{

    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'css/normalize.css',
        'css/site.css',
        'css/sprite.css',
        'css/slider.css',
        'css/breadcrumbs.css',
    ];
    public $js = [
        'js/main.js',
        'js/slider.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];
}
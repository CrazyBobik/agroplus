<?php

namespace frontend\components;

use common\models\Category;
use common\models\Pages;
use yii\web\UrlRule;

class RouterRule extends UrlRule{

    public function init(){}


    public function createUrl($manager, $route, $params)
    {
        if ($route === '/objects/list'){
            if(isset($params['category'])){
                return $params['category'];
            }
        }
        if($route === '/site/index'){
            if(isset($params['page'])){
                return $params['page'];
            }
        }
        return false;
    }

    public function parseRequest($manager, $request)
    {
        $pathInfo = $request->getPathInfo();
        if($pathInfo === ''){
            $pathInfo = 'main';
        }
        if(method_exists('SiteController', 'action'.ucfirst($pathInfo))){
            return 'site/'.$pathInfo;
        }
        $page = Pages::find()->where(['url' => $pathInfo])->one();
        if($page){
            return ['site/index', ['page' => $page]];
        }
        $page = Category::find()->where(['url' => $pathInfo])->one();
        if($page){
            return ['objects/list', ['category' => $pathInfo]];
        }

        return false;
    }

}
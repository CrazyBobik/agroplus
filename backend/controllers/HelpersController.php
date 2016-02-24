<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Cookie;
use yii\web\Response;

class HelpersController extends Controller
{
    public function actionStyle($color)
    {
        Yii::$app->response->cookies->add(new Cookie([
            'name' => 'style',
            'value' => $color
        ]));
        Yii::$app->response->format = Response::FORMAT_JSON;

        return true;
    }

}

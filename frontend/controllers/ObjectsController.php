<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;

class ObjectsController extends Controller
{
    public function actionList($category)
    {
        return $this->render('list');
    }

    public function actionOne($url)
    {
        Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => 'Description of the page...'
        ]);
        return $this->render('one');
    }

}

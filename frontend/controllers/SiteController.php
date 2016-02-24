<?php

namespace frontend\controllers;

use yii\web\Controller;

class SiteController extends Controller
{
    public function actions(){
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction'
            ]
        ];
    }

    public function actionContacts()
    {
        return $this->render('contacts');
    }

    public function actionIndex($page)
    {
        return $this->render('index', ['page' => $page]);
    }

    public function actionSearch($word)
    {
        return $this->render('search', ['word' => $word]);
    }

}

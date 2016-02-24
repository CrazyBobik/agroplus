<?php

namespace frontend\controllers;

use common\models\News;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class ArticlesController extends Controller
{
    public function actionList()
    {
        $pag = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => News::find()->count()
        ]);
        $news = News::find()
            ->orderBy(['date' => SORT_DESC])
            ->offset($pag->getOffset())
            ->limit($pag->getLimit())
            ->all();

        return $this->render('list', [
            'pag' => $pag,
            'news' => $news
        ]);
    }

    public function actionOne($url)
    {
        $one = News::find()->where(['url' => $url])->one();
        if(empty($one)){
            throw new NotFoundHttpException;
        }
        return $this->render('one');
    }

}

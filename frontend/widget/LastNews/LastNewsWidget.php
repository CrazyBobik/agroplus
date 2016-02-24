<?php
/**
 * Created by PhpStorm.
 * User: CrazyBobik
 * Date: 19.02.2016
 * Time: 16:53
 */

namespace frontend\widget\LastNews;


use common\models\News;
use yii\bootstrap\Widget;

class LastNewsWidget extends Widget{
    public function run(){
        $news = News::find()->orderBy(['date' => SORT_DESC])->limit(3)->all();

        return $this->render('last-news', ['news' => $news]);
    }

}
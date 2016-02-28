<?php
/**
 * Created by PhpStorm.
 * User: CrazyBobik
 * Date: 21.02.2016
 * Time: 23:35
 */

namespace backend\widget\MainMenu;


use common\models\Category;
use common\models\News;
use common\models\Pages;
use yii\base\Widget;

class MainMenuWidget extends Widget{

    public function run(){
        $pages = Pages::find()->indexBy('id')->orderBy('title')->all();
        $news = News::find()->indexBy('id')->orderBy(['date' => SORT_DESC])->limit(10)->all();
        $category = Category::find()
            ->with('childs')
            ->where(['parent' => 0])
            ->indexBy('id')
            ->orderBy(['title' => SORT_ASC])
            ->all();

        return $this->render('menu', [
            'pages' => $pages,
            'news' => $news,
            'category' => $category,
        ]);
    }
}
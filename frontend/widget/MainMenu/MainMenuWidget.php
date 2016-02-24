<?php
/**
 * Created by PhpStorm.
 * User: CrazyBobik
 * Date: 19.02.2016
 * Time: 15:48
 */

namespace frontend\widget\MainMenu;


use common\models\Pages;
use Yii;
use yii\base\Widget;

class MainMenuWidget extends Widget{
    public function run(){
        $pages = Pages::find()->where((['not in', 'url', 'main']))->all();
        $url = Yii::$app->request->getPathInfo();

        return $this->render('menu', ['pages' => $pages, 'url' => $url]);
    }
}
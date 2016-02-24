<?php
/**
 * Created by PhpStorm.
 * User: CrazyBobik
 * Date: 19.02.2016
 * Time: 16:24
 */

namespace frontend\widget\CategoryMenu;


use common\models\Category;
use yii\base\Widget;

class CategoryMenuWidget extends Widget{
    public function run(){
        $category = Category::find()->indexBy('id')->all();

        return $this->render('menu', ['category' => $category]);
    }

}
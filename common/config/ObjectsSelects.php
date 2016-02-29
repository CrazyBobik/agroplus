<?php
/**
 * Created by PhpStorm.
 * User: CrazyBobik
 * Date: 28.02.2016
 * Time: 22:58
 */

namespace common\config;


use common\models\Category;
use yii\helpers\ArrayHelper;

class ObjectsSelects{
    public $category;
    public $fuelMoto;
    public $classMoto;
    public $companyMoto;
    public $presence;

    public static $instance = null;

    private function __construct(){
        $this->category = ArrayHelper::map(Category::find()->andWhere(['parent' => 0])->all(),
            'id', 'title');
        $this->fuelMoto = ArrayHelper::map(Category::find()
            ->andWhere(['parent' => 1, 'type' => 'fuel'])
            ->all(),
            'id', 'title');
        $this->classMoto = ArrayHelper::map(Category::find()
            ->andWhere(['parent' => 1, 'type' => 'class'])
            ->all(),
            'id', 'title');
        $this->companyMoto = ArrayHelper::map(Category::find()
            ->andWhere(['parent' => 1, 'type' => 'company'])
            ->all(),
            'id', 'title');
        $this->presence = [
            0 => 'Нет',
            1 => 'Есть'
        ];
    }

    private function __clone(){}

    public static function init(){
        if(self::$instance == null){
            self::$instance = new self();
        }

        return self::$instance;
    }
}
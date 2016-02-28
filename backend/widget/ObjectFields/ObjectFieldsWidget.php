<?php
/**
 * Created by PhpStorm.
 * User: CrazyBobik
 * Date: 29.02.2016
 * Time: 0:36
 */

namespace backend\widget\ObjectFields;


use common\models\Objects;
use yii\base\Widget;
use Yii;

class ObjectFieldsWidget extends Widget{

    public $scenario;
    public $model;

    public function init(){
        parent::init();

        if ($this->model === null) {
            $this->model = new Objects();
        }
    }

    public function run(){
        return $this->render($this->scenario, [
            'model' => $this->model,
        ]);
    }
}
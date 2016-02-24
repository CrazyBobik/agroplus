<?php
/**
 * Created by PhpStorm.
 * User: CrazyBobik
 * Date: 22.02.2016
 * Time: 23:29
 */

namespace backend\widget\FormUpload;


use yii\base\Widget;

class FormUploadWidget extends Widget{
    public function run(){
        return $this->render('form');
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: CrazyBobik
 * Date: 22.02.2016
 * Time: 22:20
 */

namespace backend\models;


use yii\base\Model;
use yii\web\UploadedFile;

class FileModel extends Model{
    public $file;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['file'], 'file'],
        ];
    }
}
<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "objectsImg".
 *
 * @property integer $id
 * @property integer $objId
 * @property string $img
 */
class ObjectsImg extends ActiveRecord
{
    public $imgs;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'objectsImg';
    }

    public function scenarios(){
        return [
            'default' => ['objId', 'img'],
            'upload' => ['imgs'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['objId', 'img'], 'required'],
            [['objId'], 'integer'],
            [['img'], 'string', 'max' => 50],
            [['imgs'], 'file', 'maxFiles' => 15, 'extensions' => 'gif, jpg, png']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'objId' => 'Obj ID',
            'img' => 'Img',
        ];
    }

    public static function deleteImg($id, $name){
        if(is_file('../../frontend/web/upload/'.$id.'/'.$name)
            && ObjectsImg::deleteAll(['objId' => $id, 'img' => $name])){

            return unlink('../../frontend/web/upload/'.$id.'/t_'.$name)
            && unlink('../../frontend/web/upload/'.$id.'/'.$name);
        }

        return false;
    }

    public static function deleteAllImg($id){
        ObjectsImg::deleteAll(['objId' => $id]);
        $all = glob('../../frontend/web/upload/'.$id.'/*');

        foreach($all as $one){
            unlink($one);
        }

        rmdir('../../frontend/web/upload/'.$id);
    }
}

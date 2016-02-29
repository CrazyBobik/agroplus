<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property string $title
 * @property string $url
 * @property integer $parent
 * @property string $seoTitle
 * @property string $seoKeywords
 * @property string $seoDescription
 * @property mixed childs
 * @property string $h1
 * @property string $text
 * @property string $scenario
 * @property string $type
 */
class Category extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent', 'seoTitle', 'seoKeywords', 'seoDescription', 'h1', 'type'], 'trim'],
            [['parent', 'seoTitle', 'seoKeywords', 'seoDescription', 'h1', 'type'], 'default'],
            [['title', 'url'], 'required'],
            [['parent'], 'integer'],
            [['title', 'url', 'seoTitle', 'seoKeywords', 'seoDescription', 'h1'],
                'string', 'max' => 255],
            [['text', 'type'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'url' => 'Url',
            'parent' => 'Parent',
            'seoTitle' => 'Seo Title',
            'seoKeywords' => 'Seo Keywords',
            'seoDescription' => 'Seo Description',
            'h1' => 'H1',
            'text' => 'Text',
        ];
    }

    public function getCategory(){
        return $this->hasOne(Category::className(), ['id' => 'parent']);
    }

    public function getChilds(){
        return $this->hasMany(Category::className(), ['parent' => 'id']);
    }

    /**
     * @return Category[]
     */
    public static function getAllParents(){
        return Category::find()->where(['parent' => 0])->all();
    }
}

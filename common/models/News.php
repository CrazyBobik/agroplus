<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property string $title
 * @property string $url
 * @property string $seoTitle
 * @property string $seoKeywords
 * @property string $seoDescription
 * @property string $h1
 * @property string $text
 * @property string $date
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'url'], 'required'],
            [['date'], 'safe'],
            [['title', 'url', 'seoTitle', 'seoKeywords', 'seoDescription', 'h1', 'text'], 'string', 'max' => 255]
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
            'seoTitle' => 'Seo Title',
            'seoKeywords' => 'Seo Keywords',
            'seoDescription' => 'Seo Description',
            'h1' => 'H1',
            'text' => 'Text',
            'date' => 'Date',
        ];
    }
}

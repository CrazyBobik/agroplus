<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "objects".
 *
 * @property integer $id
 * @property string $title
 * @property string $url
 * @property string $seoTitle
 * @property string $seoKeywords
 * @property string $seoDescription
 * @property integer $category
 * @property integer $company
 * @property integer $class
 * @property integer $power
 * @property integer $size
 * @property integer $fuel
 * @property integer $gear
 * @property integer $weight
 * @property string $reducer
 * @property string $starter
 * @property string $equipment
 * @property integer $price_usd
 * @property integer $price_uah
 * @property integer $presence
 * @property string $description
 */
class Objects extends ActiveRecord
{
    private $defaultFields = [
        'title',
        'url',
        'seoTitle',
        'seoKeywords',
        'seoDescription',
        'category',
        'price_usd',
        'presence',
        'description',
    ];
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'objects';
    }

    public function scenarios(){
        $scenarious = [
            'default' => array_merge($this->defaultFields, $this->getDiffScenarios('default')),
            'motoblock' => array_merge($this->defaultFields, $this->getDiffScenarios('motoblock')),
        ];

        return $scenarious;
    }

    public function getDiffScenarios($name){
        $diff = [
            'default' => [],
            'motoblock' => [
                'company',
                'class',
                'power',
                'size',
                'fuel',
                'gear',
                'weight',
                'reducer',
                'starter',
                'equipment',
            ],
        ];

        return $diff[$name];
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'url', 'power', 'size', 'price_usd', 'price_uah'], 'required'],
            [['category', 'company', 'class', 'size', 'fuel', 'gear', 'weight', 'price_usd', 'price_uah', 'presence'], 'integer'],
            [['power'], 'double'],
            [['description'], 'string'],
            [['title', 'url', 'seoTitle', 'seoKeywords', 'seoDescription'], 'string', 'max' => 255],
            [['reducer', 'starter', 'equipment'], 'string', 'max' => 50],
            [['url'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'url' => 'Url',
            'seoTitle' => 'Seo Title',
            'seoKeywords' => 'Seo Keywords',
            'seoDescription' => 'Seo Description',
            'category' => 'Категория',
            'class' => 'Класс',
            'power' => 'Мощность л/с',
            'size' => 'Рабочий обьем см/куб',
            'fuel' => 'Тип топлива',
            'gear' => 'Передачи',
            'weight' => 'Масса кг',
            'reducer' => 'Редуктор',
            'starter' => 'Стартер',
            'equipment' => 'Комплектация',
            'price_usd' => 'Цена Usd',
            'price_uah' => 'Цена Uah',
            'presence' => 'Наличие',
            'description' => 'Описание',
            'imgs' => 'Картинки',
        ];
    }

    public function getCat(){
        return $this->hasOne(Category::className(), ['id' => 'category']);
    }

    public function getImgs(){
        return $this->hasMany(ObjectsImg::className(), ['objId' => 'id']);
    }
}

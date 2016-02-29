<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ObjectsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $categories common\models\Category[] */

$this->title = 'Objects';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="objects-index">
<?php  echo $this->render('_search', [
    'model' => $searchModel,
    'categories' => $categories,
]); ?>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Objects', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            [
                'label'=>'url',
                'format' => 'raw',
                'value'=>function ($data) {
                    return '<a href="http://test.agroplus.com.ua/'.$data->url.'">'.$data->url.'</a>';
                },
            ],
//            'url:url',
//            'seoTitle',
//            'seoKeywords',
            // 'seoDescription',
             'cat.title',
            // 'class',
            // 'power',
            // 'size',
            // 'fuel',
            // 'gear',
            // 'weight',
            // 'reducer',
            // 'starter',
            // 'equipment',
            // 'price_usd',
            // 'price_uah',
//             'presence',
            [
                'label'=>'Наличие',
                'format' => 'raw',
                'value'=>function ($data) {
                    $arr = \common\config\ObjectsSelects::init()->presence;
                    return $arr[$data->presence];
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

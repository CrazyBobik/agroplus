<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Статти';
?>
<div class="news-index">

    <?= $this->render('_search', ['model' => $searchModel]); ?>
    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'url:url',
//            'seoTitle',
//            'seoKeywords',
            // 'seoDescription',
            // 'h1',
            // 'text',
             'date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

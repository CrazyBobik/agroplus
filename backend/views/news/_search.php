<?php

use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\NewsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'class' => 'search-form'
        ]
    ]); ?>

    <?= $form->field($model, 'id', [
        'options' => ['class' => 'search-form-field']
    ])->textInput(['class' => 'search-form-value']) ?>

    <?= $form->field($model, 'title', [
        'options' => ['class' => 'search-form-field']
    ])->textInput(['class' => 'search-form-value']) ?>

    <?= $form->field($model, 'url', [
        'options' => ['class' => 'search-form-field']
    ])->textInput(['class' => 'search-form-value']) ?>

    <?php // echo $form->field($model, 'seoTitle') ?>

    <?php // echo $form->field($model, 'seoKeywords') ?>

    <?php // echo $form->field($model, 'seoDescription') ?>

    <?php // echo $form->field($model, 'h1') ?>

    <?php // echo $form->field($model, 'text') ?>

    <?= $form->field($model,'date', [
        'options' => ['class' => 'search-form-field']
    ])->widget(DatePicker::className(),
        [
            'language' => 'ru',
            'dateFormat' => 'yyyy-MM-dd',
            'options' => [
                'class' => 'search-form-value'
            ]
        ]) ?>

    <?= Html::input('submit', 'search', 'Найти', ['class' => 'btn btn-green']) ?>

    <?php ActiveForm::end(); ?>

</div>

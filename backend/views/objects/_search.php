<?php

use common\config\ObjectsSelects;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ObjectsSearch */
/* @var $form yii\widgets\ActiveForm */
/* @var $categories common\models\Category[] */
?>

<div class="objects-search">

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

    <?php  echo $form->field($model, 'category', [
        'options' => ['class' => 'search-form-field']
    ])->dropDownList($categories,
        [
            'class' => 'search-form-value',
            'options' => [
                '' => ['Selected' => true]
            ]
        ]) ?>

    <?php // echo $form->field($model, 'class') ?>

    <?php // echo $form->field($model, 'power') ?>

    <?php // echo $form->field($model, 'size') ?>

    <?php // echo $form->field($model, 'fuel') ?>

    <?php // echo $form->field($model, 'gear') ?>

    <?php // echo $form->field($model, 'weight') ?>

    <?php // echo $form->field($model, 'reducer') ?>

    <?php // echo $form->field($model, 'starter') ?>

    <?php // echo $form->field($model, 'equipment') ?>

    <?php // echo $form->field($model, 'price_usd') ?>

    <?php // echo $form->field($model, 'price_uah') ?>

    <?php  echo $form->field($model, 'presence', [
        'options' => ['class' => 'search-form-field']
    ])->dropDownList(array_merge(['' => 'Все'], ObjectsSelects::init()->presence),
        [
            'class' => 'search-form-value',
            'option' => [
                '' => ['Selected' => true]
            ]
        ]) ?>

    <?= Html::input('submit', 'search', 'Найти', ['class' => 'btn btn-green']) ?>

    <?php ActiveForm::end(); ?>

</div>

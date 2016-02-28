<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CategorySearch */
/* @var $form yii\widgets\ActiveForm */
/* @var $parents common\models\Category[] */
?>

<div class="category-search">

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

    <?= $form->field($model, 'parent', [
        'options' => ['class' => 'search-form-field']
    ])->dropDownList($parents, [
        'class' => 'search-form-value',
        'options' => [
            '' => ['Selected' => true]
        ]
    ]) ?>

    <?php // echo $form->field($model, 'seoTitle') ?>

    <?php // echo $form->field($model, 'seoKeywords') ?>

    <?php // echo $form->field($model, 'seoDescription') ?>

    <?= Html::input('submit', 'search', 'Найти', ['class' => 'btn btn-green']) ?>

    <?php ActiveForm::end(); ?>

</div>

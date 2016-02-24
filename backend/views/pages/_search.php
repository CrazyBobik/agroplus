<?php

use backend\models\PagesSearch;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PagesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

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

    <?= Html::input('submit', 'search', 'Найти', ['class' => 'btn btn-green']) ?>

<?php ActiveForm::end(); ?>
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Category */
/* @var $parents common\models\Category[] */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parent')->dropDownList($parents, [
        'options' => [
            '0' => ['Selected' => true]
        ]
    ]) ?>

    <?= $form->field($model, 'seoTitle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'seoKeywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'seoDescription')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

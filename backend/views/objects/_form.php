<?php

use backend\widget\ObjectFields\ObjectFieldsWidget;
use common\config\ObjectsSelects;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Objects */
/* @var $form yii\widgets\ActiveForm */
/* @var $isUpdate bool */
?>

<div class="objects-form">

    <?php $form = ActiveForm::begin([
        'enableClientValidation' => false,
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'seoTitle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'seoKeywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'seoDescription')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category')->dropDownList(ObjectsSelects::init()->category, [
        'options' => [
            $model->category => ['Selected' => true]
        ]
    ]) ?>

    <div class="diff-fields">
        <?= ObjectFieldsWidget::widget([
            'scenario' => $model->getScenario(),
            'model' => $model
        ]) ?>
    </div>

    <?= $form->field($model, 'price_usd')->textInput() ?>

    <?php //echo $form->field($model, 'price_uah')->textInput() ?>

    <?= $form->field($model, 'presence')->dropDownList(ObjectsSelects::init()->presence, [
        'options' => [
            $model->presence => ['Selected' => true]
        ]
    ]) ?>

    <?= $form->field($model, 'description', [
        'options' => ['class' => 'tinymce']
    ])->textarea(['maxlength' => true]) ?>

    <?php if($isUpdate){ ?>
        <div id="imgs" class="form-group field-objects-presence">
            <label class="control-label" for="objects-imgs">Картинки</label>

            <input id="objects-imgs" class="form-control" type="file" name="ObjectsImg[imgs][]"
                   multiple>
        </div>

        <div class="obj-imgs">
            <?php foreach($model->imgs as $img){ ?>
                <div class="one-obj-img"
                     data-id="<?= $model->id ?>"
                     data-name="<?= $img->img ?>">
                    <i class="fa fa-close del del-obj-img"></i>
                    <img class="choice" src="http://test.agroplus.com.ua/upload/<?= $model->id ?>/t_<?= $img->img ?>" alt="">
                </div>
            <?php } ?>
        </div>
    <?php } ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
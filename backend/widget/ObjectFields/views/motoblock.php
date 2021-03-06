<?php
/**
 * Created by PhpStorm.
 * User: CrazyBobik
 * Date: 29.02.2016
 * Time: 0:20
 */
use common\config\ObjectsSelects;
use yii\widgets\ActiveForm;

/* @var $model common\models\Objects */

$form = new ActiveForm();
?>
<?= $form->field($model, 'company')->dropDownList(ObjectsSelects::init()->companyMoto, [
    'options' => [
        $model->company => ['Selected' => true]
    ]
]) ?>

<?= $form->field($model, 'class')->dropDownList(ObjectsSelects::init()->classMoto, [
    'options' => [
        $model->class => ['Selected' => true]
    ]
]) ?>

<?= $form->field($model, 'power')->textInput() ?>

<?= $form->field($model, 'size')->textInput() ?>

<?= $form->field($model, 'fuel')->dropDownList(ObjectsSelects::init()->fuelMoto, [
    'options' => [
        $model->fuel => ['Selected' => true]
    ]
]) ?>

<?= $form->field($model, 'gear')->textInput() ?>

<?= $form->field($model, 'weight')->textInput() ?>

<?= $form->field($model, 'reducer')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'starter')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'equipment')->textInput(['maxlength' => true]) ?>

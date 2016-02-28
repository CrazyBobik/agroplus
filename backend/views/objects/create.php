<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Objects */
/* @var $categories common\models\Category[] */

$this->title = 'Create Objects';
$this->params['breadcrumbs'][] = ['label' => 'Objects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="objects-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'categories' => $categories,
    ]) ?>

</div>

<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\widgets\LinkPager;

/* @var $pag \yii\data\Pagination */
/* @var $news \common\models\News[] */
?>
<?php foreach($news as $one){?>
    <a style="display: block" href="<?= Url::toRoute('/articles/'.$one->url) ?>">
        <?= $one->id ?>===
        <?= $one->title ?>
    </a>
<?php } ?>

<?= LinkPager::widget(['pagination' => $pag]) ?>

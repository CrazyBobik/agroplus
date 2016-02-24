<?php
/**
 * Created by PhpStorm.
 * User: CrazyBobik
 * Date: 19.02.2016
 * Time: 16:52
 */

/**
 * @var $news common\models\News[]
 */
use yii\helpers\Url;

?>
<div class="last-news">
    <div class="wrapper">
        <div class="last-news-head">Последние статти</div>
        <div class="last-news-context">
            <? foreach($news as $one){?>
                <a class="last-news-one" href="<?= Url::toRoute(['/articles/'.$one->url]) ?>">
                    <?= $one->title ?>
                </a>
            <? } ?>

            <a class="all-news-btn" href="<?= Url::toRoute('/articles/list') ?>">Посмотреть более поздние статти</a>
        </div>
    </div>
</div>

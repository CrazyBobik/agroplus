<?php
/**
 * @var $pages common\models\Pages[]
 * @var $url string
 */
use yii\helpers\Url;
?>
<nav id="main-nav">
    <? $active = $url === '' ? ' active' : '' ?>
    <a class="main-nav-elem<?= $active ?>"
       href="<?= Url::toRoute('/') ?>">
        Главная
    </a>

    <? foreach($pages as $page){
        $active = $url === $page->url ? ' active' : '' ?>
        <a class="main-nav-elem<?= $active ?>"
           href="/<?= $page->url ?>">
            <?= $page->title ?>
        </a>
    <?}?>
</nav>

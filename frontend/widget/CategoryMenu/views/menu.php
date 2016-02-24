<?php
/**
 * Created by PhpStorm.
 * User: CrazyBobik
 * Date: 19.02.2016
 * Time: 16:27
 */
/**
 * @var $category common\models\Category[]
 */
?>
<div class="main-category">
    <? foreach($category as $one){?>
        <a class="main-category-one" href="/<?= $one->url ?>">
            <?= $one->title ?>
        </a>
    <? } ?>
</div>
<!--<div class="sub-category-title">
    Купить чтото
</div>
<div class="sub-category">
    <a class="sub-category-one" href="#">Под Категория 4</a>
    <a class="sub-category-one" href="#">Под Категория 4</a>
    <a class="sub-category-one" href="#">Под Категория 4</a>
    <a class="sub-category-one" href="#">Под Категория 4</a>
    <a class="sub-category-one" href="#">Под Категория 4</a>
    <a class="sub-category-one" href="#">Под Категория 4</a>
    <a class="sub-category-one" href="#">Под Категория 4</a>
</div>-->

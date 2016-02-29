<?php
/**
 * Created by PhpStorm.
 * User: CrazyBobik
 * Date: 21.02.2016
 * Time: 23:35
 */
use yii\helpers\Url;

/**
 * @var $pages \common\models\Pages[]
 * @var $news \common\models\News[]
 * @var $category \common\models\Category[]
 * @var $obj \common\models\Objects[]
 */
?>
<div id="main-menu-bg"></div>
<nav id="main-menu" class="float-left">
    <header class="main-menu-head">
        ГЛАВНОЕ МЕНЮ
    </header>
<!--    Страницы -->
    <div class="main-menu-item" data-id="pages">
        <a class="main-menu-btn" href="<?= Url::toRoute('/pages') ?>">
            <i class="fa fa-list-alt"></i>
            <span>Страницы</span>
        </a>
        <?php if(count($pages) > 0){ ?>
            <div class="toggle-sub-menu float-right">
                <i class="fa fa-chevron-down"></i>
            </div>
        <?php } ?>
        <aside class="main-menu-panel">
            <a class="panel-elem add-tree-leaf" href="<?= Url::toRoute('/pages/create') ?>">
                <i class="fa fa-plus"></i>
            </a>
            <div class="arr-hover">
                <i class="fa fa-angle-right"></i>
            </div>
        </aside>
    </div>
    <?php if(count($pages) > 0){ ?>
        <div class="sub-menu">
            <?php foreach($pages as $page){?>
                <div class="main-menu-item">
                    <a class="main-menu-btn"
                       href="<?= Url::toRoute(['/pages/update', 'id' => $page->id]) ?>">
                        <i class="fa fa-file-text-o"></i>
                        <span><?= $page->title ?></span>
                    </a>
                    <aside class="main-menu-panel">
                        <a class="panel-elem del-tree-leaf"
                           href="<?= Url::toRoute(['/pages/delete', 'id' => $page->id]) ?>"
                           data-confirm="Вы уверены что хотите удалить этот элемент?"
                           data-method="post">
                            <i class="fa fa-trash"></i>
                        </a>
                        <div class="arr-hover">
                            <i class="fa fa-angle-right"></i>
                        </div>
                    </aside>
                </div>
            <?php } ?>
        </div>
    <?php } ?>

<!-- Статти -->
    <div class="main-menu-item" data-id="news">
        <a class="main-menu-btn" href="<?= Url::toRoute('/news') ?>">
            <i class="fa fa-list-alt"></i>
            <span>Статти</span>
        </a>
        <?php if(count($news) > 0){ ?>
            <div class="toggle-sub-menu float-right">
                <i class="fa fa-chevron-down"></i>
            </div>
        <?php } ?>
        <aside class="main-menu-panel">
            <a class="panel-elem add-tree-leaf" href="<?= Url::toRoute('/news/create') ?>">
                <i class="fa fa-plus"></i>
            </a>
            <div class="arr-hover">
                <i class="fa fa-angle-right"></i>
            </div>
        </aside>
    </div>
    <?php if(count($news) > 0){ ?>
        <div class="sub-menu">
            <?php foreach($news as $item){?>
                <div class="main-menu-item">
                    <a class="main-menu-btn"
                       href="<?= Url::toRoute(['/news/update', 'id' => $item->id]) ?>">
                        <i class="fa fa-file-text-o"></i>
                        <span><?= $item->title ?></span>
                    </a>
                    <aside class="main-menu-panel">
                        <a class="panel-elem del-tree-leaf"
                           href="<?= Url::toRoute(['/news/delete', 'id' => $item->id]) ?>"
                           data-confirm="Вы уверены что хотите удалить этот элемент?"
                           data-method="post">
                            <i class="fa fa-trash"></i>
                        </a>
                        <div class="arr-hover">
                            <i class="fa fa-angle-right"></i>
                        </div>
                    </aside>
                </div>
            <?php } ?>
        </div>
    <?php } ?>

    <!-- Категории -->
    <div class="main-menu-item" data-id="category">
        <a class="main-menu-btn" href="<?= Url::toRoute('/category') ?>">
            <i class="fa fa-list-alt"></i>
            <span>Категории</span>
        </a>
        <?php if(count($category) > 0){ ?>
            <div class="toggle-sub-menu float-right">
                <i class="fa fa-chevron-down"></i>
            </div>
        <?php } ?>
        <aside class="main-menu-panel">
            <a class="panel-elem add-tree-leaf" href="<?= Url::toRoute('/category/create') ?>">
                <i class="fa fa-plus"></i>
            </a>
            <div class="arr-hover">
                <i class="fa fa-angle-right"></i>
            </div>
        </aside>
    </div>
    <?php if(count($category) > 0){ ?>
        <div class="sub-menu">
            <?php foreach($category as $item){?>
                <div class="main-menu-item" data-id="<?= $item->id ?>">
                    <a class="main-menu-btn"
                       href="<?= Url::toRoute(['/category/update', 'id' => $item->id]) ?>">
                        <i class="fa fa-file-text-o"></i>
                        <span><?= $item->title ?></span>
                    </a>
                    <?php if(count($item->childs) > 0){ ?>
                        <div class="toggle-sub-menu float-right">
                            <i class="fa fa-chevron-down"></i>
                        </div>
                    <?php } ?>
                    <aside class="main-menu-panel">
                        <a class="panel-elem del-tree-leaf"
                           href="<?= Url::toRoute(['/category/delete', 'id' => $item->id]) ?>"
                           data-confirm="Вы уверены что хотите удалить этот элемент?"
                           data-method="post">
                            <i class="fa fa-trash"></i>
                        </a>
                        <div class="arr-hover">
                            <i class="fa fa-angle-right"></i>
                        </div>
                    </aside>
                </div>

<!--                Подменю категории если есть-->
                <?php if(count($item->childs) > 0){ ?>
                    <div class="sub-menu">
                        <?php foreach($item->childs as $one){ ?>
                            <div class="main-menu-item">
                                <a class="main-menu-btn"
                                   href="<?= Url::toRoute(['/category/update', 'id' => $one->id]) ?>">
                                    <i class="fa fa-file-text-o"></i>
                                    <span><?= $one->title ?></span>
                                </a>
                                <aside class="main-menu-panel">
                                    <a class="panel-elem del-tree-leaf"
                                       href="<?= Url::toRoute(['/category/delete', 'id' => $one->id]) ?>"
                                       data-confirm="Вы уверены что хотите удалить этот элемент?"
                                       data-method="post">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <div class="arr-hover">
                                        <i class="fa fa-angle-right"></i>
                                    </div>
                                </aside>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    <?php } ?>

    <!-- Объекты -->
    <div class="main-menu-item" data-id="obj">
        <a class="main-menu-btn" href="<?= Url::toRoute('/objects') ?>">
            <i class="fa fa-list-alt"></i>
            <span>Товары</span>
        </a>
        <?php if(count($obj) > 0){ ?>
            <div class="toggle-sub-menu float-right">
                <i class="fa fa-chevron-down"></i>
            </div>
        <?php } ?>
        <aside class="main-menu-panel">
            <a class="panel-elem add-tree-leaf" href="<?= Url::toRoute('/objects/create') ?>">
                <i class="fa fa-plus"></i>
            </a>
            <div class="arr-hover">
                <i class="fa fa-angle-right"></i>
            </div>
        </aside>
    </div>
    <?php if(count($obj) > 0){ ?>
        <div class="sub-menu">
            <?php foreach($obj as $item){?>
                <div class="main-menu-item">
                    <a class="main-menu-btn"
                       href="<?= Url::toRoute(['/objects/update', 'id' => $item->id]) ?>">
                        <i class="fa fa-file-text-o"></i>
                        <span><?= $item->title ?></span>
                    </a>
                    <aside class="main-menu-panel">
                        <a class="panel-elem del-tree-leaf"
                           href="<?= Url::toRoute(['/objects/delete', 'id' => $item->id]) ?>"
                           data-confirm="Вы уверены что хотите удалить этот элемент?"
                           data-method="post">
                            <i class="fa fa-trash"></i>
                        </a>
                        <div class="arr-hover">
                            <i class="fa fa-angle-right"></i>
                        </div>
                    </aside>
                </div>
            <?php } ?>
        </div>
    <?php } ?>
</nav>

<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\assets\AgroAsset;
use frontend\widget\CategoryMenu\CategoryMenuWidget;
use frontend\widget\LastNews\LastNewsWidget;
use frontend\widget\MainMenu\MainMenuWidget;
use yii\helpers\Html;
use yii\helpers\Url;

AgroAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<header id="main-head">
    <div class="main-head-top">
        <div class="wrapper head-top-wrap">
            <?= MainMenuWidget::widget(); ?>
            <form action="<?= Url::toRoute(['/site/search']) ?>" method="get"
                  class="search-form">
                <input class="search-field" type="text" name="word"
                       value="<?= isset($this->params['search'])
                           ? Html::encode($this->params['search']) : '' ?>"
                       placeholder="Искать на сайте">
                <div class="search-btn" onclick="$(this).closest('form').submit();">
                    <div class="sprite search-img"></div>
                </div>
            </form>
        </div>
    </div>


    <div class="wrapper head-context-wrap">
        <div class="logo" itemscope itemtype="http://schema.org/Organization">
            <a itemprop="url" href="#">
                <?= Html::img('/img/logo.png', [
                    'width' => '285',
                    'height' => '107',
                    'itemprop' => 'logo',
                    'alt' => ''
                ]) ?>
            </a>
        </div>

        <div class="top-slider">
            <a class="slide-one" href="#">
                <?= Html::img('/img/slide-1.jpg') ?>
            </a>
            <a class="slide-one" href="#">
                <?= Html::img('/img/slide-2.jpg') ?>
            </a>
            <a class="slide-one" href="#">
                <?= Html::img('/img/slide-3.jpg') ?>
            </a>
        </div>
    </div>

    <div class="main-head-category">
        <div class="wrapper">
            <div class="bread-crumbs">
                <a class="one-crumb" itemscope itemtype="http://data-vocabulary.org/Breadcrumb"
                   href="#">
                    <span itemprop="title">Главная</span>
                </a>
                <div class="bread-separ">&gt;&gt;</div>
                <a class="one-crumb" itemscope itemtype="http://data-vocabulary.org/Breadcrumb"
                   href="#">
                    <span itemprop="title">Не главная</span>
                </a>
            </div>

            <?= CategoryMenuWidget::widget(); ?>
        </div>
    </div>
</header>
<main id="main" class="wrapper">
    <?= $content ?>
</main>
<footer id="main-foot">
    <?= LastNewsWidget::widget(); ?>
    <div class="bottom-foot">
        <div class="wrapper">
            <a class="site-map" href="">Карта сайта</a>
            <div class="site-name">
                Агроплюс 2016
            </div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

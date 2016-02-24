<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use backend\widget\MainMenu\MainMenuWidget;
use yii\helpers\Html;
use yii\helpers\Url;

AppAsset::register($this);
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
<div id="container">
    <header id="head">
        <a href="<?= Url::toRoute('/')?>" class="logo float-left">
            <div class="logo-mini">
                <b>A</b>4J
            </div>

            <div class="logo-lg">
                <b>Admin</b>4J
            </div>
        </a>

        <div class="head-bar">
            <div class="main-menu-toggle float-left">
                <i class="fa fa-bars"></i>
            </div>

            <div class="side-bar float-right">
                <div class="side-bar-item dropdown-hover">
                    ru
                </div>
                <div class="dropdown-menu">
                    <div class="dropdown-item" data-lang="ru">
                        ru
                    </div>
                </div>

                <div class="side-bar-item dropdown-hover">
                    <img class="user-logo" src="" alt="">
                    Admin
                </div>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?= Url::toRoute('/site/logout') ?>">
                        <i class="fa fa-sign-out float-right"></i>
                        Exit
                    </a>
                </div>

                <div class="side-bar-item toggle-config">
                    <i class="fa fa-cog"></i>
                </div>
            </div>
        </div>
    </header>
    <div class="wrapper">
        <?= MainMenuWidget::widget(); ?>
        <main id="center">
            <?= $content ?>
        </main>
        <div id="settings">
            <div class="configs-tabs">
                <div class="one-tab active" data-id="1">
                    <i class="fa fa-desktop"></i>
                </div>
                <div class="one-tab" data-id="2">
                    <i class="fa fa-users"></i>
                </div>
                <div class="one-tab" data-id="3">
                    <i class="fa fa-gears"></i>
                </div>
            </div>

            <div class="tab-context active" data-id="1" style="display: block">
                <div class="style-btn blue" data-style="blue">
                    <span class="style-head-left"></span>
                    <span class="style-head-right"></span>
                    <span class="style-context-left"></span>
                    <span class="style-context-right"></span>

                    <div class="style-title">Blue</div>
                </div>
                <div class="style-btn black" data-style="black">
                    <span class="style-head-left"></span>
                    <span class="style-head-right"></span>
                    <span class="style-context-left"></span>
                    <span class="style-context-right"></span>

                    <div class="style-title">Black</div>
                </div>
                <div class="style-btn purple" data-style="purple">
                    <span class="style-head-left"></span>
                    <span class="style-head-right"></span>
                    <span class="style-context-left"></span>
                    <span class="style-context-right"></span>

                    <div class="style-title">Purple</div>
                </div>
                <div class="style-btn green" data-style="green">
                    <span class="style-head-left"></span>
                    <span class="style-head-right"></span>
                    <span class="style-context-left"></span>
                    <span class="style-context-right"></span>

                    <div class="style-title">Green</div>
                </div>
                <div class="style-btn red" data-style="red">
                    <span class="style-head-left"></span>
                    <span class="style-head-right"></span>
                    <span class="style-context-left"></span>
                    <span class="style-context-right"></span>

                    <div class="style-title">Red</div>
                </div>
                <div class="style-btn yellow" data-style="yellow">
                    <span class="style-head-left"></span>
                    <span class="style-head-right"></span>
                    <span class="style-context-left"></span>
                    <span class="style-context-right"></span>

                    <div class="style-title">Yellow</div>
                </div>
                <div class="style-btn blue-light" data-style="blue-light">
                    <span class="style-head-left"></span>
                    <span class="style-head-right"></span>
                    <span class="style-context-left"></span>
                    <span class="style-context-right"></span>

                    <div class="style-title">Blue Light</div>
                </div>
                <div class="style-btn black-light" data-style="black-light">
                    <span class="style-head-left"></span>
                    <span class="style-head-right"></span>
                    <span class="style-context-left"></span>
                    <span class="style-context-right"></span>

                    <div class="style-title">Black Light</div>
                </div>
                <div class="style-btn purple-light" data-style="purple-light">
                    <span class="style-head-left"></span>
                    <span class="style-head-right"></span>
                    <span class="style-context-left"></span>
                    <span class="style-context-right"></span>

                    <div class="style-title">Purple Light</div>
                </div>
                <div class="style-btn green-light" data-style="green-light">
                    <span class="style-head-left"></span>
                    <span class="style-head-right"></span>
                    <span class="style-context-left"></span>
                    <span class="style-context-right"></span>

                    <div class="style-title">Green Light</div>
                </div>
                <div class="style-btn red-light" data-style="red-light">
                    <span class="style-head-left"></span>
                    <span class="style-head-right"></span>
                    <span class="style-context-left"></span>
                    <span class="style-context-right"></span>

                    <div class="style-title">Red Light</div>
                </div>
                <div class="style-btn yellow-light" data-style="yellow-light">
                    <span class="style-head-left"></span>
                    <span class="style-head-right"></span>
                    <span class="style-context-left"></span>
                    <span class="style-context-right"></span>

                    <div class="style-title">Yellow Light</div>
                </div>
            </div>
            <div class="tab-context" data-id="2"></div>
            <div class="tab-context" data-id="3">
                <a class="tab-context-btn show-gallery"
                   href="<?= Url::toRoute('/file/gallery-img') ?>">
                    <i class="fa fa-picture-o"></i>
                    Галерея
                </a>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<footer id="footer"></footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

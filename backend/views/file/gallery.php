<?php
/**
 * Created by PhpStorm.
 * User: CrazyBobik
 * Date: 22.02.2016
 * Time: 21:26
 */
use backend\widget\FormUpload\FormUploadWidget;

/**
 * @var $all array
 */
?>
<div class="gallery">
    <?= FormUploadWidget::widget(); ?>

    <div class="choice-img-container">
        <div class="choice-img">
            <?php foreach($all as $item){
                $name = preg_replace('/.*\//ui', '', $item); ?>
                <div class="one-img" title="Выбрать этот файл">
                    <i class="fa fa-close del del-img" data-name="<?= $name ?>"></i>
                    <img class="choice" src="http://yii/upload/<?= $name ?>" alt="">
                </div>
            <?php } ?>
            <div class="one-img upload" title="Загрузить новый файл">
                <i class="fa fa-camera"></i>
            </div>
        </div>
    </div>
</div>
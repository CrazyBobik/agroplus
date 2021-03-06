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
<div class="choice-img">
    <?php foreach($all as $item){
        $name = preg_replace('/.*\//ui', '', $item);
        if(strpos($name, '.jpg') ||
            strpos($name, '.jpeg') ||
            strpos($name, '.png') ||
            strpos($name, '.gif')){?>
        <div class="one-img" title="Выбрать этот файл">
            <i class="fa fa-close del del-img" data-name="<?= $name ?>"></i>
            <img class="choice" src="http://test.agroplus.com.ua/upload/<?= $name ?>" alt="">
        </div>
    <?php }} ?>
    <div class="one-img upload" title="Загрузить новый файл">
        <i class="fa fa-camera"></i>
    </div>
</div>

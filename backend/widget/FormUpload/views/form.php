<?php
/**
 * Created by PhpStorm.
 * User: CrazyBobik
 * Date: 22.02.2016
 * Time: 23:30
 */

?>
<form class="ajax-form" action="/backend/file/upload" method="post" enctype="multipart/form-data"
      style="display: none;">
    <input id="upload-new-file" type="file" name="FileModel[file]" style="display: none"
           onchange="$(this).closest('form').submit();">
</form>

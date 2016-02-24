<?php
use yii\helpers\Url;

$this->title = 'Login';
?>

<form id="login-form" class="ajax-form" action="<?= Url::toRoute('/site/login') ?>"
      method="post">
    <div class="logo">Admin 4J</div>
    <div class="container">
        <input type="text" name="LoginForm[username]" placeholder="Логин">
        <input type="password" name="LoginForm[password]" placeholder="Пароль">

        <div id="mess-result-info" class="msg-window" style="display: none"></div>
    </div>

    <input type="submit" value="Войти">
</form>

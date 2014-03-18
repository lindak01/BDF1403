<?php

require_once "db/db.php";
require_once "AuthModel.php";
require_once "AuthView.php";

$model = new AuthModel(MY_DSN, MY_USER, MY_PASSWORD);
$view = new AuthView();

$username = empty($_POST['username']) ? '' : strtolower(trim($_POST['username']));
$password = empty($_POST['password']) ? '' : trim($_POST['password']);

$contentPage = 'form';

if (!empty($username) && !empty($password)) {
    $user = $model->getUserByNamePass($name, $password);
    if (is_array($user)) {
        $contentPage = 'success';
    }
}

$view->show('header');
$view->show($contentPage);
$view->show('footer');
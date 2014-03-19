<?php
mysql_connect('localhost:8888', 'root', 'root') or
die(mysql_error());
mysql_select_db('BDF1403') or die(mysql_error());

require_once "db/db.php";
require_once "AuthModel.php";
require_once "AuthView.php";

$model = new AuthModel(MY_DSN, MY_USER, MY_PASSWORD);
$view = new AuthView();

$username = empty($_POST['username']) ? '' : strtolower(trim($_POST['username']));
$password = empty($_POST['password']) ? '' : trim($_POST['password']);

$contentPage = 'form';

if (!empty($username) && !empty($password)) {
    $user = $model->getUserByNamePass($username, $password);
    if (is_array($user)) {
        $contentPage = 'success';
        session_start();
        $_SESSION['userInfo'] = $user;
    }
}

$view->show('header');
$view->show($contentPage, $user);
$view->show('footer');
?>

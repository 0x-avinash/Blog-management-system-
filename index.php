<?php
session_start();
require_once './controller/Home.php';
require_once  './controller/login.php';

$path = $_SERVER['PATH_INFO'] ?? '';
$home = new Home();
$login = new Login();

//echo $path;
if ($path === '/add') {
    $home->addAction();
}

if ($path === '/save') {
    $home->save();
}

if ($path === '/view') {
    $home->listView();

}

if ($path === '/delete') {
    $home->deleteAction();

}
if ($path === '/edit') {
    $home->editAction();
}
if ($path === '/home'){
   $home->home();
}
if ($path === '/page'){
    $home->pageView();
}
if ($path === '/register'){
    $login->register();
}

if ($path === '/login'){
    $login->login();
}
if($path === '/savecredientials'){
    $login->saveCredentials();
}

if ($path ==='/session'){
    $login->checkCredential();
}
if ($path ==='/logout'){
    $login->logout();
}

?>
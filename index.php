<?php
require_once './controller/Home.php';


$path = $_SERVER['PATH_INFO'] ?? '';
$home = new Home();
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

?>
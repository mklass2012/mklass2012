<?php

// Front-controller backenda
require_once '../include/config.php';
require_once '../lib/library.php';

session_start();
error_reporting(E_ALL);

define('ROLE_ADMIN', 0);
define('ROLE_PUBLISHER', 10);
define('ROLE_GUEST', 100);

require_once '../include/auth.php';
if(!(isset($_SESSION['role'])&&$_SESSION['role']<=ROLE_PUBLISHER)) {
  header('Location: /mklass2012/');
  die("У Вас нет прав на доступ сюдой!");
}
$content=''; // содержимое страницы
$users;
//Routing
if (isset($_GET['object'])) {
  $object = $_GET['object'];
  $controller_filename = "controller/" . $object . ".php";
  if (file_exists($controller_filename)) {
    require($controller_filename);
    if (isset($_GET['action'])) {
      $action = $object . "_" . strtolower($_GET['action']);
      if (function_exists($action)) {
        $id="";
        if(isset($_GET['id']))$id=$_GET['id'];
        eval($action."(".$id.");");
      }
    } else {
      // Список записей текущего объекта
      $list = $object . "_list";
      if (function_exists($list)) {
        eval($list."();");
      }
    }
  } else {
    // неверный URL
  }
} else {
  // Выводим страницу по умолчанию 
}

include 'view/index.php';
?>

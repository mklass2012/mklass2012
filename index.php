<?php 

session_start();
define('ROLE_ADMIN', 0);
define('ROLE_PUBLISHER', 10);
define('ROLE_GUEST', 100);

require_once 'include/auth.php'; 
if (isset($_COOKIE['last_login'])) {
  //$_SESSION['l_l'] = $_COOKIE['last_login'];
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Шаблон страницы</title>
    <meta name="description" content="Демо-сайт для курса веб-программирование" />
    <link href="css/screen.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <div id="wrapper">
      <?php include 'include/header.php'; ?>
      <div id="middle">
        <?php require 'include/sidebar.php'; ?>
        <?php require_once 'include/banners.php'; ?>
        <div id="content">
          <div class="inner">
            <?php include 'include/content_top.php'; ?>
            <div class="title"></div>
            <?php
            // обработка параметров http-запроса
            // вывод контента страницы
            $error_message = 'Неверный адрес!!!';
            if (isset($_GET['page'])) {
              $filename = "include/content/{$_GET['page']}.php";
              if(file_exists($filename)){
                include $filename;
              }else{
                echo $error_message;
              }
            } else {
              include 'include/content/index.php';
            }
            ?>
          </div>
        </div>
      </div>
      <?php include 'include/footer.php'; ?>
      <?php require 'include/banners.php'; ?>
    </div>
    <?php include 'include/debug.php'; ?>
  </body>
</html>

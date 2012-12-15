<?php
require_once 'include/config.php';

session_start();
error_reporting(E_ALL);

define('ROLE_ADMIN', 0);
define('ROLE_PUBLISHER', 10);
define('ROLE_GUEST', 100);

require_once 'include/auth.php';

// обработка параметров http-запроса
if (isset($_GET['page'])) {
  // DB
  $query_select_current_page =
          "SELECT p.*,mi.name,mi.menu_id FROM page as p INNER JOIN menu_item as mi ON p.id=mi.page_id  WHERE href='{$_GET['page']}'";
  if ($result_select_current_page = mysql_query($query_select_current_page)) {
    if (mysql_num_rows($result_select_current_page) > 0) {
      $curr_href = $_GET['page'];
      $row_page = mysql_fetch_assoc($result_select_current_page);
      $filename = "include/content/{$_GET['page']}.php";
      if (file_exists($filename)) {
        $file_content = true;
      } else {
        $content = $row_page['content'];
      }
      //echo $row_page['content'];
    } else {
      $row_page['title'] = "Наш лучший сайт о WEB";
      $row_page['name'] = "Главная";
      $row_page['description'] = "Описание лучшего сайта о WEB";
      $filename = 'include/content/index.php';
      $file_content = true;
      $curr_href = 'index';
    }
  } else {
    $content = "Ошибка БД";
  }
  // -------
} else {
  $row_page['title'] = "Наш лучший сайт о WEB";
  $row_page['name'] = "Главная";
  $row_page['description'] = "Описание лучшего сайта о WEB";
  $filename = 'include/content/index.php';
  $file_content = true;
  $curr_href = 'index';
}

ob_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title><?php echo $row_page['title']; ?></title>
    <meta name="description" content="<?php echo $row_page['description']; ?>" />
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
            // вывод контента страницы
            if (isset($file_content)) {
              include($filename);
            } else {
              echo $content;
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

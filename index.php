<?php
$year = 2012;

function retArray($param1, $param2, $param3 = 1970) {
  $arr = array($param1, $param2, $param3);
  return $arr;
}

$arr2[] = 'krghkjr tryhy{$year} yhr hyr'; // krghkjr tryhy{$year} yhr hyr
$arr2[] = "krghkjr tryhy{$year} yhr hyr"; // krghkjr tryhy2012 yhr hyr
$arr2['serg'] = 24;
$arr2[] = 125;
?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Шаблон страницы</title>
    <link href="css/screen.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <div id="wrapper">
      <div id="header">
        <ul id="common_menu">
          <li>
            <a href="#">Login</a>
          </li>
          <li>
            <a href="#">Sitemap</a>
          </li>
          <li>
            <a href="#">Contact us
            </a>
          </li>
        </ul>
        <ul id="main_menu" class="nav">
          <li>
            <a href="#">Главная</a>
          </li>
          <li>
            <a href="#">Примеры работ</a>
          </li>
          <li>
            <a href="#">Контакты</a>
          </li>
          <li>
            <a href="#">Карта сайта</a>
          </li>
          <li>
            <a href="#">Цены</a>
          </li>
        </ul>
      </div>
      <div id="middle">
        <div id="sidebar">
          <img class="curr_main_menu" src="img/clock.png" />
          <h1>Цены</h1>
          <div class="description">описание текущего раздела</div>
          <div class="alexey_suranov">Price</div>
          <ul class="nav context">
            <li>
              <a href="#" class="active">Без НДС</a>
            </li>
            <li>
              <a href="#">Акционные</a>
            </li>
            <li>
              <a href="#">Празничные</a>
            </li>
          </ul>
          <div class="info">
            <img src="img/phone.png" />
            Service Center
          </div>
          <div class="info">
            <img src="img/calendar.png" />
            E-catalog
          </div>
        </div>
        <div id="content">
          <div class="inner">
            Основное содержимое страницы 
            При создании веб-страницы часто приходится вкладывать одни теги внутрь других. Чтобы стили для этих тегов использовались корректно, помогут селекторы, которые работают только в определенном контексте. Например, задать стиль для тега только когда он располагается внутри контейнера <p>. Таким образом можно одновременно установить стиль для отдельного тега, а также для тега, который находится внутри другого.</p>
            <div class="paging">
              <input type="text" />
              <input type="text" />

            </div>
          </div>
        </div>
      </div>
      <div id="footer">
        <pre>
          <?php
          echo $year;
          $natArr = retArray(23, "erhjbgrh", 0);
          var_dump($arr2);
          ?>
        </pre>
        <?php
        echo $natArr[2];

        unset($arr2[1]);
        var_dump($arr2);?>
        <ul>
        <? foreach ($arr2 as $key => $vlad_s_value) {?>
          <li class="<?= $key;?>"><?= $vlad_s_value; ?></li>
        <? } ?>
        </ul>
        
      </div>
    </div>
  </body>
</html>

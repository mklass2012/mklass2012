<?php
$year = 2012;

function retArray($param1, $param2, $param3 = 1970) {
  $arr = array($param1, $param2, $param3);
  return $arr;
}

$arr2[] = 'На дворе {$year} год'; // На дворе {$year} год
$arr2[] = "На дворе {$year} год"; // На дворе 2012 год
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
        <a href="#" id="logo">
          <img src="img/asaweb-logo.png" alt="ASA web - start your business" />
        </a>
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
            <a href="#" class="active">Цены</a>
          </li>
        </ul>
        <div id="site_title">
          <div class="site_info">
            <h1>DIGITAL DREAM UTOPIA!</h1>
            <h2>Start your business</h2>
            <p class="description">Site about IT</p>
          </div>
        </div>
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
            <div class="name">Service Center</div>
            <div class="description">
              12-34-567
            </div>
          </div>
          <div class="info">
            <img src="img/calendar.png" />
            <div class="name">E-catalog</div>
            <div class="description">
              27.10.2012
            </div>
          </div>
        </div>
        <div id="content">
          <div class="inner">
            <div class="top">
              <ul class="bradcrambs">
                <li>
                  <a href="/">Home</a>
                </li>
                <li>
                  <a href="#">Цены</a>
                </li>
                <li>
                  <a href="#">Без НДС</a>
                </li>
              </ul>
              <div class="page_name">
                Без НДС
              </div>
            </div>
            <div class="title">

            </div>
            <div class="data">
              <table>
                <thead>
                  <tr>
                    <th class="numb">№</th>
                    <th class="name">Наименование товара</th>
                    <th class="model">Модель</th>
                    <th class="date">Дата поступления</th>
                    <th class="count">Кол-во</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="numb">1</td>
                    <td class="name">Товар 1</td>
                    <td class="model">Модель 1</td>
                    <td class="date">27.10.2012</td>
                    <td class="count">11</td>
                  </tr>
                  <tr>
                    <td class="numb">2</td>
                    <td class="name">Товар 2</td>
                    <td class="model">Модель 2</td>
                    <td class="date">27.10.2012</td>
                    <td class="count">12</td>
                  </tr>
                  <tr>
                    <td class="numb">3</td>
                    <td class="name">Товар 3</td>
                    <td class="model">Модель 3</td>
                    <td class="date">27.10.2012</td>
                    <td class="count">13</td>
                  </tr>
                  <tr>
                    <td class="numb">4</td>
                    <td class="name">Товар 4</td>
                    <td class="model">Модель 4</td>
                    <td class="date">27.10.2012</td>
                    <td class="count">14</td>
                  </tr>
                  <tr>
                    <td class="numb">5</td>
                    <td class="name">Товар 5</td>
                    <td class="model">Модель 5</td>
                    <td class="date">27.10.2012</td>
                    <td class="count">15</td>
                  </tr>
                  <tr>
                    <td class="numb">6</td>
                    <td class="name">Товар 6</td>
                    <td class="model">Модель 6</td>
                    <td class="date">27.10.2012</td>
                    <td class="count">16</td>
                  </tr>
                  <tr>
                    <td class="numb">7</td>
                    <td class="name">Товар 7</td>
                    <td class="model">Модель 7</td>
                    <td class="date">27.10.2012</td>
                    <td class="count">17</td>
                  </tr>
                  <tr>
                    <td class="numb">8</td>
                    <td class="name">Товар 8</td>
                    <td class="model">Модель 8</td>
                    <td class="date">27.10.2012</td>
                    <td class="count">18</td>
                  </tr>
                  <tr>
                    <td class="numb">9</td>
                    <td class="name">Товар 9</td>
                    <td class="model">Модель 9</td>
                    <td class="date">27.10.2012</td>
                    <td class="count">19</td>
                  </tr>
                  <tr>
                    <td class="numb">10</td>
                    <td class="name">Товар 10</td>
                    <td class="model">Модель 10</td>
                    <td class="date">27.10.2012</td>
                    <td class="count">20</td>
                  </tr>
                </tbody>

              </table>
              <div class="paging">
                <select name="brand">
                  <option value="brand1">Производитель 1</option>
                  <option value="brand2">Производитель 2</option>
                  <option value="brand3" selected="selected">Производитель 3</option>
                  <option value="brand4">Производитель 4</option>
                </select>
                <input type="text" name="keyword" />
                <input type="submit" value="Поиск" />
                <input type="submit" value="Обновить" class="refresh" />
                <div class="pages">
                  <a class="first" href="#first">&lt;&lt;</a>
                  <a class="previus" href="#previus">&lt;</a>
                  <span class="numbers">
                    <a href="#p1" class="p1 curr">1</a>
                    <a href="#p2" class="p2">2</a>
                    <a href="#p3" class="p3">3</a>
                    <a href="#p4" class="p4">4</a>
                    <a href="#p5" class="p5">5</a>
                    <a href="#p6" class="p6">6</a>
                    <a href="#p7" class="p7">7</a>
                    <a href="#p8" class="p8">8</a>
                    <a href="#p9" class="p9">9</a>
                    <a href="#p10" class="p10">10</a>
                  </span>
                  <a class="first" href="#next">&gt;</a>
                  <a class="previus" href="#last">&gt;&gt;</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="footer">
        <pre>
          <?php
          echo $year;
          $natArr = retArray(23, "Второй элемент массива", 0);
          var_dump($arr2);
          ?>
        </pre>
        <?php
        echo $natArr[2];

        unset($arr2[1]);
        var_dump($arr2);
        ?>
        <ul>
          <?php foreach ($arr2 as $key => $vlad_s_value) { ?>
            <li class="<?php echo $key; ?>"><?php echo $vlad_s_value; ?></li>
          <?php } ?>
        </ul>

      </div>
    </div>
  </body>
</html>

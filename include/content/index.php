<?php
if (isset($_SESSION['role']) && ($_SESSION['role'] == 0)) {
  if (isset($_GET['action'])) {
    switch ($_GET['action']) :
      case 'delete':
        if (isset($_GET['id'])) {
          $id = strip_tags($_GET['id']);
          $query_delete_product = "DELETE FROM product WHERE id=" . $id;
          if (mysql_query($query_delete_product)) {
            echo "Товар успешно удален!";
          } else {
            echo "Ошибка удаления!";
          }
        }
        break;

      default:
        break;
    endswitch;
  }
}
$url_params = "?page=index&p=";
if (isset($_POST['pp'])) {
  $_SESSION['pp'] = $_POST['pp'];
}

$items_pp = (isset($_SESSION['pp'])) ? $_SESSION['pp'] : 3;
$items_pp_arr = array(1, 2, 3, 5, 10);
$max_show_pages = 5;
$gap = floor(($max_show_pages - 1) / 2);
$query_select_all_products = "SELECT * FROM product"; // Кол-во элементов(товаров) отображается на странице
$result_select_products = mysql_query($query_select_all_products);
$num_items = mysql_num_rows($result_select_products); // Кол-во элементов
$num_pages = ceil($num_items / $items_pp); // Кол-во страниц
if (isset($_GET['p'])) {
  $p = (int) $_GET['p'];
  if (($p < 1) || ($p > $num_pages)) {
    $p = 1;
  }
} else {
  $p = 1;
}
// если страниц меньше, чем ограничение, 
// то используется кол-во страниц, иначе - ограничение
$limit_page_num = ($num_pages < $max_show_pages) ? $num_pages : $max_show_pages;
if (($p + $gap) >= $num_pages) {
  $first_page = $num_pages - $limit_page_num + 1;
} else {
  if (($p - $gap) < 1) {
    $first_page = 1;
  } else {
    $first_page = $p - $gap;
  }
}


$query_select_page_products = $query_select_all_products . " LIMIT " . ($items_pp * ($p - 1)) . "," . $items_pp;
$result_select_page_products = mysql_query($query_select_page_products);
$p_prev = ($p == 1) ? 1 : ($p - 1);
$p_next = ($p == $num_pages) ? $num_pages : ($p + 1);
$p_first_class = ($p == 1) ? " class=\"p_first\"" : "";
$p_last_class = ($p == $num_pages) ? " class=\"p_last\"" : "";
?>

<div class="data">
  <table>
    <thead>
      <tr>
        <th class="numb">№</th>
        <th class="name">Наименование товара</th>
        <th class="model">Модель</th>
        <th class="date">Дата поступления</th>
        <th class="count">Кол-во</th>
        <?php if (isset($_SESSION['role']) && ($_SESSION['role'] == 0)) { ?>
          <th class="action">Действия</th>
        <?php } ?>
      </tr>
    </thead>
    <tbody>
      <?php
      $count = 1;
      while ($product = mysql_fetch_assoc($result_select_page_products)) :
        ?>
        <tr>
          <td class="numb"><?php echo $count++; ?></td>
          <td class="name"><?php echo $product['name']; ?></td>
          <td class="model"><?php echo $product['model']; ?></td>
          <td class="date"><?php echo $product['create_at']; ?></td>
          <td class="count"><?php echo $product['quantity']; ?></td>
          <?php if (isset($_SESSION['role']) && ($_SESSION['role'] == 0)) { ?>
            <td class="action"><a href="?page=index&action=delete&id=<?php echo $product['id']; ?>">удалить</a></td>
          <?php } ?>
        </tr>
      <?php endwhile; ?>
    </tbody>

  </table>
  <form method="post">
    <div class="paging">
      Кол-во товаров на стр.:
      <select name="pp">
        <?php foreach ($items_pp_arr as $item_pp) : ?>
          <option value="<?php echo $item_pp; ?>" <?php echo ($item_pp == $items_pp) ? " selected" : ""; ?>>
            <?php echo $item_pp; ?> товар(ов/а)
          </option>
        <?php endforeach; ?>
      </select>
      <input type="text" name="keyword" />
      <input type="submit" value="Поиск" />
      <input type="submit" value="Обновить" class="refresh" />
      <div class="pages">
        <a<?php echo $p_first_class; ?> href="<?php echo $url_params . '1'; ?>">&lt;&lt;</a>
        <a<?php echo $p_first_class; ?> href="<?php echo $url_params . $p_prev; ?>">&lt;</a>
        <span class="numbers">
          <?php for ($p_count = $first_page; $p_count < ($first_page + $limit_page_num); $p_count++): ?>
            <a <?php echo ($p == $p_count) ? "class=\"curr_p\" " : "href=\".$url_params" . $p_count . "\" class=\"p1 curr\"" ?>><?php echo $p_count; ?></a>
          <?php endfor; ?>
        </span>
        <a<?php echo $p_last_class; ?> href="<?php echo $url_params . $p_next; ?>">&gt;</a>
        <a<?php echo $p_last_class; ?> href="<?php echo $url_params . $num_pages; ?>">&gt;&gt;</a>
      </div>
    </div>
  </form>
</div>

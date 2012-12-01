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
      $query_select_products = "SELECT * FROM product";
      $result_select_products = mysql_query($query_select_products);
      $count = 1;
      while ($product = mysql_fetch_assoc($result_select_products)) :
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

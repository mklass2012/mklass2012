<?php require_once 'include/main_menu_data.php'; ?>
<ul id="main_menu" class="nav">
  <?php foreach ($main_menu as $main_menu_item) { ?>
    <?php
    $active = '';
    if (isset($_GET['page']) && ($_GET['page'] == $main_menu_item['href'])) {
      $active = 'class = "current" ';
    }
    ?>
    <li>
      <a <?php echo @$active; ?>href="?page=<?php echo $main_menu_item['href']; ?>"><?php echo $main_menu_item['name']; ?></a>
    </li>
  <?php } ?>
</ul>
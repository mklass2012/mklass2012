<?php require_once 'include/main_menu_data.php'; ?>
<ul id="main_menu" class="nav">
  <?php foreach ($main_menu as $main_menu_item) { ?>
  <?php if(($main_menu_item['href']!='price')|| (($main_menu_item['href']=='price')&&isset($_SESSION['role']))){ ?>
    <?php
    $active = '';
    if (isset($_GET['page']) && ($_GET['page'] == $main_menu_item['href'])) {
      $active = 'class = "current" ';
    }
    ?>
    <li title="<?php echo $main_menu_item['title']; ?>">
      <a <?php echo @$active; ?>href="?page=<?php echo $main_menu_item['href']; ?>"><?php echo $main_menu_item['name']; ?></a>
    </li>
  <?php } } ?>
</ul>
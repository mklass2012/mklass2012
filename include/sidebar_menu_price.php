<?php require_once 'include/sidebar_menu_data.php'; ?>
<?php 
if(count($sidebar_menu)>0): ?>
<img class="curr_main_menu" src="img/clock.png" />
<h1><?php echo $row_page['name'];?></h1>
<div class="description"><?php echo $row_page['description'];?></div>
<ul class="nav context">
  <?php foreach ($sidebar_menu as $sidebar_menu_item) { ?>
    <?php
    $active = '';
    if (isset($_GET['page']) && ($_GET['page'] == $sidebar_menu_item['href'])) {
      $active = 'class = "current" ';
    }
    ?>
    <li title="<?php echo $sidebar_menu_item['title']; ?>">
      <a <?php echo @$active; ?>href="?page=<?php echo $sidebar_menu_item['href']; ?>"><?php echo $sidebar_menu_item['name']; ?></a>
    </li>
  <?php } ?>
</ul>
<?php endif; ?>
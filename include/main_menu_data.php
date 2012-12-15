<?php

$query_select_main_menu_items =
        "SELECT mi.name,p.* FROM menu_item as mi INNER JOIN page as p ON mi.page_id=p.id WHERE menu_id=1";
$result_select_main_menu_items = mysql_query($query_select_main_menu_items);
while ($row = mysql_fetch_assoc($result_select_main_menu_items)) {
  $main_menu[] = $row;
}
?>

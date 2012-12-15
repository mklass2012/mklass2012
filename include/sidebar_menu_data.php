<?php
$href_sub_menu = $curr_href;
// если есть контекстное подменю, то 
// $href_sub_menu = $curr_href
// иначе $href_sub_menu = href_родительского пункта меню
// а его мы получим с помощью SQL-запроса, которы я напишу дома
$query_select_context_menu_items =
        "SELECT mi.name,p.* 
         FROM menu_item as mi 
            INNER JOIN page as p 
            ON mi.page_id=p.id 
         WHERE menu_id=
            (SELECT m.id 
             FROM menu as m 
                INNER JOIN menu_item as smi 
                ON m.parent_id=smi.id 
                INNER JOIN page as sp 
                ON smi.page_id=sp.id 
             WHERE sp.href='{$href_sub_menu}'
            )";
$result_select_context_menu_items = mysql_query($query_select_context_menu_items);
$sidebar_menu = array();
while ($row = mysql_fetch_assoc($result_select_context_menu_items)) {
  $sidebar_menu[] = $row;
}

?>

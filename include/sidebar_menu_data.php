<?php

$sidebar_menu = array(); // инициализируем массив пунктов контекстного меню
// формируем запрос выбора пунктов контекстного меню для текущей страницы
$query_select_context_menu_items =
        "SELECT mi.name,p.* 
         FROM menu_item as mi 
            INNER JOIN page as p 
            ON mi.page_id=p.id 
         WHERE mi.menu_id IN
            (SELECT m.id 
             FROM menu as m 
                INNER JOIN page as sp 
                ON m.parent_id=sp.id 
                INNER JOIN menu_item as smi 
                ON smi.page_id=sp.id 
             WHERE sp.href='{$curr_href}'
            )";
$result_select_context_menu_items = mysql_query($query_select_context_menu_items);
if (mysql_num_rows($result_select_context_menu_items) == 0) {
  // если у текущей страницы нет контекстного меню, то проверяем
  // есть ли у меню, в которое входит текущий пункт, 
  // родительский пункт контекстного меню (не главного - id=1 и не в футере - id=2 )
  $query_select_context_menu_items =
          "SELECT mi.name,mi.menu_id,p.* 
              FROM menu_item as mi 
                 INNER JOIN page as p 
                 ON mi.page_id=p.id 
               WHERE 
                (mi.menu_id IN
                  (SELECT mi.menu_id 
                   FROM page as p 
                      INNER JOIN menu_item as mi 
                      ON mi.page_id=p.id 
                   WHERE p.href='{$curr_href}') 
                ) AND (mi.menu_id NOT IN (1,2))";
  $result_select_context_menu_items = mysql_query($query_select_context_menu_items);
  // если такое меню есть, то нужно получить название его родительского пункта,
  // чтобы вывести над контекстным меню
  if (mysql_num_rows($result_select_context_menu_items) > 0) {
    $row = mysql_fetch_assoc($result_select_context_menu_items);
    $sidebar_menu[] = $row;
    $query_select_parent_menu = "SELECT mi.name 
                   FROM 
                        menu_item as mi 
                     INNER JOIN
                        page as p
                      ON mi.page_id=p.id
                     INNER JOIN
                        menu as m
                      ON m.parent_id=p.id
                   WHERE m.id={$row['menu_id']} LIMIT 0,1";
    $result_select_parent_menu = mysql_query($query_select_parent_menu);
    if($result_select_parent_menu&&(mysql_num_rows($result_select_parent_menu)>0)){
      $row_parent_menu = mysql_fetch_assoc($result_select_parent_menu);
      $row_page['name'] = $row_parent_menu['name'];
    }
  }
}
while ($row = mysql_fetch_assoc($result_select_context_menu_items)) {
  $sidebar_menu[] = $row;
}
?>

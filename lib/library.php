<?php

/**
 * Вывод результата работы php-скрипта в строку
 * @param string $filename имя выводимого файла (шаблона)
 * @return string строковый результат работы файла 
 */
function getHtmlContent($filename, $data = array()) {
  foreach ($data as $key => $value) {
    $$key = $value;
  }
  ob_start();
  if(file_exists($filename)){
    require($filename);
  }
  $content = ob_get_contents();
  ob_end_clean();
  return $content;
}
?>

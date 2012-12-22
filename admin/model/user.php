<?php

/**
 * 
 * Возвращает массив пользователей
 * 
 * @return array массив пользователей
 */
function getUsers() {
  $query_select_users = "
    SELECT * FROM user";
  $result_select_users = mysql_query($query_select_users);
  $users = array();
  while ($user = mysql_fetch_array($result_select_users)) {
    $users[] = $user;
  }
  return $users;
}

/**
 * Удаление пользователя
 * 
 * @param integer $user_id идентификатор пользователя
 * @return boolean флаг успешности удаления
 */
function deleteUser($user_id) {
  $query_select_user = "
    SELECT * FROM user WHERE id={$user_id}";
  if ($result_select_users = mysql_query($query_select_user)) {
    if (mysql_num_rows($result_select_users) > 0) {
      $query_delete_user = "
    DELETE FROM user WHERE id={$user_id}";
      if (mysql_query($query_delete_user)) {
        $_SESSION['sucсess_message'] = "Удалось удалить запись!";
      } else {
        $_SESSION['error_message'] = "Не удалось удалить запись!" . mysql_error();
      }
    } else {
      $_SESSION['error_message'] = "Нет записей с id {$user_id}";
    }
  } else {
    $_SESSION['error_message'] = "Не удалось удалить запись!" . mysql_error();
  }
}

function insertUser() {
  $user = $_POST;
  $query_insert_user = "
    INSERT INTO  user (login,pass,role)
    VALUES ('{$user['login']}',  '{$user['pass']}',  {$user['role']})";
  if (mysql_query($query_insert_user)) {
    $_SESSION['sucсess_message'] = "Запись успешно добавлена!";
  } else {
    $_SESSION['error_message'] = "Не удалось добавить запись!" . mysql_error();
  }
}

?>

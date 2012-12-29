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

function getUser($id) {
  $query_select_users = "
    SELECT * FROM user WHERE id=" . $id . " LIMIT 0,1";
  $result_select_users = mysql_query($query_select_users);
  return mysql_fetch_array($result_select_users);
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

function updateUser($user_id) {
  $user = $_POST;
  $file = '';
  if (isset($_FILES['avatar'])) {
    if (!($_FILES['avatar']['error'])) {
      if (move_uploaded_file($_FILES['avatar']['tmp_name'], "../img/avatars/" . $_FILES['avatar']['name'])) {
        $file = ", avatar ='{$_FILES['avatar']['name']}'";
      }
    }
  }
  $query_update_user = "
    UPDATE user SET login = '{$user['login']}' , pass = '{$user['pass']}', role ={$user['role']} {$file} WHERE id = {$user_id}";
  if (mysql_query($query_update_user)) {
    $_SESSION['sucсess_message'] = "Запись успешно обновлена!";
  } else {
    $_SESSION['error_message'] = "Не удалось обновить запись!" . mysql_error();
  }
}

function insertUser() {
  $user = $_POST;
  $file_field = '';
  $file_value = '';
  if (isset($_FILES['avatar'])) {
    if (!($_FILES['avatar']['error'])) {
      if (move_uploaded_file($_FILES['avatar']['tmp_name'], "../img/avatars/" . $_FILES['avatar']['name'])) {
        $file_field = ',avatar';
        $file_value = ",'{$_FILES['avatar']['name']}'";
      }
    }
  }
  
  
  $query_insert_user = "
    INSERT INTO  user (login,pass,role{$file_field})
    VALUES ('{$user['login']}',  '{$user['pass']}',  {$user['role']} {$file_value})";
  if (mysql_query($query_insert_user)) {
    $_SESSION['sucсess_message'] = "Запись успешно добавлена!";
  } else {
    $_SESSION['error_message'] = "Не удалось добавить запись!" . mysql_error();
  }
}

?>

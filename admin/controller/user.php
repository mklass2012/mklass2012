<?php
require_once 'model/user.php';
/**
 * Контроллер списка пользователей
 */
function user_list() {
  $users = getUsers();
  include 'view/user/user_list.php';
}

function user_delete($id) {
  deleteUser($id);
  header("Location: ?object=user");
}

function user_add() {
  include 'view/user/user_form.php';
}

function user_insert() {
  insertUser();
  header("Location: ?object=user");
}


?>

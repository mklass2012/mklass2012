<?php
require_once 'model/user.php';
/**
 * Контроллер списка пользователей
 */
function user_list() {
  global $content;
  $data['users'] = getUsers();
  $content = getHtmlContent('view/user/user_list.php',$data);
}

function user_delete($id) {
  deleteUser($id);
  header("Location: ?object=user");
}

function user_add() {
  global $content;
  $content = getHtmlContent('view/user/user_form.php');
}

function user_insert() {
  insertUser();
  header("Location: ?object=user");
}

function user_edit($id) {
  global $content;
  $data['user'] = getUser($id);
  $content = getHtmlContent('view/user/user_form.php',$data);
}

function user_update($id) {
  updateUser($id);
  header("Location: ?object=user");
}


?>

<?php

if (isset($_POST['login1'])) {
  setcookie('last_login', $_POST['login1'], time() + 2 * 365 * 24 * 60 * 60);
}


if (isset($_SESSION['role'])) { // если пользователь авторизован
  if (isset($_GET['logout'])) {// если пользователь пытается выйти из системы
    unset($_SESSION['role']);
    session_destroy();
  }
} else {//если пользователь не авторизован
  if (isset($_POST['login1']) && isset($_POST['pass1'])) {// если пытается авторизоваться
    require_once 'include/users.php'; // включаем файл с данными о пользователях
    if (isset($users[$_POST['login1']])) { // если есть пользователь с введенным логином
      if ($users[$_POST['login1']]['pass'] == $_POST['pass1']) { // если пароль равен
        // записываем в сессию role и login
        $_SESSION['role'] = $users[$_POST['login1']]['role'];
        $_SESSION['login'] = $_POST['login1'];
      }
    }
    if (!isset($_SESSION['role'])) { // если пользователь авторизован
      $error_message = "Не найдена такая комбинация login и пароль!!!";
    }
  }
}
?>

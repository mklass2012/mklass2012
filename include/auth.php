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
    $query_select_user = "SELECT * 
FROM  `user` 
WHERE  `login` =  '" . $_POST['login1'] . "'
AND  `pass` =  '" . $_POST['pass1'] . "'"; // формирование SQL-запроса к СУБД
    $result_select_user = mysql_query($query_select_user); // Отправка запроса на выполнение
    //echo $result_select_user;
    if ($user = mysql_fetch_assoc($result_select_user)) { // обработка результата (получение первой записи из набора данных)
      // записываем в сессию role и login
      $_SESSION['role'] = $user['role'];
      $_SESSION['login'] = $_POST['login1'];
      $_SESSION['avatar'] = $user['avatar'];
    }

    if (!isset($_SESSION['role'])) { // если пользователь авторизован
      $error_message = "Не найдена такая комбинация login и пароль!!!";
    }
  }
}
?>

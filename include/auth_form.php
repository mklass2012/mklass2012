
<?php if(isset($_SESSION['role'])){ // если пользователь авторизован ?>
<div id="logout">
  <form>
    <div class="login"><?php echo $_SESSION['login'] ?></div>
    <input type="submit" name="logout" value="Выйти" />
  </form>
</div>
<?php } else { ?>
<div id="login">
  <div class="error"><?php echo @$error_message; ?></div>
  <form method="post" enctype="multipart/form-data">
    <label>Login:</label>
    <input 
      type="text" 
      name="login1" 
      placeholder="введите его сюда" 
      value="<?php echo @$_COOKIE['last_login']; ?>" />
    <label>Пароль:</label>
    <input type="password" name="pass1" value="" />
    <input type="submit" value="Войти" />
  </form>
</div>
<?php } ?>



<form method="post" enctype="multipart/form-data">
  <label>Login:</label>
  <input 
    type="text" 
    name="login1" 
    placeholder="введите его сюда" 
    value="<?php echo @$_COOKIE['last_login'] ?>" />
  <label>Пароль:</label>
  <input type="password" name="pass1" value="" />
  <input type="submit" value="Войти" />
</form>
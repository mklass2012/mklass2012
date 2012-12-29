<form 
  action=
  "?object=user&action=<?php echo(isset($_GET['action'])&&($_GET['action'] == 'edit') && (isset($_GET['id']))) ? "update&id={$_GET['id']}" : "insert" ?>"
  method="post"
  enctype="multipart/form-data">

  <label for="login">Login:</label><input type="text" name="login" value="<?php echo @$user['login']; ?>" />
  <label for="pass">Пароль:</label><input type="password" name="pass" value="<?php echo @$user['pass']; ?>" />
  <label for="role">Роль:</label><input type="text" name="role" value="<?php echo @$user['role']; ?>" />
  <?php if(isset($user)&&$user['avatar']) {?>
  <img style="max-height: 100px;max-width: 100px;" src="../img/avatars/<?php echo @$user['avatar']; ?>" />
  <?php } ?>
  <label for="avatar">Роль:</label><input type="file" name="avatar" value="<?php echo @$user['avatar']; ?>" />
  
  <input type="submit" name="save" value="Сохранить" />

</form>
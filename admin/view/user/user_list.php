<div class="error message">
  <?php echo @$_SESSION['error_message'];
  unset($_SESSION['error_message']);?>
</div>
<div class="success message">
  <?php echo @$_SESSION['sucсess_message'];
  unset($_SESSION['sucсess_message']);?>
</div>

<table class="users">
  <caption>
    <a href="?object=user&action=add" title="Добавить нового пользователя">[ + ]</a>
  </caption>
  <thead>
  <th>id</th>
  <th>login</th>
  <th>pass</th>
  <th>role</th>
  <th>Действие</th>
</thead>
<tbody>
  <?php foreach ($users as $user) { ?>
    <tr>
      <td><?php echo $user['id']; ?></td>
      <td><?php echo $user['login']; ?></td>
      <td><?php echo $user['pass']; ?></td>
      <td><?php echo $user['role']; ?></td>
      <td><a href="?object=user&action=delete&id=<?php echo $user['id']; ?>" title="Удалить">[ - ]</a></td>
    </tr>
  <?php } ?>
</tbody>
</table>

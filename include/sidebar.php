<div id="sidebar">
  <?php include 'include/auth_form.php'; ?>
  <?php include 'include/sidebar_menu_price.php'; ?>
  <div class="info">
    <img src="img/phone.png" />
    <div class="name">Service Center</div>
    <div class="description">
      12-34-567
    </div>
    <?php if (isset($_SESSION['role']) && ($_SESSION['role'] == ROLE_ADMIN)) { // если пользователь авторизован ?>
    <a href="#">Редактировать</a>
    <?php } ?>
  </div>
  <?php require_once 'include/banners.php'; ?>
  <?php if (isset($_SESSION['role']) && ($_SESSION['role'] <= ROLE_PUBLISHER)) { // если пользователь авторизован ?>
    <div class="info">
      <img src="img/calendar.png" />
      <div class="name">E-catalog</div>
      <div class="description">
        27.10.2012
      </div>
    </div>
  <?php } ?>
</div>
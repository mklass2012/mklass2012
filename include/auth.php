<?php
if(isset($_POST['login1'])){
  setcookie('last_login', $_POST['login1'], time()+2*365*24*60*60);
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

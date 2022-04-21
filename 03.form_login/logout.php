<?php
  setcookie("username",null,time()-60);
  setcookie("name",null,time()-60);

  header("Location: login_page.php");
?>

<?php
setcookie("id", "1111111", time() + (86400 * 30), "/");
setcookie("username", "idwimeianto", time() + (86400 * 30), "/");
setcookie("access", "user", time() + (86400 * 30), "/");
?>
<html>
<body>

<?php
if(!isset($_COOKIE["id"])) {
  echo "Cookie is not set!";
} else {
  echo "id: " . $_COOKIE["id"] . "<br>";
  echo "username: " . $_COOKIE["username"] . "<br>";
  echo "access as " . $_COOKIE["access"] . "<br>";
}
?>

<br>
<p>You need to reload the page to see the value of the cookie that has been set</p>

</body>
</html>
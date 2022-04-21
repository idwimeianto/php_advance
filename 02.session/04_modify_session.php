<?php
session_start();
// make sure to run 01_start_session.php first
?>
<!DOCTYPE html>
<html>
<body>

<?php
echo "<h2>Before</h2>";
echo print_r($_SESSION);
echo "<br>";

echo "<h2>After</h2>";
// to change a session variable, just overwrite it
$_SESSION["favcolor"] = "yellow";
print_r($_SESSION);
?>

</body>
</html>
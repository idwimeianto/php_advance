<?php
session_start();
// make sure to run 01_start_session.php first
?>
<!DOCTYPE html>
<html>
<body>

<?php
print_r($_SESSION);
?>

</body>
</html>
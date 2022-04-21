<?php
session_start();
// make sure to run 01_start_session.php first
?>
<!DOCTYPE html>
<html>
<body>

<?php
// remove individual session
unset($_SESSION["favcolor"]);

// remove all session variables
session_unset();

// destroy the session
session_destroy();
?>

</body>
</html>
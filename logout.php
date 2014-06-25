<?php
session_start();
unset($_SESSION['username']);
session_destroy();
unset($_SESSION['firstName']);
session_destroy();
unset($_SESSION['lastName']);
session_destroy();

header("Location: index.php");
exit;
?>

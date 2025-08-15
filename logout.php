<?php
// logout.php
session_start();
header('Content-Type: application/json');

session_unset();
session_destroy();
setcookie(session_name(), '', time() - 3600);

echo json_encode(['status'=>'success']);
exit;
?>

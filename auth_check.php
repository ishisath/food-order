<?php
// auth_check.php
session_start();
header('Content-Type: application/json');

if (isset($_SESSION['user_id'])) {
    echo json_encode(['status'=>'success','user'=>['id'=>$_SESSION['user_id'],'name'=>$_SESSION['user_name']]]);
} else {
    echo json_encode(['status'=>'guest']);
}
exit;
?>

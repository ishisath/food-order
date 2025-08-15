<?php
// login.php
session_start();
header('Content-Type: application/json');
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status'=>'error','message'=>'Invalid request']);
    exit;
}

$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

if (!$email || !$password) {
    echo json_encode(['status'=>'error','message'=>'Please fill in all fields']);
    exit;
}

$stmt = $conn->prepare("SELECT id, name, password FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows === 0) {
    $stmt->close();
    echo json_encode(['status'=>'error','message'=>'Email not found']);
    exit;
}

$stmt->bind_result($id, $name, $hash);
$stmt->fetch();

if (password_verify($password, $hash)) {
    $_SESSION['user_id'] = $id;
    $_SESSION['user_name'] = $name;
    echo json_encode(['status'=>'success','user'=>['id'=>$id,'name'=>$name,'email'=>$email]]);
} else {
    echo json_encode(['status'=>'error','message'=>'Invalid password']);
}
$stmt->close();
exit;
?>

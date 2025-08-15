<?php
// register.php
session_start();
header('Content-Type: application/json');
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status'=>'error','message'=>'Invalid request']);
    exit;
}

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

if (!$name || !$email || !$password) {
    echo json_encode(['status'=>'error','message'=>'Please fill in all fields']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['status'=>'error','message'=>'Invalid email address']);
    exit;
}

// Check duplicate
$stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows > 0) {
    $stmt->close();
    echo json_encode(['status'=>'error','message'=>'Email already registered']);
    exit;
}
$stmt->close();

// Insert user
$hash = password_hash($password, PASSWORD_DEFAULT);
$stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $hash);

if ($stmt->execute()) {
    $user_id = $stmt->insert_id;
    // log in the user via session
    $_SESSION['user_id'] = $user_id;
    $_SESSION['user_name'] = $name;
    echo json_encode(['status'=>'success','user'=>['id'=>$user_id,'name'=>$name,'email'=>$email]]);
} else {
    echo json_encode(['status'=>'error','message'=>'Database error: '.$conn->error]);
}
$stmt->close();
exit;
?>

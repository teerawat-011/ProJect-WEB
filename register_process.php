<?php
require_once 'backup.php'; // connect to DB

// รับค่าจากฟอร์ม register.php (prefix,fname,lname)

$fname    = isset($_POST['fname']) ? trim($_POST['fname']) : '';
$lname    = isset($_POST['lname']) ? trim($_POST['lname']) : '';
$username = isset($_POST['username']) ? trim($_POST['username']) : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

// ตรวจสอบค่า
if ($fname === '' || $lname === '' || $username === '' || $password === '') {
    header('Location: register.php?error=empty_fields');
    exit;
}

// ตรวจสอบว่า username ซ้ำหรือไม่
$stmt = mysqli_prepare($conn, "SELECT u_username FROM useraccount WHERE u_username = ?");
mysqli_stmt_bind_param($stmt, 's', $username);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);
if (mysqli_stmt_num_rows($stmt) > 0) {
    mysqli_stmt_close($stmt);
    header('Location: register.php?error=username_exists');
    exit;
}
mysqli_stmt_close($stmt);

// ตรงนี้จะเก็บรหัสผ่านเป็น plain-text ตามคำขอ
$stmt = mysqli_prepare($conn, "INSERT INTO useraccount (u_fname, u_lname, u_username, u_password) VALUES (, ?, ?, ?, ?)");
mysqli_stmt_bind_param($stmt,$fname, $lname, $username, $password);
$ok = mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

if ($ok) {
    header('Location: login.php?register=success');
    exit;
} else {
    header('Location: register.php?error=insert_failed');
    exit;
}
?>

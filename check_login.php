<?php
require_once 'backup.php'; // เรียกไฟล์เชื่อมต่อฐานข้อมูล
session_start();

// ✅ รับค่าจากฟอร์ม login.php
$username = isset($_POST['username']) ? trim($_POST['username']) : '';
$password = isset($_POST['password']) ? trim($_POST['password']) : '';

// ✅ ตรวจสอบว่ากรอกครบไหม
if ($username === '' || $password === '') {
    header('Location: login.php?error=empty_fields');
    exit;
}

// ✅ เตรียมคำสั่ง SQL เพื่อดึงข้อมูลผู้ใช้
// เลือกรหัสผ่านและชื่อเต็ม (ถ้ามี)
$stmt = mysqli_prepare($conn, "SELECT u_password, u_username FROM useraccount WHERE u_username = ?");
mysqli_stmt_bind_param($stmt, 's', $username);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);

// ถ้าพบ username
if (mysqli_stmt_num_rows($stmt) === 1) {
    mysqli_stmt_bind_result($stmt, $stored_password, $stored_fullname);
    mysqli_stmt_fetch($stmt);

    // ตรวจสอบแบบ hash ก่อน ถ้าไม่ได้ผล ให้เทียบ plain-text (รองรับฐานข้อมูลเดิม)
    $ok = false;
    if (@password_verify($password, $stored_password)) {
        $ok = true;
    } elseif ($password === $stored_password) {
        $ok = true; // plain-text match
    }

    if ($ok) {
        // success: ตั้ง session แล้วไป homepage
        $_SESSION['username'] = $username;
        if (!empty($stored_fullname)) {
            $_SESSION['fullname'] = $stored_fullname;
        }
        header('Location: homepage.php');
        exit;
    } else {
        header('Location: login.php?error=wrong_password');
        exit;
    }
} else {
    // ไม่พบ username
    header('Location: login.php?error=user_not_found');
    exit;
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>

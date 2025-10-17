<?php
// การเชื่อมต่อฐานข้อมูล MySQL อย่างง่าย
// ตัวแปรการเชื่อมต่อ
$servername = "localhost";  // ชื่อเซิร์ฟเวอร์
$username = "root";         // ชื่อผู้ใช้ (เริ่มต้นของ XAMPP)
$password = "";             // รหัสผ่าน (เริ่มต้นของ XAMPP คือว่าง)
$dbname = "mysystem";     // ชื่อฐานข้อมูล

$conn = mysqli_connect($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if (!$conn) {
    die("การเชื่อมต่อล้มเหลว: " . mysqli_connect_error());
} else {
        // ตั้งค่า charset เป็น utf8 เพื่อรองรับภาษาไทย
        mysqli_set_charset($conn, "utf8");
}
?>
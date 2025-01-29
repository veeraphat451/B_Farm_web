<?php
// เริ่มต้น Session
session_start();

// ตรวจสอบการมีอยู่ของไฟล์ config
if (!file_exists('../config/condb.php')) {
    die("ไฟล์ condb.php ไม่พบ");
}

// รวมไฟล์การเชื่อมต่อฐานข้อมูล
include('../config/condb.php');

// ตรวจสอบการเชื่อมต่อฐานข้อมูล
if (!isset($conn)) {
    die("ไม่สามารถเชื่อมต่อฐานข้อมูลได้");
}

// รับข้อมูลจากฟอร์ม
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// ตรวจสอบว่าอีเมลและรหัสผ่านถูกกรอกหรือไม่
if (empty($email) || empty($password)) {
    echo "<script>
        alert('กรุณากรอกข้อมูลให้ครบถ้วน');
        window.history.back();
    </script>";
    exit;
}

// ตรวจสอบว่าอีเมลที่กรอกมีอยู่ในฐานข้อมูลหรือไม่
$stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
$stmt->bindParam(':email', $email);
$stmt->execute();

if ($stmt->rowCount() == 0) {
    echo "<script>
        alert('ไม่พบอีเมลนี้ในระบบ');
        window.history.back();
    </script>";
    exit;
}

// ดึงข้อมูลผู้ใช้
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// ตรวจสอบรหัสผ่าน
if ($password !== $user['password']) {
    echo "<script>
        alert('รหัสผ่านไม่ถูกต้อง');
        window.history.back();
    </script>";
    exit;
}

// ตั้งค่าการเข้าสู่ระบบ
session_regenerate_id(true);
$_SESSION['user_id'] = $user['id'];
$_SESSION['first_name'] = $user['first_name'];
$_SESSION['last_name'] = $user['last_name'];
$_SESSION['email'] = $user['email'];

// เปลี่ยนหน้าไปยัง Dashboard
header('Location: ../index.php');
exit;
?>

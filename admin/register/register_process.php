<?php
// เชื่อมต่อฐานข้อมูล
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "b_farm";

$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// รับข้อมูลจากฟอร์ม
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$province = $_POST['province'];
$amphure = $_POST['amphure'];
$district = $_POST['district'];

// ตรวจสอบว่ารหัสผ่านและยืนยันรหัสผ่านตรงกันหรือไม่
if ($password !== $confirm_password) {
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
          <script>
            window.onload = function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'รหัสผ่านและยืนยันรหัสผ่านไม่ตรงกัน',
                }).then(function() {
                    window.history.back();
                });
            }
          </script>";
    exit;
}

// เตรียมคำสั่ง SQL (ตรวจสอบข้อผิดพลาด)
$stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, password, province_id, amphure_id, district_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
if ($stmt === false) {
    die('Error preparing statement: ' . $conn->error);
}

// ผูกข้อมูลกับคำสั่ง SQL
$stmt->bind_param("ssssiii", $first_name, $last_name, $email, $password, $province, $amphure, $district);

// ตรวจสอบว่าการบันทึกข้อมูลสำเร็จหรือไม่
if ($stmt->execute()) {
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
          <script>
            window.onload = function() {
                Swal.fire({
                    icon: 'success',
                    title: 'สมัครสมาชิกสำเร็จ!',
                    text: 'คุณสามารถเข้าสู่ระบบได้แล้ว',
                }).then(function() {
                    setTimeout(function() {
                        window.location.href = 'login.php';
                    }, 1000); // รอ 1 วินาที
                });
            }
          </script>";
} else {
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
          <script>
            window.onload = function() {
                Swal.fire({
                    icon: 'error',
                    title: 'เกิดข้อผิดพลาด',
                    text: 'ไม่สามารถสมัครสมาชิกได้ โปรดลองอีกครั้ง',
                }).then(function() {
                    window.history.back();
                });
            }
          </script>";
}

// ปิดการเชื่อมต่อฐานข้อมูล
$stmt->close();
$conn->close();
?>

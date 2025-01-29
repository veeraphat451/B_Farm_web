<?php
// เชื่อมต่อฐานข้อมูล
$host = "localhost";
$port = "5432";
$dbname = "b_farm";
$user = "postgres"; // เปลี่ยนเป็นชื่อผู้ใช้ของ PostgreSQL
$password = "postgres"; // ใส่รหัสผ่านของคุณ

try {
    $conn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
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

// เตรียมคำสั่ง SQL
try {
    $sql = "INSERT INTO users (first_name, last_name, email, password, province_id, amphure_id, district_id) 
            VALUES (:first_name, :last_name, :email, :password, :province_id, :amphure_id, :district_id)";
    $stmt = $conn->prepare($sql);

    // ผูกข้อมูลกับคำสั่ง SQL
    $stmt->bindParam(':first_name', $first_name);
    $stmt->bindParam(':last_name', $last_name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':province_id', $province, PDO::PARAM_INT);
    $stmt->bindParam(':amphure_id', $amphure, PDO::PARAM_INT);
    $stmt->bindParam(':district_id', $district, PDO::PARAM_INT);

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
} catch (PDOException $e) {
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
          <script>
            window.onload = function() {
                Swal.fire({
                    icon: 'error',
                    title: 'เกิดข้อผิดพลาด',
                    text: '" . $e->getMessage() . "',
                }).then(function() {
                    window.history.back();
                });
            }
          </script>";
}

// ปิดการเชื่อมต่อฐานข้อมูล
$conn = null;
?>

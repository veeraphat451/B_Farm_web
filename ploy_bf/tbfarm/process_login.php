<?php
session_start();

// เชื่อมต่อฐานข้อมูล
$host = 'localhost';
$port = '5432';
$dbname = 'b_farm';
$user = 'postgres'; // เปลี่ยนเป็นชื่อผู้ใช้ PostgreSQL ของคุณ
$password = 'postgres'; // เปลี่ยนเป็นรหัสผ่านของคุณ

try {
    $conn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// รับข้อมูลจากฟอร์ม
$email = $_POST['email'];
$password = $_POST['password'];

try {
    // ดึงข้อมูลผู้ใช้งานจากฐานข้อมูล โดยใช้ email
    $query = "SELECT * FROM users WHERE email = :email LIMIT 1";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    // ตรวจสอบว่าพบผู้ใช้งานหรือไม่
    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // ตรวจสอบว่ารหัสผ่านในฐานข้อมูลเข้ารหัสหรือไม่
        if (!password_get_info($user['password'])['algo']) {
            // หากรหัสผ่านยังไม่ถูกเข้ารหัส ให้เข้ารหัสใหม่
            $hashed_password = password_hash($user['password'], PASSWORD_DEFAULT);

            // อัปเดตรหัสผ่านที่เข้ารหัสกลับไปในฐานข้อมูล
            $updateQuery = "UPDATE users SET password = :hashed_password WHERE id = :id";
            $updateStmt = $conn->prepare($updateQuery);
            $updateStmt->bindParam(':hashed_password', $hashed_password);
            $updateStmt->bindParam(':id', $user['id'], PDO::PARAM_INT);
            $updateStmt->execute();

            // อัปเดตรหัสผ่านในตัวแปร
            $user['password'] = $hashed_password;
        }

        // ตรวจสอบรหัสผ่าน
        if (password_verify($password, $user['password'])) {
            // ตั้งค่าข้อมูลเซสชัน
            $_SESSION['id'] = $user['id'];
            $_SESSION['first_name'] = $user['first_name'];
            $_SESSION['last_name'] = $user['last_name'];
            $_SESSION['email'] = $user['email'];

            // นำผู้ใช้งานไปยังหน้า dashboard หรือหน้าอื่นที่ต้องการ
            header('Location: download.php');
            exit();
        } else {
            // รหัสผ่านไม่ถูกต้อง
            $_SESSION['error'] = 'Invalid password!';
            header('Location: login.php');
            exit();
        }
    } else {
        // ไม่พบผู้ใช้งานที่มีอีเมลนี้
        $_SESSION['error'] = 'No user found with that email!';
        header('Location: login.php');
        exit();
    }
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>

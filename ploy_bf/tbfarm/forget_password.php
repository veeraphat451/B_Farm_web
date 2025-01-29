<?php
session_start();

$host = 'localhost';
$port = '5432';
$dbname = 'b_farm';
$user = 'postgres';
$password = 'postgres';

try {
    $conn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}


// กำหนดตัวแปรสำหรับการแสดงผลฟอร์ม Reset Password
$showResetForm = false;
$email = '';

// ตรวจสอบว่ามีการส่งฟอร์มหรือไม่
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['email_submit'])) {
        $email = $_POST['email'];

        // ตรวจสอบว่าอีเมลถูกกรอกหรือไม่
        if (!empty($email)) {
            try {
                // ตรวจสอบว่าอีเมลนี้มีอยู่ในระบบหรือไม่
                $query = "SELECT * FROM users WHERE email = :email";
                $stmt = $conn->prepare($query);
                $stmt->bindParam(':email', $email);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    // แสดงฟอร์ม Reset Password
                    $showResetForm = true;
                    $_SESSION['email'] = $email; // เก็บอีเมลไว้ใน Session สำหรับใช้งาน
                } else {
                    $_SESSION['error'] = "Email not found in the system.";
                }
            } catch (PDOException $e) {
                $_SESSION['error'] = "Database error: " . $e->getMessage();
            }
        } else {
            $_SESSION['error'] = "Please enter your email.";
        }
    }

    if (isset($_POST['reset_submit'])) {
        $email = $_SESSION['email'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];

        // ตรวจสอบว่ารหัสผ่านใหม่และยืนยันรหัสผ่านตรงกันหรือไม่
        if ($new_password === $confirm_password) {
            $password_hashed = password_hash($new_password, PASSWORD_BCRYPT);

            try {
                // อัปเดตรหัสผ่านในฐานข้อมูล
                $query = "UPDATE users SET password = :password WHERE email = :email";
                $stmt = $conn->prepare($query);
                $stmt->bindParam(':password', $password_hashed);
                $stmt->bindParam(':email', $email);
                $stmt->execute();

                $_SESSION['success'] = "Password has been reset successfully.";
                unset($_SESSION['email']); // ลบอีเมลออกจาก Session
                header('Location: login.php');
                exit();
            } catch (PDOException $e) {
                $_SESSION['error'] = "Database error: " . $e->getMessage();
            }
        } else {
            // แจ้งเตือนเมื่อ Confirm Password ไม่ตรงกัน
            $_SESSION['error'] = "Passwords do not match.";
            $showResetForm = true; // ให้คงฟอร์ม Reset Password ไว้
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }
        label {
            display: block;
            font-size: 14px;
            color: #555;
            margin-bottom: 5px;
        }
        input[type="email"], input[type="password"], input[type="submit"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .message {
            text-align: center;
            font-size: 14px;
            margin-bottom: 10px;
        }
        .error {
            color: red;
        }
        .success {
            color: green;
        }
        .form-footer {
            text-align: center;
            margin-top: 20px;
        }
        .form-footer a {
            color: #007bff;
            text-decoration: none;
            font-size: 14px;
        }
        .form-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if (!$showResetForm): ?>
            <h2>ลืมรหัสผ่าน</h2>
            <?php if (isset($_SESSION['error'])): ?>
                <div class="message error"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
            <?php endif; ?>
            <form action="forget_password.php" method="POST">
                <label for="email">ใส่อีเมลของคุณ:</label>
                <input type="email" id="email" name="email" placeholder="Email" required>
                <input type="submit" name="email_submit" value="Submit">
            </form>
        <?php else: ?>
            <h2>รีเซ็ตรหัสผ่าน</h2>
            <?php if (isset($_SESSION['error'])): ?>
                <div class="message error"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
            <?php endif; ?>
            <form action="forget_password.php" method="POST">
                <label for="new_password">รหัสผ่านใหม่:</label>
                <input type="password" id="new_password" name="new_password" placeholder="New Password" required>
                <label for="confirm_password">ยืนยันรหัสผ่าน:</label>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
                <input type="submit" name="reset_submit" value="Reset Password">
            </form>
        <?php endif; ?>
        <div class="form-footer">
            <a href="login.php">กลับไปที่หน้าเข้าสู่ระบบ</a>
        </div>
    </div>
</body>
</html>

<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - B-Farm</title>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Nunito:wght@600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css"> <!-- อ้างอิงไฟล์ CSS ภายนอก -->
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Login Form -->
    <div class="login-container ">
        <h2 style="text-align: center;">
            <a href="index.php" style="text-decoration: none; color: inherit; display: inline-block;">
                <img src="images/icon1.png" alt="icon" 
                    style="width: 130px; height: 130px; display: block; margin: -20px auto 0 auto;">
                <img src="images/icon2.png" alt="icon" 
                    style="width: 150px; height: 25px; display: block; margin: 0 auto 10px auto;">
            </a>
        </h2>

        <?php if (isset($_SESSION['error'])): ?>
            <div class="error"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
        <?php endif; ?>

        <form action="process_login.php" method="POST" 
            style="background-color: #f9f9f9; padding: 30px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1); max-width: 400px; margin: -10px auto 0 auto;">
            <h2 class="mitr-light"  style="text-align: center; margin-bottom: 10px;  color: #3f3b3b; margin: -20px auto 0 auto; font-weight: bold;">เข้าสู่ระบบ</h2>
            
            <div class= "mitr-light" style="margin-bottom: 5px;">
                <label for="username" style="display: block; margin-bottom: 0.5px; font-size: 14px; color: #555; font-weight: bold; ">ชื่อผู้ใช้งาน:</label>
                <input type="text" id="username" name="email" placeholder="กรอกชื่อผู้ใช้งาน" required
                    class= "mitr-light" style="width: 100%; padding: 12px; border-radius: 5px; border: 1px solid #ddd; font-size: 16px; box-sizing: border-box;">
            </div>

            <div class= "mitr-light" style="margin-bottom: 5px;">
                <label for="password" style="display: block; margin-bottom: 0.5px; font-size: 14px; color: #555; font-weight: bold; ">รหัสผ่าน:</label>
                <input type="password" id="password" name="password" placeholder="กรอกรหัสผ่าน" required 
                    class= "mitr-light" style="width: 100%; padding: 12px; border-radius: 5px; border: 1px solid #ddd; font-size: 16px;box-sizing: border-box;">
            </div>

            <input type="submit" value="เข้าสู่ระบบ" 
                class="mitr-light" 
                style="background-color: #4CAF50; color: #3f3b3b; font-weight: bold; padding: 14px; border: none; border-radius: 5px; font-size: 16px; cursor: pointer; width: 100%; transition: background-color 0.3s ease;">

            
            <div class= "mitr-light" style="text-align: center; margin-top: 5px; font-size: 14px;">
                <a href="register2.php" style="color: #4CAF50; text-decoration: none; font-weight: bold;">ลงทะเบียน dowload b-farm</a> | 
                <a href="forget_password.php" style="color: #4CAF50; text-decoration: none; font-weight: bold;">ลืมรหัสผ่าน?</a>
            </div>
        </form>
    </div>

</body>
</html>

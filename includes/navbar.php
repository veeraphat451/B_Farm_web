<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>B-Farm</title>
    <!-- Link CSS -->
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Header Section -->
    <header class="navbar-visible" >
        <div class="logo">
            <a href="index.php" class="logo-link">
                <?php
                    $imagePath = "images/icon1.png"; // Path to logo image
                    
                    // Check if the logo exists
                    if (file_exists($imagePath)) {
                        echo "<img src='$imagePath' alt='B-Farm Logo' class='logo-icon'>";
                    } else {
                        echo "<span class='logo-text'>Logo Not Found</span>";
                    }
                ?>
                <span class="logo-text">B-Farm</span>
            </a>
        </div>

        <!-- Navbar -->
        <nav>
            <ul class= "mitr-light">
                <li><a href="index.php">หน้าหลัก</a></li>
                <li><a href="#about">เกี่ยวกับ</a></li>
                <li><a href="#features">คุณสมบัติ</a></li>
                <li><a href="news.php">ข่าวสาร</a></li>
                <li><a href="manual.php">คู่มือการใช้งาน</a></li>
                <li><a href="register2.php">ดาวน์โหลด</a></li>
                <li><a href="#contact">ติดต่อเรา</a></li>
                <li><a href="register2.php" class="login-button">ลงทะเบียน</a></li>
            </ul>
        </nav>
    </header>

    <!-- Link JavaScript -->
    <script src="script.js"></script>
</body>

</html>

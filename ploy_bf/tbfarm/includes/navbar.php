<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>B-Farm</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        header {
            background-color: #1c9754; /* สีเขียวอ่อนสำหรับ navbar */
        }
        
        nav ul {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            margin-right: 20px;
        }

        nav ul li a {
            text-decoration: none;
            color: white;
            font-size: 16px;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        nav ul li a:hover {
            color: #FFD700;
            text-decoration: underline;
        }

        nav ul li a.login-button {
            font-weight: bold;
            color: #FFD700;
            border: 1px solid #FFD700;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        nav ul li a.login-button:hover {
            background-color: #FFD700;
            color: rgb(3, 6, 5);
        }

        .logo-text {
            font-size: 24px;
            color: #FFFFFF;
            font-family: "Mitr", serif;
            font-weight: 500;
        }

        /* Navbar Visibility Styles */
        .navbar-hidden {
            transform: translateY(-100%);
            transition: transform 0.3s ease-in-out;
        }

        .navbar-visible {
            transform: translateY(0);
            transition: transform 0.3s ease-in-out;
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <header class="navbar-visible">
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
                <li><a href="download.php">ดาวน์โหลด</a></li>
                <li><a href="#contact">ติดต่อเรา</a></li>
                <li><a href="register2.php" class="login-button">ลงทะเบียน</a></li>
            </ul>
        </nav>
    </header>

    <!-- Link JavaScript -->
    <script src="script.js"></script>
</body>
</html>

<?php
// Start session if required
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Home B-Farm</title>
        <link rel="stylesheet" href="assets/css/styles.css">
        <link rel="stylesheet" href="assets/css/index.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    </head>
    <body>

        <!-- Include Navbar -->
        <?php
        $navbar_path = __DIR__ . '/includes/navbar.php';
        if (file_exists($navbar_path)) {
            include $navbar_path;
        } else {
            echo '<p style="color:red;">Error: Navbar file not found!</p>';
        }
        ?>

        <!-- Hero Section -->
        <section class="section hero" id="home">
            <h1 class="mitr-light">Welcome to B-Farm</h1>
            <p class="mitr-light">เทคโนโลยีที่ทำให้การจัดการฟาร์มง่ายขึ้น และมีประสิทธิภาพมากขึ้น</p>
            <button class="mitr-light">เรียนรู้เกี่ยวกับ B-Farm</button>
        </section>

        <!-- Content Section -->
        <div class="content-sections">
            <!-- About Section 1 -->
            <section class="about-section" id="about">
                <div class="about-container">
                    <div class="about-image">
                        <img src="./images/bf.png" >
                    </div>
                    <div class="about-content">
                        <h1 class="about-title mitr-light">เกี่ยวกับ B-Farm</h1>
                        <p class="about-description mitr-light">
                            โปรแกรม B-Farm ใช้รูปแบบการเขียนโค้ดแบบบล็อกที่ทำให้ผู้ใช้สามารถควบคุมการทำงานอัตโนมัติของฟาร์มได้อย่างง่ายดาย ...
                        </p>
                    </div>
                </div>
            </section>

            <!-- About Section 2 -->
            <section class="about-section about-section-alt">
                <div class="about-container">
                    <div class="about-content">
                        <h1 class="about-title mitr-light">B-Farm ใช้กับ HandySense</h1>
                        <p class="about-description mitr-light">
                            หลังจากที่ผู้ใช้ได้สร้างโปรแกรมเสร็จแล้วในรูปแบบของบล็อกแล้ว ...
                        </p>
                    </div>
                    <div class="about-image">
                        <img src="./images/bf.png" >
                    </div>
                </div>
            </section>

            <!-- Features Section -->
            <section class="section features-section" id="features">
                <div class="features-header">
                    <h2 class="features-title mitr-light">คุณสมบัติ B-Farm</h2>
                    <p class="features-description mitr-light">เทคโนโลยีที่ทำให้การจัดการฟาร์มง่ายขึ้นและมีประสิทธิภาพมากขึ้น</p>
                </div>
                <div class="features-cards">
                    <div class="card">
                        <div class="icon-container">
                            <i class="fa fa-puzzle-piece"></i>
                        </div>
                        <div class="card-content mitr-light">
                            <h3>การเขียนโค้ดแบบบล็อก (Block-based Coding)</h3>
                            <p>ผู้ใช้สามารถสร้างโปรแกรมควบคุมการทำงานของฟาร์มได้ง่าย ๆ โดยไม่ต้องกังวลเรื่องไวยากรณ์ของภาษาคอมพิวเตอร์ ลดความผิดพลาดและทำให้เข้าใจคำสั่งได้ง่ายขึ้น</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="icon-container">
                            <i class="fa fa-leaf"></i>
                        </div>
                        <div class="card-content mitr-light">
                            <h3>รองรับการควบคุมเซ็นเซอร์หลากหลายชนิด</h3>
                            <p>สามารถเชื่อมต่อและสั่งการเซ็นเซอร์ภายในฟาร์มได้ เช่น เซ็นเซอร์วัดอุณหภูมิ ความชื้นในดิน เซ็นเซอร์วัดความชื้นในอากาศ หรือเซ็นเซอร์แสง ทำให้การเพาะปลูกแม่นยำและมีประสิทธิภาพมากขึ้น</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="icon-container">
                            <i class="fa fa-cloud-upload"></i>
                        </div>
                        <div class="card-content mitr-light">
                            <h3>อัปโหลดโค้ดไปยังบอร์ด HandySense ได้โดยตรง</h3>
                            <p>เพียงเชื่อมต่อบอร์ดกับคอมพิวเตอร์แล้วกดอัปโหลด ก็สามารถใช้งานจริงได้ทันที โดยไม่ต้องมีพื้นฐานการเขียนโปรแกรมเชิงเทคนิคขั้นสูง</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="icon-container">
                            <i class="fa fa-cogs"></i>
                        </div>
                        <div class="card-content mitr-light">
                            <h3>ความยืดหยุ่นในการปรับแต่ง</h3>
                            <p>ผู้ใช้สามารถปรับแก้ สร้าง หรือเพิ่มเติมฟังก์ชันการทำงานได้ตามต้องการ ตอบโจทย์การทำงานในหลากหลายสภาพแวดล้อมและรูปแบบการเพาะปลูกของฟาร์มแต่ละแห่ง</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- Include Footer -->
        <?php
        $footer_path = __DIR__ . '/includes/footer.php';
        if (file_exists($footer_path)) {
            include $footer_path;
        } else {
            echo '<p style="color:red;">Error: Footer file not found!</p>';
        }
        ?>

        <script src="assets/js/script.js"></script> <!-- External JS -->
    </body>
</html>

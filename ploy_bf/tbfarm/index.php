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
        <!-- <link rel="stylesheet" href="assets/css/index.css"> -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    </head>
            <style>
            /* Features Section */
            .features-section {
                padding: 80px 20px;
                text-align: center;
                position: relative;
                padding: 100px 20px;
                overflow: hidden;
                /* background-color: :rgb(25, 92, 55); */
                background: linear-gradient(135deg ,rgba(25, 92, 55),rgba(25, 92, 55),rgba(25, 92, 55));
            }

            .features-title {
                font-family: "Mitr", serif;
                font-size: 2.5rem;
                margin-bottom: 10px;
                color:rgb(255, 255, 255);
            }

            .features-description {
                font-size: 1.2rem;
                margin-bottom: 40px;
                color:rgb(211, 203, 203);
            }

            .features-cards {
                display: flex;
                justify-content: space-between;
                gap: 20px;
                flex-wrap: nowrap;
                max-width: 1200px;
                margin: auto;
            }
            

            .card {
                background: white;
                border-radius: 10px;
                text-align: center;
                padding: 20px;
                width: 20%;
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }

            .card:hover {
                transform: translateY(-10px);
                box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            }

            .icon-container {
                font-size: 3rem;
                margin-bottom: 20px;
                color:rgba(25, 92, 55, 0.76);
            }
            .card-content h3 {
                /* font-size: 1.5rem; */
                margin-bottom: 10px;
                color: #333;
            }

            .card-content p {
                font-size: 1rem;
                color: #555;
            }

            /* Hero Section Styles */
            .hero { 
                background-position: center;
                color: white; 
                text-align: center;
                padding: 100px 20px;
                background-color: rgba(0, 0, 0, 0.5);
                background-blend-mode: darken;
                height: 500px;  /* Height of the section */
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }

            .hero h1 {
                font-size: 5.5rem; /* Large font size for main title */
                margin: 0; /* No margin for alignment */
                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7); /* Text shadow for legibility */
            }

            .hero p {
                font-size: 1.2rem; /* Subtitle text size */
                margin: 20px 0 40px; /* Spacing around the subtitle */
                text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5); /* Text shadow for legibility */
            }

            .hero button {
                width: 200px; /* Button width */
                padding: 10px 0; /* Padding inside the button */
                background-color: #709f7c; /* Background color of the button */
                color: white; /* Text color */
                border: none; /* No border */
                border-radius: 5px; /* Rounded corners */
                font-size: 16px; /* Text size */
                cursor: pointer; /* Pointer cursor on hover */
                text-align: center; /* Center text inside the button */
                transition: background-color 0.3s ease, transform 0.2s ease; /* Smooth transition for hover effects */
            }

            .hero button:hover {
                background-color: #416c4c; /* Darker background on hover */
                transform: scale(1.05); /* Slightly scale up on hover */
            }

            /* About Section Styles */
            .about-section {
                position: relative;
                padding: 100px 20px;
                background-color:rgb(255, 255, 255);
                /* background: linear-gradient(135deg,rgb(164, 198, 150),rgb(179, 214, 164),rgb(255, 255, 255)); */
                overflow: hidden;
            }

            .about-section-alt {
                background-color:rgb(255, 255, 255);
                /* background: linear-gradient(135deg, #2c5364, #203a43, #0f2027); */
            }
            

            .about-container {
                display: flex;
                align-items: center;
                justify-content: space-between;
                max-width: 1200px;
                margin: auto;
                flex-wrap: wrap;
                gap: 20px;
                position: relative;
                z-index: 1;
            }

            .about-content {
                flex: 1;
                max-width: 600px;
                padding: 20px;
                text-align: left;
                animation: fadeIn 1.5rem ease-in-out;
            }
            .about-content {
                font-family: 'Roboto', sans-serif;
                font-weight: bold;
            }

            .about-title {
                font-size: 3rem;
                margin-bottom: 20px;
                color:rgb(55, 132, 48);
            }
            .about-title {
                font-family: 'Mitr', sans-serif;
                font-size: 3rem;
                margin-bottom: 20px;
                color: rgb(55, 132, 48);
                font-weight: bold; /* กำหนดความหนา */
                
            }


            .about-description {
                font-size: 1.2rem;
                line-height: 1.8;
                color:rgb(113, 130, 110);
            }

            .about-image {
                flex: 1;
                max-width: 600px;
                position: relative;
                text-align: center;
                animation: zoomIn 2s ease-in-out;
            }

            .about-image img {
                max-width: 100%;
                border-radius: 15px;
                box-shadow: 0 10px 50px rgba(0, 0, 0, 0.5);
                transition: transform 0.5s ease, box-shadow 0.5s ease;
            }

            .about-image img:hover {
                transform: scale(1.1) rotate(-2deg);
                box-shadow: 0 20px 70px rgba(0, 0, 0, 0.8);
            }

            /* Header Styles */
            header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                background-color: #2a5245;
                padding: 10px 20px;
                position: sticky;
                top: 0;
                z-index: 1000;
            }

            .logo {
                display: flex;
                align-items: center;
                gap: 10px;
            }

            .logo-link {
                display: flex;
                align-items: center;
                gap: 10px;
                text-decoration: none;
                color: inherit;
            }

            .logo-icon {
                width: 50px;
                height: 50px;
                object-fit: contain;
            }

            .logo-text {
                font-size: 24px;
                font-weight: bold;
                color: #FFFFFF;
            }
        </style>
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
            <!-- Adding an image directly inside the section -->
            <img src="images/hsf.jpg" alt="Hero Image" style="width:100%; height:auto; position: absolute; top: 0; left: 0; z-index: -1;"> 
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
                        <h1 class="about-title">เกี่ยวกับ B-Farm</h1>
                        <p class="about-description mitr-light">
                            B-Farm เป็นโปรแกรมที่ใช้ การเขียนโค้ดแบบบล็อก (Block-based Programming) เพื่อช่วยให้การควบคุมและจัดการฟาร์มอัตโนมัติเป็นเรื่องง่ายและสะดวกสำหรับผู้ใช้งานทุกระดับ เพียงแค่ลากและวางบล็อกคำสั่ง ผู้ใช้สามารถสร้างโปรแกรมได้อย่างรวดเร็ว ลดความซับซ้อนของการเขียนโค้ดแบบดั้งเดิม
                        </p>
                    </div>
                </div>
            </section>

            <!-- Features Section -->
            <section class="section features-section" id="features">
                <div class="features-header">
                    <h2 class="features-title ">คุณสมบัติ B-Farm</h2>
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

            <!-- About Section 2 -->
            <section class="about-section about-section-alt">
                <div class="about-container">
                    <div class="about-content">
                        <h1 class="about-title ">การใช้งานร่วมกับ HandySense</h1>
                        <p class="about-description mitr-light">
                        B-Farm ถูกออกแบบมาให้ทำงานร่วมกับ HandySense บอร์ดไมโครคอนโทรลเลอร์สำหรับเกษตรอัจฉริยะ หลังจากสร้างคำสั่งในรูปแบบบล็อก โปรแกรมจะถูกแปลงและอัปโหลดไปยัง HandySense เพื่อควบคุมระบบในฟาร์ม เช่น ระบบรดน้ำอัตโนมัติหรือการวัดค่าจากเซนเซอร์ ช่วยเพิ่มประสิทธิภาพและลดความยุ่งยากในการจัดการฟาร์ม
                        </p>
                    </div>
                    <div class="about-image">
                        <img src="./images/hs_rm.png" >
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

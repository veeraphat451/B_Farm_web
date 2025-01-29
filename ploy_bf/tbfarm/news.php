<?php
include 'controller/db_connect.php'; // ใช้ตัวแปร $db ที่เชื่อมต่อฐานข้อมูลด้วย pg_connect

// Query ข้อมูลข่าวสาร
$sql = "SELECT id, title, content, image_path, created_at FROM news ORDER BY created_at DESC";
$result = pg_query($db, $sql);

if (!$result) {
    die("Query failed: " . pg_last_error($db));
}

$newsPosts = [];
while ($row = pg_fetch_assoc($result)) {
    $newsPosts[] = $row;
}

pg_close($db); // ปิดการเชื่อมต่อฐานข้อมูล
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
    <!-- <link rel="stylesheet" href="assets/css/news.css"> -->
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Mitr', sans-serif;
            margin: 0;
            padding: 0;
            background-color: white;
        }

        .news-header {
            text-align: left;
            padding: 20px;
            color: #416c4c;
        }

        .news-header h1 {
            margin: 0;
            font-weight: 600;
        }

        .news-header .divider {
            width: 100%;
            height: 1.5px;
            background-color:rgb(80, 81, 80);
            margin-top: 10px;
        }

        .news-container {
            display: flex;
            flex-wrap: wrap;
            margin: 20px;
            gap: 20px;
        }

        .featured-news {
            flex: 2;
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .featured-news img {
            width: 100%;
            height: auto;
        }

        .featured-news-content {
            padding: 20px;
        }

        .featured-news-content h3 {
            margin-top: 0;
            font-size: 1.5em;
            color:#416c4c;
        }

        .featured-news-content p {
            color: #666;
            margin: 10px 0;
        }

        .featured-news-content a {
            color: #416c4c;
            text-decoration: none;
            font-weight: bold;
        }

        .grid-news {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .news-item {
            display: flex;
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .news-item img {
            width: 100px;
            height: 100px;
            object-fit: cover;
        }

        .news-item-content {
            padding: 10px;
            flex: 1;
        }

        .news-item-content h4 {
            margin: 0;
            font-size: 1.2em;
            color: #416c4c;
        }

        .news-item-content p {
            margin: 5px 0;
            color: #666;
            font-size: 0.9em;
        }

        .news-item-content a {
            color: #416c4c;
            text-decoration: none;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <!-- Include Navbar -->
    <?php
        $navbar_path = __DIR__ . '/includes/navbar.php';
        include $navbar_path; // Assuming this will exist as per your project structure
    ?>
    
    <div class="news-header">
        <h1>ข่าวสารและงานอีเว้นท์</h1>
        <div class="divider"></div>
    </div>>

    <div class="news-container">
        <!-- Featured News -->
        <div class="featured-news">
            <img src="assets/images/featured-news.jpg" alt="Featured News">
            <div class="featured-news-content">
                <h3>โครงการส่งเสริมเกษตรอัจฉริยะในโรงเรียนยุคปกติใหม่ (New Normal)</h3>
                <p>Wed Nov 10 2021</p>
                <p>ปลูกฝัน ปั้นนวัตกรน้อย ด้านเกษตรอัจฉริยะ! เปิดรับสมัครแล้ว...</p>
                <a href="#">อ่านเพิ่มเติม...</a>
            </div>
        </div>

        <!-- Grid News -->
        <div class="grid-news">
            <div class="news-item">
                <img src="assets/images/news1.jpg" alt="News 1">
                <div class="news-item-content">
                    <h4>HandySense By ข่าวสามมิติ</h4>
                    <p>Fri Apr 16 2021</p>
                    <a href="#">อ่านเพิ่มเติม...</a>
                </div>
            </div>

            <div class="news-item">
                <img src="assets/images/news2.jpg" alt="News 2">
                <div class="news-item-content">
                    <h4>“ต่อยอด ต่อเนื่องอย่างยั่งยืน!”</h4>
                    <p>Mon Mar 29 2021</p>
                    <a href="#">อ่านเพิ่มเติม...</a>
                </div>
            </div>

            <div class="news-item">
                <img src="assets/images/news3.jpg" alt="News 3">
                <div class="news-item-content">
                    <h4>เทคโนโลยีแบบเปิดเพื่อความต่อเนื่อง</h4>
                    <p>Thu Mar 25 2021</p>
                    <a href="#">อ่านเพิ่มเติม...</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Footer -->
    <?php
        $footer_path = __DIR__ . '/includes/footer.php';
        include $footer_path; // Again, assuming file existence as per your setup
    ?>

    <script src="assets/js/script.js"></script> <!-- External JS -->
</body>
</html>
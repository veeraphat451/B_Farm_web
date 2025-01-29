<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>B-Farm Footer</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .footer {
            background-color:rgb(25, 92, 55);
            color: white;
            padding: 20px 40px;
            display: flex;
            flex-wrap: wrap; /* ทำให้เนื้อหาแสดงผลต่อกันในบรรทัดถัดไปเมื่อพื้นที่ไม่พอ */
            justify-content: space-between;
            align-items: flex-start;
            gap: 20px; /* ระยะห่างระหว่างคอลัมน์ */
        } 

        /* คอลัมน์ */
        .footer-column {
            flex: 1;
            text-align: left;
            position: relative; /* เพื่อวางเส้นแนวตั้ง */
        }

        /* h3 ส่วนหัว */
        .footer-column h3 {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 20px;
            position: relative;
        }

        /* เส้นยาวใต้ h3 */
        .footer-column .vertical-line {
            border: none;
            border-left: 2px solid white; /* เส้นแนวตั้ง */
            height: 100px; /* ความยาวของเส้น */
            position: absolute;
            top: 20px; /* ระยะห่างจากด้านบน */
            left: 5; /* จัดชิดด้านซ้าย */
        }

        /* เนื้อหาภายในคอลัมน์ */
        .footer-column p,
        .footer-column a {
            font-size: 14px;
            line-height: 1.8;
            margin: 5px 0;
            color: white;
            text-decoration: none;
        }

        .footer-column a:hover {
            text-decoration: underline;
        }

        /* ไอคอน */
        .footer i {
            margin-right: 60px;
        }

        /* โลโก้ */
        .footer-column.logos {
            display: flex; /* ใช้ Flexbox */
            flex-wrap: wrap; /* หากโลโก้เกิน ให้ขึ้นบรรทัดใหม่ */
            justify-content: center; /* จัดโลโก้ให้อยู่ตรงกลางในแนวนอน */
            align-items: center; /* จัดโลโก้ให้อยู่ตรงกลางในแนวตั้ง */
            text-align: center; /* เผื่อกรณีที่มีข้อความใต้โลโก้ */
            gap: 20px; /* ระยะห่างระหว่างโลโก้ */
        }

        .footer-column.logos img {
            width: 180px;
            margin-bottom: 20px; /* ระยะห่างระหว่างโลโก้ */
        }

        .footer-column-center {
            flex: 1; /* ให้คอลัมน์มีขนาดเท่าๆ กัน */
            text-align: left;
        }

        .footer-center {
            text-align: center; /* จัดให้อยู่ตรงกลาง */
            margin-top: 20px; /* เพิ่มระยะห่างจากคอลัมน์ด้านบน */
            width: 100%; /* ใช้ความกว้างเต็มบรรทัด */
            font-size: 14px;
            color: white;
        }

        .contact a {
            text-decoration: none; /* ลบเส้นใต้ */
            color: white; /* เปลี่ยนสีเป็นสีขาว */
        }

        .contact a:hover {
            text-decoration: underline; /* เพิ่มเส้นใต้เมื่อ hover */
            color: #ccc; /* เปลี่ยนสีเมื่อ hover (ตัวอย่างเป็นสีเทาอ่อน) */
        }
        .contact i {
            margin-right: 25px; /* เพิ่มระยะห่างด้านขวา */
            vertical-align: middle; /* จัดแนวกลางกับข้อความ */
            font-size: 20px; /* ปรับขนาดไอคอน */
        }



    </style>
</head>
<body>
    <footer class="footer" id="contact">
        <div class="footer-column-center logos">
            <img src="./images/icons3.png" alt="bf" style="width:180px; margin-right: 20px;">
            <img src="./images/handysense.png" alt="handysense" style="width:180px; margin-right: 20px;">
            <img src="./images/nectec.png" alt="NECTEC" style="width:180px; margin-right: 20px;">
            <img src="./images/nstda.png" alt="NSTDA" style="width:180px; margin-right: 20px;">
        </div>
        <!-- ที่อยู่ -->
        <div class="footer-column-center address">
            <h3 class="mitr-light">ที่อยู่</h3>
            <hr class="vertical-line">
            <p class="mitr-light">ฝ่ายกลยุทธ์วิจัยและถ่ายทอดเทคโนโลยี (SPD)</p>
            <p class="mitr-light">ศูนย์เทคโนโลยีอิเล็กทรอนิกส์และคอมพิวเตอร์แห่งชาติ (ศอ.)</p>
        </div>

        <!-- ติดต่อเรา -->
        <!-- <div class="footer-column-center contact">
            <h3 class="mitr-light">ติดต่อเรา</h3>
            <hr class="vertical-line">
            <p class="mitr-light"><i class="fa fa-phone"></i> 025646900 ต่อ 2353</p>
            <p class="mitr-light"><i class="fa fa-globe"></i><a href="https://www.nectec.or.th" class="mitr-light">https://www.nectec.or.th</a></p>
            <p class="mitr-light"><i class="fa fa-facebook"></i> HandySense Community</p>
        </div> -->
        <div class="footer-column-center contact">
            <h3 class="mitr-light">ติดต่อเรา</h3>
            <hr class="vertical-line">
            <p class="mitr-light">
                <i class="fa fa-phone"></i> 025646900 ต่อ 2353
            </p>
            <p class="mitr-light">
                <i class="fa fa-globe"></i>
                <a href="https://www.nectec.or.th" class="mitr-light">https://www.nectec.or.th</a>
            </p>
            <p class="mitr-light">
                <i class="fa fa-facebook"></i>     HandySense Community
            </p>
        </div>

        
        <!-- Footer Center -->
        <div class="footer-center">
            <p class="mitr-light">
                Copyright © 2020 | 
                <a>Privacy Policy</a> | 
                <a>Terms</a>
            </p>
        </div>

    </footer>
</body>
</html>
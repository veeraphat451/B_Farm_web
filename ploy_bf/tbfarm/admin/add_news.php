<?php
session_start();
include('config/condb.php'); // ตรวจสอบว่ามีการเชื่อมต่อฐานข้อมูลในไฟล์นี้

// ตรวจสอบว่ามีข้อความข้อผิดพลาดในเซสชันหรือไม่
if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    unset($_SESSION['error']); // ล้างข้อผิดพลาดหลังจากแสดง
}

if (isset($_SESSION['success'])) {
    $success = $_SESSION['success'];
    unset($_SESSION['success']); // ล้างข้อความแจ้งเตือนหลังจากแสดง
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>เพิ่มข่าวสาร | ระบบจัดการคลังข้อมูลงานวิจัย</title>
    <link href="https://fonts.googleapis.com/css?family=Kanit:100,200,300&subset=thai" rel="stylesheet">
    <?php include('import_style.php'); ?>
</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">
    <?php include('header.php'); ?>
    <?php include('menu_left.php'); ?>

    <div class="content-wrapper">
        <section class="content-header">
            <h1>เพิ่มข่าวสารใหม่</h1>
        </section>

        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">แบบฟอร์มเพิ่มข่าวสาร</h3>
                </div>
                <div class="box-body">
                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php endif; ?>
                    <?php if (isset($success)): ?>
                        <div class="alert alert-success"><?php echo $success; ?></div>
                    <?php endif; ?>

                    <form action="save_news.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">หัวข้อข่าวสาร</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="กรอกหัวข้อข่าวสาร" required>
                        </div>
                        <div class="form-group">
                            <label for="content">เนื้อหาข่าวสาร</label>
                            <textarea class="form-control" id="content" name="content" rows="5" placeholder="กรอกเนื้อหาข่าวสาร" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">รูปภาพข่าวสาร</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                        </div>
                        <button type="submit" class="btn btn-primary">บันทึกข่าวสาร</button>
                    </form>
                </div>
            </div>
        </section>
    </div>

    <?php include('footer.php'); ?>
</div>

<?php include('import_script.php'); ?>
</body>
</html>

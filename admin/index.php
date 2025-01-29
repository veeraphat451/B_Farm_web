<?php 
session_start();
include('config/condb.php'); // ใช้ตัวแปร $conn สำหรับการเชื่อมต่อ
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ระบบจัดการคลังข้อมูลผู้ใช้งาน B-Farm</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?php include('import_style.php'); ?>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Kanit:100,200,300&amp;subset=thai" rel="stylesheet">
</head>

<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

    <?php include('header.php'); ?>
    <?php include('menu_left.php'); ?>

    <div class="content-wrapper">
        <section class="content-header">
            <h1>Dashboard</h1>
            <p class="text-muted">ภาพรวมระบบจัดการข้อมูลผู้ใช้งาน B-Farm</p>
        </section>

        <section class="content">
            <div class="row">
                <!-- จำนวนผู้ลงทะเบียน -->
                <div class="col-md-4">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <?php
                            try {
                                $query_users = "SELECT COUNT(*) AS total_users FROM users";
                                $result_users = $conn->query($query_users);
                                $row_users = $result_users->fetch(PDO::FETCH_ASSOC);
                                $total_users = $row_users['total_users'] ?? 0;
                            } catch (PDOException $e) {
                                $total_users = "Error: " . $e->getMessage();
                            }
                            ?>
                            <h3><?php echo htmlspecialchars($total_users); ?></h3>
                            <p>จำนวนผู้ลงทะเบียน</p>
                        </div>
                        <a href="users.php" class="small-box-footer">ดูรายละเอียด <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!-- จำนวนจังหวัดที่ลงทะเบียน -->
                <div class="col-md-4">
                    <div class="small-box bg-blue">
                        <div class="inner">
                            <?php
                            try {
                                $query_provinces = "SELECT COUNT(DISTINCT province_id) AS total_provinces FROM users";
                                $result_provinces = $conn->query($query_provinces);
                                $row_provinces = $result_provinces->fetch(PDO::FETCH_ASSOC);
                                $total_provinces = $row_provinces['total_provinces'] ?? 0;
                            } catch (PDOException $e) {
                                $total_provinces = "Error: " . $e->getMessage();
                            }
                            ?>
                            <h3><?php echo htmlspecialchars($total_provinces); ?></h3>
                            <p>จำนวนจังหวัดที่ลงทะเบียน</p>
                        </div>
                        <a href="provinces.php" class="small-box-footer">ดูรายละเอียด <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!-- จำนวนครั้งที่กดดาวน์โหลด -->
                <div class="col-md-4">
                    <div class="small-box bg-orange">
                        <div class="inner">
                            <?php
                            try {
                                $query_downloads = "SELECT COUNT(*) AS total_downloads FROM download";
                                $result_downloads = $conn->query($query_downloads);
                                $row_downloads = $result_downloads->fetch(PDO::FETCH_ASSOC);
                                $total_downloads = $row_downloads['total_downloads'] ?? 0;
                            } catch (PDOException $e) {
                                $total_downloads = "Error: " . $e->getMessage();
                            }
                            ?>
                            <h3><?php echo htmlspecialchars($total_downloads); ?></h3>
                            <p>จำนวนการดาวน์โหลด</p>
                        </div>
                        <a href="downloads.php" class="small-box-footer">ดูรายละเอียด <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <?php include('footer.php'); ?>
    <div class="control-sidebar-bg"></div>
</div>
<?php include('import_script.php'); ?>
</body>
</html>

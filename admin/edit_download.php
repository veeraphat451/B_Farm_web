<?php session_start();
include('config/condb.php');

// รับค่า id จาก URL
$id = $_GET['id'];

// ดึงข้อมูลไฟล์ดาวน์โหลดที่ต้องการแก้ไข
$stmt = $conn->prepare("SELECT * FROM download WHERE id = :id");
$stmt->execute(['id' => $id]);
$download = $stmt->fetch();

if (!$download) {
    echo "ไม่พบไฟล์ดาวน์โหลดที่ต้องการแก้ไข";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>แก้ไขไฟล์ดาวน์โหลด | ระบบจัดการคลังข้อมูล</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php include('import_style.php');?>

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Kanit:100,200,300&amp;subset=thai" rel="stylesheet">
</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <?php include('header.php');?>
  <?php include('menu_left.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php include('menu_main.php');?>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header text-center bg-blue">
              <h3 class="box-title">แก้ไขไฟล์ดาวน์โหลด</h3>
            </div>
            <div class="box-body">
              <form action="update_download.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $download['id']; ?>">
                <div class="form-group">
                  <label for="title">หัวข้อไฟล์ดาวน์โหลด</label>
                  <input type="text" name="title" id="title" class="form-control" value="<?php echo htmlspecialchars($download['title']); ?>" required>
                </div>
                <div class="form-group">
                  <label for="version">เวอร์ชัน</label>
                  <input type="text" name="version" id="version" class="form-control" value="<?php echo htmlspecialchars($download['version']); ?>" required>
                </div>
                <div class="form-group">
                  <label for="file">เลือกไฟล์ดาวน์โหลด (.zip เท่านั้น)</label>
                  <input type="file" name="file" id="file" class="form-control" accept=".zip">
                  <?php if (!empty($download['file'])): ?>
                    <p>ไฟล์ปัจจุบัน: 
                      <a href="uploads/<?php echo htmlspecialchars($download['file']); ?>" target="_blank"><?php echo htmlspecialchars($download['file']); ?></a>
                    </p>
                  <?php endif; ?>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-warning btn-block">อัปเดตไฟล์ดาวน์โหลด</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <?php include('footer.php');?>

  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<?php include('import_script.php');?>
</body>
</html>

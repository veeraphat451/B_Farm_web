<?php 
session_start();
include('config/condb.php');

// รับค่า id จาก URL
$id = $_GET['id'];

// ดึงข้อมูลที่ต้องการแก้ไข
$stmt = $conn->prepare("SELECT * FROM manuals WHERE id = :id");
$stmt->execute([':id' => $id]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$data) {
    echo "ไม่พบข้อมูลที่ต้องการแก้ไข";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>แก้ไขข้อมูล | ระบบจัดการข้อมูล</title>
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
              <h3 class="box-title">แก้ไขข้อมูล</h3>
            </div>
            <div class="box-body">
              <form action="update_manual.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($data['id']); ?>">
                <div class="form-group">
                  <label for="name">ชื่อคู่มือ</label>
                  <input type="text" name="name" id="name" class="form-control" value="<?php echo htmlspecialchars($data['name']); ?>" required>
                </div>
                <div class="form-group">
                  <label for="file">อัปโหลดไฟล์ใหม่ (ไม่จำเป็น)</label>
                  <input type="file" name="file" id="file" class="form-control" accept=".pdf">
                  <?php if (!empty($data['file_path'])): ?>
                    <p>ไฟล์ปัจจุบัน: <a href="<?php echo htmlspecialchars($data['file_path']); ?>" target="_blank">ดาวน์โหลด</a></p>
                  <?php endif; ?>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-warning btn-block">อัปเดตข้อมูล</button>
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

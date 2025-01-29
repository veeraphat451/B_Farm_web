<?php 
session_start();
include('config/condb.php');

// รับค่า id จาก URL
$id = $_GET['id'];

// ดึงข้อมูลที่ต้องการแก้ไข
$stmt = $conn->prepare("SELECT * FROM users WHERE id = :id");
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
  <title>แก้ไขข้อมูลผู้ใช้งาน | ระบบจัดการข้อมูล</title>
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
              <h3 class="box-title">แก้ไขข้อมูลผู้ใช้</h3>
            </div>
            <div class="box-body">
              <form action="update_user.php" method="post">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($data['id']); ?>">
                <div class="form-group">
                  <label for="first_name">ชื่อ</label>
                  <input type="text" name="first_name" id="first_name" class="form-control" value="<?php echo htmlspecialchars($data['first_name']); ?>" required>
                </div>
                <div class="form-group">
                  <label for="last_name">นามสกุล</label>
                  <input type="text" name="last_name" id="last_name" class="form-control" value="<?php echo htmlspecialchars($data['last_name']); ?>" required>
                </div>
                <div class="form-group">
                  <label for="email">อีเมล</label>
                  <input type="email" name="email" id="email" class="form-control" value="<?php echo htmlspecialchars($data['email']); ?>" required>
                </div>
                <div class="form-group">
                  <label for="tel">เบอร์โทรศัพท์</label>
                  <input type="text" name="tel" id="tel" class="form-control" value="<?php echo htmlspecialchars($data['tel']); ?>" required>
                </div>
                <div class="form-group">
                  <label for="object">วัตถุประสงค์</label>
                  <textarea name="object" id="object" class="form-control" rows="3" required><?php echo htmlspecialchars($data['object']); ?></textarea>
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

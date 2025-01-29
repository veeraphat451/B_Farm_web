<?php session_start();
include('config/condb.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>เพิ่มข่าวสาร | ระบบจัดการคลังข้อมูลงานวิจัย</title>
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
        <div class="box-header text-center bg-green">
          <h3 class="box-title">เพิ่มคู่มือการใช้งาน</h3>
        </div>
        <div class="box-body">
          <form action="save_manual.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="manual_name">ชื่อคู่มือ</label>
              <input type="text" name="manual_name" id="manual_name" class="form-control" placeholder="กรุณากรอกชื่อคู่มือ" required>
            </div>
            <div class="form-group">
              <label for="file">ไฟล์คู่มือ</label>
              <input type="file" name="file" id="file" class="form-control" accept=".pdf" required>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-success btn-block">บันทึกคู่มือการใช้งาน</button>
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

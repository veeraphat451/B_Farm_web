<?php session_start();
include('config/condb.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>เพิ่มไฟล์ดาวน์โหลด | ระบบจัดการคลังข้อมูลผู้ใช้งาน B-Farm</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php include('import_style.php'); ?>

  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <?php include('header.php'); ?>
  <?php include('menu_left.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php include('menu_main.php'); ?>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header text-center bg-blue">
              <h3 class="box-title">เพิ่มไฟล์ดาวน์โหลด</h3>
            </div>
            <div class="box-body">
              <!-- ฟอร์มเพิ่มไฟล์ดาวน์โหลด -->
              <form action="process_download.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="title">หัวข้อไฟล์ดาวน์โหลด</label>
                  <input type="text" name="title" id="title" class="form-control" placeholder="กรุณากรอกหัวข้อไฟล์ดาวน์โหลด" required>
                </div>
                <div class="form-group">
                  <label for="version">เวอร์ชัน</label>
                  <input type="text" name="version" id="version" class="form-control" placeholder="กรุณากรอกเวอร์ชันไฟล์" required>
                </div>
                <div class="form-group">
                  <label for="file">อัปโหลดไฟล์</label>
                  <input type="file" name="file" id="file" class="form-control" accept=".zip" required>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-success btn-block">บันทึกไฟล์ดาวน์โหลด</button>
                </div>
              </form>

              <!-- แสดงข้อความป๊อปอัพ -->
              <?php if (isset($_GET['success'])): ?>
                <script>
                  Swal.fire({
                    icon: 'success',
                    title: 'สำเร็จ!',
                    text: 'บันทึกไฟล์ดาวน์โหลดเรียบร้อยแล้ว',
                    confirmButtonText: 'ตกลง'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = 'download_dashboard.php';
                    }
                  });
                </script>
              <?php elseif (isset($_GET['error'])): ?>
                <script>
                  Swal.fire({
                    icon: 'error',
                    title: 'เกิดข้อผิดพลาด!',
                    text: '<?php echo htmlspecialchars($_SESSION["error"]); ?>',
                    confirmButtonText: 'ตกลง'
                  });
                </script>
                <?php unset($_SESSION['error']); ?>
              <?php endif; ?>
            </div>
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

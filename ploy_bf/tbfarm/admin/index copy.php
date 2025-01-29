<?php session_start();
include('config/condb.php');

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ระบบจัดการคลังข้อมูลงานวิจัย</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php include('import_style.php'); ?>

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Kanit:100,200,300&amp;subset=thai" rel="stylesheet">
</head>

<body class="hold-transition skin-green sidebar-mini">
  <div class="wrapper">

    <?php include('header.php'); ?>

    <?php include('menu_left.php'); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->

      <?php
      include('menu_main.php');
      ?>

      <!-- Main content -->
      <section class="content">
        <!--เนื้อหา-->

        <div class="row">
          <!-- สรุปจำนวนการลงทะเบียน -->
          <div class="col-md-4">
            <div class="box">
              <div class="box-header text-center bg-green">
                <h3 class="box-title">จำนวนการลงทะเบียน</h3>
              </div>
              <div class="box-body text-center">
                <h2>1,234</h2>
                <p>รายการ</p>
              </div>
            </div>
          </div>

          <!-- สรุปจำนวนจังหวัดที่มีการลงทะเบียน -->
          <div class="col-md-4">
            <div class="box">
              <div class="box-header text-center bg-blue">
                <h3 class="box-title">จังหวัดที่ลงทะเบียน</h3>
              </div>
              <div class="box-body text-center">
                <h2>45</h2>
                <p>จังหวัด</p>
              </div>
            </div>
          </div>

          <!-- สรุปจำนวนครั้งที่กดดาวน์โหลด -->
          <div class="col-md-4">
            <div class="box">
              <div class="box-header text-center bg-yellow">
                <h3 class="box-title">จำนวนการดาวน์โหลด</h3>
              </div>
              <div class="box-body text-center">
                <h2>567</h2>
                <p>ครั้ง</p>
              </div>
            </div>
          </div>
        </div>


        <!--ปิดเนื้อหา-->

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php include('footer.php'); ?>


    <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->

  <?php include('import_script.php'); ?>
</body>

</html>
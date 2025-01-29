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
    
    <?php
    	include('menu_main.php');
	?>

    <!-- Main content -->
    <section class="content">
	<!--เนื้อหา-->

  <div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header text-center bg-blue">
        <h3 class="box-title">จัดการข่าวสาร</h3>
        <a href="add_news_form.php" class="btn btn-success pull-right">เพิ่มข่าวสาร</a>
      </div>
      <div class="box-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>ลำดับ</th>
              <th>หัวข้อข่าวสาร</th>
              <th>ภาพประกอบ</th>
              <th>วันที่เพิ่ม</th>
              <th>การจัดการ</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // รวมไฟล์ config เพื่อเชื่อมต่อฐานข้อมูล
            include 'config/condb.php';

            try {
                // ดึงข้อมูลข่าวสารจากฐานข้อมูล
                $stmt = $pdo->query("SELECT id, title, created_at, image_path FROM news ORDER BY created_at DESC");
                $newsList = $stmt->fetchAll();

                if ($newsList) {
                    foreach ($newsList as $index => $news) {
                        echo "<tr>
                                <td>" . ($index + 1) . "</td>
                                <td>" . htmlspecialchars($news['title']) . "</td>
                                <td>";

                        // ตรวจสอบและแสดงภาพ
                        $imagePath = 'uploads/' . htmlspecialchars($news['image_path']);
                        if (!empty($news['image_path']) && file_exists($imagePath)) {
                            echo "<img src='" . $imagePath . "' alt='News Image' style='width: 100px; height: auto;'>";
                        } else {
                            echo "ไม่มีภาพ";
                        }

                        echo "</td>
                                <td>" . htmlspecialchars(date('d/m/Y H:i:s', strtotime($news['created_at']))) . "</td>
                                <td>
                                    <a href='edit_news.php?id=" . $news['id'] . "' class='btn btn-warning btn-sm'>แก้ไข</a>
                                    <a href='delete_news.php?id=" . $news['id'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"คุณต้องการลบข่าวนี้หรือไม่?\")'>ลบ</a>
                                </td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center'>ไม่มีข้อมูลข่าวสาร</td></tr>";
                }
            } catch (Exception $e) {
                echo "<tr><td colspan='5' class='text-center'>เกิดข้อผิดพลาด: " . htmlspecialchars($e->getMessage()) . "</td></tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>





    <!--ปิดเนื้อหา-->

    </section>
    <!-- /.content -->
  </div>
<!-- /.content-wrapper -->
  
  <?php include('footer.php');?>

  
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

	<?php include('import_script.php');?>
</body>
</html>

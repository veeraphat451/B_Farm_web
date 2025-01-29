<?php
session_start();
include('config/condb.php'); // เรียกไฟล์เชื่อมต่อฐานข้อมูล
?>
<!DOCTYPE html>
<html lang="th">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>หน้าคู่มือการใช้งาน</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php include('import_style.php'); ?>
  <link href="https://fonts.googleapis.com/css?family=Kanit:100,200,300&amp;subset=thai" rel="stylesheet">

  <style>
    body {
      font-family: 'Kanit', sans-serif;
    }

    .content-header h1 {
      font-weight: bold;
      font-size: 24px;
      margin-bottom: 20px;
      text-align: center;
      color: #007bff;
    }

    .table th,
    .table td {
      text-align: center;
      vertical-align: middle;
    }

    .btn {
      border-radius: 8px;
    }

    .btn-success {
      background-color: #28a745;
      border-color: #28a745;
    }

    .btn-success:hover {
      background-color: #218838;
    }

    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
    }

    .btn-primary:hover {
      background-color: #0056b3;
    }

    .btn-warning {
      background-color: #ffc107;
      border-color: #ffc107;
    }

    .btn-warning:hover {
      background-color: #e0a800;
    }

    .btn-danger {
      background-color: #dc3545;
      border-color: #dc3545;
    }

    .btn-danger:hover {
      background-color: #c82333;
    }

    .box-header {
      background-color: #28a745;
      color: white;
      padding: 10px;
      border-radius: 8px;
      text-align: center;
      font-size: 18px;
      font-weight: bold;
    }

    .table-bordered {
      border: 1px solid #ddd;
      border-radius: 8px;
      overflow: hidden;
    }
  </style>
</head>

<body class="hold-transition skin-green sidebar-mini">
  <div class="wrapper">

    <?php include('header.php'); ?>
    <?php include('menu_left.php'); ?>

    <div class="content-wrapper">
      <section class="content-header">
        <h1>ระบบจัดการคู่มือการใช้งาน</h1>
      </section>

      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="box">
              <div class="box-header">
                รายการคู่มือการใช้งาน
              </div>
              <div class="box-body">
                <!-- ปุ่มเพิ่มข้อมูล -->
                <div class="text-right mb-3">
                  <a href="add_manual.php" class="btn btn-success"><i class="fa fa-plus"></i> เพิ่มคู่มือการใช้งาน</a>
                </div>

                <!-- ตารางแสดงข้อมูล -->
                <table class="table table-bordered table-hover">
                  <thead class="bg-light">
                    <tr>
                      <th>ลำดับ</th>
                      <th>ชื่อคู่มือ</th>
                      <th>วันที่ลง</th>
                      <th>ขนาดไฟล์</th>
                      <th>ไฟล์คู่มือ</th>
                      <th>หมายเหตุ</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    try {
                      $sql = "SELECT * FROM manuals ORDER BY id DESC";
                      $stmt = $conn->query($sql);
                      $i = 1;

                      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <tr>
                          <td><?php echo $i++; ?></td>
                          <td><?php echo htmlspecialchars($row['name']); ?></td>
                          <td><?php echo date('d/m/Y', strtotime($row['upload_date'])); ?></td>
                          <td><?php echo number_format($row['file_size'], 0); ?> KB</td>
                          <td>
                          <a href="download_manual.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">ดาวน์โหลด</a>
                          </td>
                          <td>
                            <a href="edit_manual.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> แก้ไข</a>
                            <a href="delete_manual.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('คุณต้องการลบข้อมูลนี้ใช่หรือไม่?');"><i class="fa fa-trash"></i> ลบ</a>
                          </td>
                        </tr>
                    <?php
                      }
                    } catch (PDOException $e) {
                      echo "<tr><td colspan='6' class='text-center'>เกิดข้อผิดพลาด: " . htmlspecialchars($e->getMessage()) . "</td></tr>";
                    }
                    ?>
                  </tbody>
                </table>
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

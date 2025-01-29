<?php session_start();
include('config/condb.php'); // ใช้ตัวแปร $conn
?>
<!DOCTYPE html>
<html lang="th">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ระบบจัดการคลังข้อมูลผู้ใช้งาน B-Farm</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php include('import_style.php'); ?>
  <link href="https://fonts.googleapis.com/css?family=Kanit:100,200,300&amp;subset=thai" rel="stylesheet">

  <style>
    body {
      font-family: 'Kanit', sans-serif;
    }

    .box-header {
      background-color: #007bff;
      color: white;
      padding: 10px;
      text-align: center;
      border-radius: 8px;
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

    .table-bordered {
      border: 1px solid #ddd;
      border-radius: 8px;
      overflow: hidden;
    }

    .table th,
    .table td {
      text-align: center;
      vertical-align: middle;
    }
  </style>
</head>

<body class="hold-transition skin-green sidebar-mini">
  <div class="wrapper">

    <?php include('header.php'); ?>
    <?php include('menu_left.php'); ?>

    <div class="content-wrapper">
      <!-- Content Header -->
      <section class="content-header">
        <h1 class="text-center">ระบบจัดการไฟล์ดาวน์โหลด</h1>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">รายการไฟล์ดาวน์โหลด</h3>
                <a href="add_download_form.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> เพิ่มไฟล์ดาวน์โหลด</a>
              </div>
              <div class="box-body">
                <table class="table table-bordered table-hover">
                  <thead class="bg-light">
                    <tr>
                      <th>ลำดับ</th>
                      <th>ชื่อไฟล์ดาวน์โหลด</th>
                      <th>เวอร์ชัน</th>
                      <th>ไฟล์ดาวน์โหลด</th>
                      <th>หมายเหตุ</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    try {
                      $query = "SELECT id, title, version, file_name FROM download ORDER BY id DESC";
                      $result = $conn->query($query);
                      $downloads = $result->fetchAll(PDO::FETCH_ASSOC);
                      if ($downloads) {
                        foreach ($downloads as $index => $download) {
                          echo "<tr>
                                  <td>" . ($index + 1) . "</td>
                                  <td>" . htmlspecialchars($download['title']) . "</td>
                                  <td>" . htmlspecialchars($download['version']) . "</td>
                                  <td>
                                    <a href='download_file.php?id=" . $download['id'] . "' class='btn btn-primary btn-sm' download><i class='fa fa-download'></i> ดาวน์โหลด</a>
                                  </td>
                                  <td>
                                    <a href='edit_download.php?id=" . $download['id'] . "' class='btn btn-warning btn-sm'><i class='fa fa-edit'></i> แก้ไข</a>
                                    <a href='delete_download.php?id=" . $download['id'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"คุณต้องการลบข้อมูลนี้หรือไม่?\")'><i class='fa fa-trash'></i> ลบ</a>
                                  </td>
                                </tr>";
                        }
                      } else {
                        echo "<tr><td colspan='5' class='text-center'>ไม่มีข้อมูลดาวน์โหลด</td></tr>";
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
      </section>
    </div>

    <?php include('footer.php'); ?>
    <div class="control-sidebar-bg"></div>
  </div>

  <?php include('import_script.php'); ?>
</body>

</html>

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
      background-color:rgb(181, 105, 19);
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
        <h1>ระบบจัดการข้อมูลผู้ใช้งาน</h1>
      </section>

      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="box">
              <div class="box-header">
                รายการข้อมูลผู้ใช้งาน B-Farm
              </div>
              <div class="box-body">
                <!-- ปุ่มเพิ่มข้อมูล -->
                <div class="text-right mb-3">
                  <a href="add_manual.php" class="btn btn-success"><i class="fa fa-plus"></i> เพิ่มผู้ใช้งาน</a>
                </div>

                <!-- ตารางแสดงข้อมูล -->
                <table class="table table-bordered table-hover">
                  <thead class="bg-light">
                    <tr>
                      <th>ลำดับ</th>
                      <th>ชื่อ</th>
                      <th>นามสกุล</th>
                      <th>Email</th>
                      <th>วันที่สมัคร</th>
                      <th>หมายเลขโทรศัพท์</th>
                      <th>วัตถุประสงค์</th>
                      <th>Token</th>
                      <th>การจัดการ</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    try {
                      $sql = "SELECT id, first_name, last_name, email, created_at, tel, object, token FROM users ORDER BY id DESC";
                      $stmt = $conn->query($sql);
                      $i = 1;

                      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <tr>
                          <td><?php echo $i++; ?></td>
                          <td><?php echo htmlspecialchars($row['first_name']); ?></td>
                          <td><?php echo htmlspecialchars($row['last_name']); ?></td>
                          <td><?php echo htmlspecialchars($row['email']); ?></td>
                          <td><?php echo date('d/m/Y', strtotime($row['created_at'])); ?></td>
                          <td><?php echo htmlspecialchars($row['tel']); ?></td>
                          <td><?php echo htmlspecialchars($row['object']); ?></td>
                          <td><?php echo htmlspecialchars($row['token']); ?></td>
                          <td>
                            <a href="edit_user.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> แก้ไข</a>
                            <a href="delete_user.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('คุณต้องการลบข้อมูลนี้ใช่หรือไม่?');"><i class="fa fa-trash"></i> ลบ</a>
                          </td>
                        </tr>
                    <?php
                      }
                    } catch (PDOException $e) {
                      echo "<tr><td colspan='9' class='text-center'>เกิดข้อผิดพลาด: " . htmlspecialchars($e->getMessage()) . "</td></tr>";
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

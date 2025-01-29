<?php
session_start();
include('config/condb.php'); // เรียกไฟล์เชื่อมต่อฐานข้อมูล
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>หน้าคู่มือการใช้งาน</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php include('import_style.php'); ?>
  <link href="https://fonts.googleapis.com/css?family=Kanit:100,200,300&amp;subset=thai" rel="stylesheet">
</head>

<body class="hold-transition skin-green sidebar-mini">
  <div class="wrapper">

    <?php include('header.php'); ?>
    <?php include('menu_left.php'); ?>

    <div class="content-wrapper">
      <section class="content-header">
        <h1>หน้าคู่มือการใช้งาน</h1>
      </section>

      <section class="content">
        <!-- ปุ่มเพิ่มข้อมูล -->
        <a href="add_manual.php" class="btn btn-success mb-3">เพิ่มคู่มือการใช้งาน</a>

        <!-- ตารางแสดงข้อมูล -->
        <table class="table table-bordered">
          <thead>
            <tr class="text-center">
              <th>#</th>
              <th>ชื่อคู่มือ</th>
              <th>วันที่ลง</th>
              <th>ขนาดไฟล์</th>
              <th>ดาวน์โหลด</th>
              <th>จัดการ</th>
            </tr>
          </thead>
          <tbody>
            <?php
            try {
                $sql = "SELECT * FROM manuals";
                $stmt = $pdo->query($sql); // ใช้ $pdo แทน $conn
                $i = 1;

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
                  <tr>
                    <td class="text-center"><?php echo $i++; ?></td>
                    <td><?php echo htmlspecialchars($row['manual_name']); ?></td>
                    <td class="text-center"><?php echo date('d/m/Y', strtotime($row['upload_date'])); ?></td>
                    <td class="text-center"><?php echo htmlspecialchars($row['file_size']); ?> KB</td>
                    <td class="text-center">
                      <a href="uploads/<?php echo htmlspecialchars($row['file_path']); ?>" class="btn btn-primary btn-sm" download>ดาวน์โหลด</a>
                    </td>
                    <td class="text-center">
                      <a href="edit_manual.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">แก้ไข</a>
                      <a href="delete_manual.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('คุณต้องการลบข้อมูลนี้ใช่หรือไม่?');">ลบ</a>
                    </td>
                  </tr>
            <?php
                }
            } catch (PDOException $e) {
                echo "<tr><td colspan='6' class='text-center'>เกิดข้อผิดพลาด: " . $e->getMessage() . "</td></tr>";
            }
            ?>
          </tbody>
        </table>
      </section>
    </div>

    <?php include('footer.php'); ?>
    <div class="control-sidebar-bg"></div>
  </div>

  <?php include('import_script.php'); ?>
</body>

</html>

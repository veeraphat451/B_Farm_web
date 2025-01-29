<?php 
session_start();
include('config/condb.php'); // ใช้การเชื่อมต่อ $db จาก pg_connect

// รับค่า id จาก URL
$id = $_GET['id'];

// ดึงข้อมูลข่าวสารที่ต้องการแก้ไข
$query = "SELECT * FROM news WHERE id = $1";
$result = pg_query_params($db, $query, [$id]);

if (!$result) {
    echo "เกิดข้อผิดพลาดในการดึงข้อมูล: " . pg_last_error($db);
    exit;
}

$news = pg_fetch_assoc($result);

if (!$news) {
    echo "ไม่พบข่าวสารที่ต้องการแก้ไข";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>แก้ไขข่าวสาร | ระบบจัดการคลังข้อมูลงานวิจัย</title>
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
              <h3 class="box-title">แก้ไขข่าวสาร</h3>
            </div>
            <div class="box-body">
              <form action="update_news.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $news['id']; ?>">
                <div class="form-group">
                  <label for="title">หัวข้อข่าวสาร</label>
                  <input type="text" name="title" id="title" class="form-control" value="<?php echo htmlspecialchars($news['title']); ?>" required>
                </div>
                <div class="form-group">
                  <label for="content">เนื้อหาข่าวสาร</label>
                  <textarea name="content" id="content" class="form-control" rows="6" required><?php echo htmlspecialchars($news['content']); ?></textarea>
                </div>
                <div class="form-group">
                  <label for="image">เลือกรูปภาพ (ไม่จำเป็น)</label>
                  <input type="file" name="image" id="image" class="form-control" accept="image/*">
                  <?php if (!empty($news['image_path'])): ?>
                    <p>ภาพปัจจุบัน: <img src="uploads/<?php echo htmlspecialchars($news['image_path']); ?>" alt="Current Image" style="width: 100px; height: auto;"></p>
                  <?php endif; ?>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-warning btn-block">อัปเดตข่าวสาร</button>
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

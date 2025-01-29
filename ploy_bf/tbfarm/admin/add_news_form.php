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

  <!-- เพิ่ม jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
              <h3 class="box-title">เพิ่มข่าวสาร</h3>
            </div>
            <div class="box-body">
              <form id="reportForm" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="title">หัวข้อข่าวสาร</label>
                  <input type="text" name="title" id="title" class="form-control" placeholder="กรุณากรอกหัวข้อข่าวสาร" required>
                </div>
                <div class="form-group">
                  <label for="content">เนื้อหาข่าวสาร</label>
                  <textarea name="content" id="content" class="form-control" rows="6" placeholder="กรุณากรอกเนื้อหาข่าวสาร" required></textarea>
                </div>
                <div class="form-group">
                  <label for="image">เลือกรูปภาพ</label>
                  <input type="file" name="image" id="image" class="form-control" accept="image/*">
                </div>
                <div class="form-group">
                  <button type="submit" id="submitReport" class="btn btn-success btn-block">บันทึกข่าวสาร</button>
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

<script>
  // Function to submit the report using AJAX
  $(document).ready(function() {
    $('#submitReport').click(function(e) {
      e.preventDefault(); // Prevent form submission
      
      // Declare variables to store form values
      var titleInput = $('#title').val();
      var contentInput = $('#content').val();
      var imageInput = $('#image')[0].files[0];

      // Create FormData object to send form data via AJAX
      var formData = new FormData();
      formData.append('title', titleInput);
      formData.append('content', contentInput);

      if (imageInput) {
        formData.append('image', imageInput);
      }

      // Send the form data using AJAX
      $.ajax({
        url: 'save_news.php',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
          console.log(response);
          alert('ส่งข้อมูลสำเร็จ');
        },
        error: function(xhr, status, error) {
          console.error('Error sending data:', error);
          alert('เกิดข้อผิดพลาดในการส่งข้อมูล');
        }
      });
    });
  });
</script>

</body>
</html>

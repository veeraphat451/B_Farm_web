<?php
session_start();
include('config/condb.php'); // Ensure you have a database connection setup here

// Fetch the news item based on the ID from the GET request
$news_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($news_id > 0) {
    $query = "SELECT id, title, content, image_path, created_at FROM news WHERE id = $news_id";
    $result = pg_query($db, $query);

    if (!$result) {
        die("Error with query: " . pg_last_error($db));
    }

    $news = pg_fetch_assoc($result);
    if (!$news) {
        die("No news found with ID " . htmlspecialchars($news_id));
    }
} else {
    die("Invalid news ID.");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View News Details</title>
    <link href="https://fonts.googleapis.com/css?family=Kanit:100,200,300&amp;subset=thai" rel="stylesheet">
    <?php include('import_style.php'); ?>
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
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo htmlspecialchars($news['title']); ?></h3>
                </div>
                <div class="box-body">
                    <p><?php echo nl2br(htmlspecialchars($news['content'])); ?></p>
                    <?php
                    // if (!empty($news['image_path']) && file_exists($news['image_path'])) {
                    //     echo "<img src='" . htmlspecialchars($news['image_path']) . "' alt='News Image' style='width: 100%; max-width: 600px; height: auto; display: block; margin: 0 auto;'>";
                    // } else {
                    //     echo "<p>No image available.</p>";
                    // }

                    // ดึงจากฐานข้อมูล ปรับขนาด
                    if (!empty($news['image_path'])){
                        echo "<img src='" . htmlspecialchars($news['image_path']) . "' alt='News Image' style='width: 100%; max-width: 600px; height: auto; display: block; margin: 0 auto;'style='width: 100%; max-width: 600px; height: auto; display: block; margin: 0 auto;'>";
                    } else {
                        echo "ไม่มีภาพ";
                    } 
                    ?>
                </div>
                <div class="box-footer">
                    <a href="news_dashboard.php" class="btn btn-primary">Back to News List</a>
                </div>
            </div>
        </section>
    </div>

    <?php include('footer.php'); ?>
</div>
<?php include('import_script.php'); ?>
</body>
</html>

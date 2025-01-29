<?php
include 'controller/db_connect.php'; // Ensure this file now returns a PDO instance

// Fetch news from the database using PDO
$sql = "SELECT id, title, content, image_path, created_at FROM news ORDER BY created_at DESC";
$stmt = $conn->prepare($sql);
$stmt->execute();

$newsPosts = [];
if ($stmt->rowCount() > 0) {
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $newsPosts[] = $row;
    }
} else {
    echo "0 results";
}
$conn = null; // Proper way to close a PDO connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home B-Farm</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/news.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">

</head>
<body>
    <!-- Include Navbar -->
    <?php
        $navbar_path = __DIR__ . '/includes/navbar.php';
        include $navbar_path; // Assuming this will exist as per your project structure
    ?>
    
    <div class="news-header">
        <h1>ข่าวสาร</h1>
    </div>
    
    <div class="news-container">
        <!-- Featured News -->
        <?php if (!empty($newsPosts)): ?>
            <div class="featured-news">
                <img src="<?= htmlspecialchars($newsPosts[0]['image_path']) ?>" alt="<?= htmlspecialchars($newsPosts[0]['title']) ?>">
                <h3><?= htmlspecialchars($newsPosts[0]['title']) ?></h3>
                <p><?= date('D M d Y', strtotime($newsPosts[0]['created_at'])) ?></p>
                <a href="read_news.php?id=<?= $newsPosts[0]['id'] ?>" class="read-more">อ่านเพิ่มเติม...</a>
            </div>

            <!-- Other News -->
            <div class="grid-news">
                <?php for ($i = 1; $i < count($newsPosts); $i++): ?>
                    <div class="news-item">
                        <img src="<?= htmlspecialchars($newsPosts[$i]['image_path']) ?>" alt="<?= htmlspecialchars($newsPosts[$i]['title']) ?>">
                        <div class="news-content">
                            <h4><?= htmlspecialchars($newsPosts[$i]['title']) ?></h4>
                            <p><?= date('D M d Y', strtotime($newsPosts[$i]['created_at'])) ?></p>
                            <a href="read_news.php?id=<?= $newsPosts[$i]['id'] ?>" class="read-more">อ่านเพิ่มเติม...</a>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- Include Footer -->
    <?php
        $footer_path = __DIR__ . '/includes/footer.php';
        include $footer_path; // Again, assuming file existence as per your setup
    ?>

    <script src="assets/js/script.js"></script> <!-- External JS -->
</body>
</html>
<?php
// Start session if required
// session_start();
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
    <link rel="stylesheet" href="assets/css/manual.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">

</head>
<body>
    <!-- Include Navbar -->
    <?php
        $navbar_path = __DIR__ . '/includes/navbar.php';
        if (file_exists($navbar_path)) {
            include $navbar_path;
        } else {
            echo '<p style="color:red;">Error: Navbar file not found!</p>';
        }
    ?>

    <div class="manual-container">
        <h1>ดาวน์โหลดคู่มือการใช้งาน B-Farm</h1>
        <?php
            $manuals = [
                ['title' => 'HandySense board manual - PBRS', 'date' => '29 March 2021', 'size' => '3.066 MB', 'file' => 'handysense_board_manual.pdf'],
                ['title' => 'HandySense Web Application Manual-PBRS', 'date' => '25 June 2021', 'size' => '2.459 MB', 'file' => 'handysense_web_manual.pdf'],
                // ['title' => 'คู่มือการตรวจวัดแตกต่างด้วยสารสนเทศเรื่องประมง', 'date' => '5 November 2022', 'size' => '9.083 MB', 'file' => 'fishing_info_systems.pdf'],
                // ['title' => 'ยกระดับเกษตรไทยสู่เกษตรอัจฉริยะ-Smart-Farming', 'date' => '12 March 2021', 'size' => '770.561 KB', 'file' => 'smart_farming_manual.pdf']
            ];

            foreach ($manuals as $manual) {
                echo "<div class='manual-entry'>";
                echo "<div class='manual-info'>";
                echo "<h2>{$manual['title']}</h2>";
                echo "<p>วันที่อัปเดต: {$manual['date']} | ขนาดไฟล์: {$manual['size']}</p>";
                echo "</div>";
                echo "<a href='assets/manuals/{$manual['file']}' class='download-button'>Download</a>";
                echo "</div>";
            }
        ?>
    </div>

    <!-- Include Footer -->
    <?php
        $footer_path = __DIR__ . '/includes/footer.php';
        if (file_exists($footer_path)) {
            include $footer_path;
        } else {
            echo '<p style="color:red;">Error: Footer file not found!</p>';
        }
    ?>

    <script src="assets/js/script.js"></script> <!-- External JS -->

</body>
</html>
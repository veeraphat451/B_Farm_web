<?php
include 'config/condb.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $news_title = $_POST['news_title'];
    $news_content = $_POST['news_content'];

    // การอัปโหลดไฟล์รูปภาพ
    $targetDir = "uploads/";
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true); // สร้างโฟลเดอร์ถ้ายังไม่มี
    }
    $imagePath = basename($_FILES['news_image']['name']);
    $targetFile = $targetDir . $imagePath;

    if (move_uploaded_file($_FILES['news_image']['tmp_name'], $targetFile)) {
        // อัปโหลดสำเร็จ
        $imageUrl = $targetFile;

        // บันทึกข้อมูลข่าวสารลงฐานข้อมูล
        $stmt = $pdo->prepare("INSERT INTO news (title, content, image_path) VALUES (?, ?, ?)");
        $stmt->execute([$news_title, $news_content, $imageUrl]);

        echo "<script>
                alert('เพิ่มข่าวสารสำเร็จ');
                window.location.href = 'news_dashboard.php';
              </script>";
    } else {
        die("ไม่สามารถอัปโหลดรูปภาพได้");
    }
}
?>

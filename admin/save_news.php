<?php
session_start();
include('config/condb.php'); // ใช้ตัวแปร $pdo ในไฟล์นี้

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $imagePath = null;

    // ตรวจสอบและอัปโหลดรูปภาพ
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/news/';
        $uploadFile = $uploadDir . basename($_FILES['image']['name']);

        // สร้างโฟลเดอร์ถ้ายังไม่มี
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
            $imagePath = $uploadFile;
        } else {
            die("เกิดข้อผิดพลาดในการอัปโหลดรูปภาพ");
        }
    }

    try {
        // ใช้ $pdo แทน $conn ในการบันทึกข้อมูล
        $sql = "INSERT INTO news (title, content, image_path, created_at) VALUES (:title, :content, :image_path, NOW())";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':image_path', $imagePath);

        if ($stmt->execute()) {
            $_SESSION['success'] = "เพิ่มข่าวสารสำเร็จ";
            header("Location: news_dashboard.php");
            exit();
        } else {
            $_SESSION['error'] = "เกิดข้อผิดพลาดในการเพิ่มข่าวสาร";
            header("Location: add_news.php");
            exit();
        }
    } catch (PDOException $e) {
        die("เกิดข้อผิดพลาด: " . $e->getMessage());
    }
} else {
    die("คำขอไม่ถูกต้อง");
}

<?php
session_start();
include('config/condb.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $manual_name = $_POST['manual_name'];
    $uploadDir = 'uploads/';
    $filePath = $uploadDir . basename($_FILES['file']['name']);

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    if (move_uploaded_file($_FILES['file']['tmp_name'], $filePath)) {
        try {
            $fileSize = round(filesize($filePath) / 1024); // ขนาดไฟล์ใน KB
            $uploadDate = date('Y-m-d');

            $sql = "INSERT INTO manuals (manual_name, upload_date, file_size, file_path) VALUES (:manual_name, :upload_date, :file_size, :file_path)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':manual_name', $manual_name);
            $stmt->bindParam(':upload_date', $uploadDate);
            $stmt->bindParam(':file_size', $fileSize);
            $stmt->bindParam(':file_path', $filePath);

            if ($stmt->execute()) {
                $_SESSION['success'] = "เพิ่มคู่มือสำเร็จ";
                header("Location: manual.php");
                exit();
            }
        } catch (PDOException $e) {
            die("เกิดข้อผิดพลาด: " . $e->getMessage());
        }
    } else {
        die("เกิดข้อผิดพลาดในการอัปโหลดไฟล์");
    }
} else {
    die("คำขอไม่ถูกต้อง");
}
?>

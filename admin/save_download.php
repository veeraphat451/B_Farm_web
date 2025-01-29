<?php
session_start();
include('config/condb.php'); // ใช้ตัวแปร $pdo ในไฟล์นี้

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = isset($_POST['title']) ? trim($_POST['title']) : null;
    $version = isset($_POST['version']) ? trim($_POST['version']) : null;

    // ตรวจสอบว่าข้อมูลในฟอร์มถูกส่งมาครบถ้วน
    if (empty($title)) {
        die("เกิดข้อผิดพลาด: กรุณากรอกหัวข้อไฟล์ดาวน์โหลด");
    }

    if (empty($version)) {
        die("เกิดข้อผิดพลาด: กรุณากรอกเวอร์ชันไฟล์");
    }

    // ตรวจสอบการอัปโหลดไฟล์
    if (!isset($_FILES['file']) || $_FILES['file']['error'] !== UPLOAD_ERR_OK) {
        die("เกิดข้อผิดพลาด: กรุณาอัปโหลดไฟล์");
    }

    // จัดการอัปโหลดไฟล์
    $uploadDir = 'uploads/files/';
    $fileName = basename($_FILES['file']['name']);
    $uploadFile = $uploadDir . $fileName;

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile)) {
        $filePath = $uploadFile;
    } else {
        die("เกิดข้อผิดพลาดในการอัปโหลดไฟล์");
    }

    // บันทึกข้อมูลลงฐานข้อมูล
    try {
        $sql = "INSERT INTO download (title, version, file) VALUES (:title, :version, :file)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':version', $version);
        $stmt->bindParam(':file', $filePath);

        if ($stmt->execute()) {
            $_SESSION['success'] = "เพิ่มไฟล์ดาวน์โหลดสำเร็จ";
            header("Location: download_dashboard.php");
            exit();
        } else {
            die("เกิดข้อผิดพลาดในการบันทึกข้อมูล");
        }
    } catch (PDOException $e) {
        die("เกิดข้อผิดพลาด: " . $e->getMessage());
    }
}



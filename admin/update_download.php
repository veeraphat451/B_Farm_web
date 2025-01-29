<?php
session_start();
include('config/condb.php'); // ใช้ตัวแปร $conn ในการเชื่อมต่อฐานข้อมูล

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $version = $_POST['version'];

    // ตรวจสอบการอัปโหลดไฟล์
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/download';
        $fileName = basename($_FILES['file']['name']);
        $filePath = $uploadDir . $fileName;

        // ตรวจสอบนามสกุลไฟล์ว่าเป็น .zip หรือไม่
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        if ($fileExtension !== 'zip') {
            $_SESSION['error'] = "รองรับเฉพาะไฟล์ .zip เท่านั้น!";
            header("Location: edit_download.php?id=$id");
            exit();
        }

        // สร้างโฟลเดอร์ถ้ายังไม่มี
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // อัปโหลดไฟล์
        if (!move_uploaded_file($_FILES['file']['tmp_name'], $filePath)) {
            $_SESSION['error'] = "เกิดข้อผิดพลาดในการอัปโหลดไฟล์";
            header("Location: edit_download.php?id=$id");
            exit();
        }

        // อัปเดตข้อมูลพร้อมไฟล์ใหม่
        $sql = "UPDATE download SET title = :title, version = :version, file_name = :file_name WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':version', $version);
        $stmt->bindParam(':file_name', $fileName);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    } else {
        // อัปเดตเฉพาะข้อมูลอื่น ๆ โดยไม่เปลี่ยนไฟล์
        $sql = "UPDATE download SET title = :title, version = :version WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':version', $version);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    }

    // ดำเนินการอัปเดต
    if ($stmt->execute()) {
        $_SESSION['success'] = "แก้ไขข้อมูลสำเร็จ";
        header("Location: download_dashboard.php");
        exit();
    } else {
        $_SESSION['error'] = "เกิดข้อผิดพลาดในการอัปเดตข้อมูล";
        header("Location: edit_download.php?id=$id");
        exit();
    }
} else {
    die("คำขอไม่ถูกต้อง");
}

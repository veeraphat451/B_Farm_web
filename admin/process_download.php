<?php
session_start();
include('config/condb.php'); // เชื่อมต่อฐานข้อมูล

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $version = $_POST['version'];
    $file = $_FILES['file'];

    // ตรวจสอบชนิดไฟล์
    $allowedExtensions = ['zip'];
    $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

    if (!in_array($fileExtension, $allowedExtensions)) {
        $_SESSION['error'] = "รองรับเฉพาะไฟล์ .zip เท่านั้น!";
        header("Location: add_download_form.php?error=file_type");
        exit;
    }

    // อ่านไฟล์ในรูปแบบไบนารี
    $fileData = file_get_contents($file['tmp_name']);
    $fileName = $file['name'];

    try {
        // เก็บข้อมูลลงในฐานข้อมูล
        $sql = "INSERT INTO download (title, version, file_name, file_data) VALUES (:title, :version, :file_name, :file_data)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            'title' => $title,
            'version' => $version,
            'file_name' => $fileName,
            'file_data' => $fileData
        ]);

        $_SESSION['success'] = "เพิ่มไฟล์ดาวน์โหลดสำเร็จ!";
        header("Location: add_download_form.php?success=1");
        exit;
    } catch (PDOException $e) {
        $_SESSION['error'] = "เกิดข้อผิดพลาดในการบันทึกข้อมูล";
        header("Location: add_download_form.php?error=database");
        exit;
    }
} else {
    $_SESSION['error'] = "คำขอไม่ถูกต้อง";
    header("Location: add_download_form.php?error=invalid_request");
    exit;
}
?>

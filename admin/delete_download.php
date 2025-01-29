<?php
session_start();
include('config/condb.php'); // ใช้ตัวแปร $conn (PDO)

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        // ตรวจสอบว่ามีข้อมูลในฐานข้อมูลก่อนลบ
        $checkSql = "SELECT file_data FROM download WHERE id = :id";
        $stmt = $conn->prepare($checkSql); // ใช้ PDO
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $download = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($download) {
            // ลบไฟล์ในโฟลเดอร์ (ถ้ามี)
            $filePath = 'uploads/download' . $download['file'];
            if (!empty($download['file']) && file_exists($filePath)) {
                unlink($filePath); // ลบไฟล์
            }

            // ลบข้อมูลในฐานข้อมูล
            $deleteSql = "DELETE FROM download WHERE id = :id";
            $deleteStmt = $conn->prepare($deleteSql);
            $deleteStmt->bindParam(':id', $id, PDO::PARAM_INT);

            if ($deleteStmt->execute()) {
                $_SESSION['success'] = "ลบข้อมูลสำเร็จ";
                header("Location: download_dashboard.php");
                exit();
            } else {
                $_SESSION['error'] = "เกิดข้อผิดพลาดในการลบข้อมูล";
                header("Location: download_dashboard.php");
                exit();
            }
        } else {
            $_SESSION['error'] = "ไม่พบข้อมูลที่ต้องการลบ";
            header("Location: download_dashboard.php");
            exit();
        }
    } catch (PDOException $e) {
        $_SESSION['error'] = "เกิดข้อผิดพลาด: " . $e->getMessage();
        header("Location: download_dashboard.php");
        exit();
    }
} else {
    $_SESSION['error'] = "คำขอไม่ถูกต้อง";
    header("Location: download_dashboard.php");
    exit();
}
?>

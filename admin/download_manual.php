<?php
include('config/condb.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $sql = "SELECT name, file_data FROM manuals WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $manual = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($manual) {
            header('Content-Type: application/pdf');
            header('Content-Disposition: attachment; filename="' . $manual['name'] . '.pdf"');
            echo $manual['file_data'];
            exit;
        } else {
            echo "ไม่พบไฟล์ที่ต้องการดาวน์โหลด";
        }
    } catch (PDOException $e) {
        echo "เกิดข้อผิดพลาด: " . $e->getMessage();
    }
} else {
    echo "คำขอไม่ถูกต้อง";
}
?>

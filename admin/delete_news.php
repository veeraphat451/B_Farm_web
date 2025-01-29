<?php
include 'config/condb.php';

$id = $_GET['id'];

// ลบข้อมูลข่าวสาร
$stmt = $pdo->prepare("DELETE FROM news WHERE id = :id");
$stmt->execute([':id' => $id]);

header("Location: news_dashboard.php");
?>

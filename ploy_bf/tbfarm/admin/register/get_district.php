<?php
// เชื่อมต่อฐานข้อมูล
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "b_farm";
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// รับ amphure_id จากพารามิเตอร์ GET
$amphure_id = $_GET['amphure_id'];

// ดึงข้อมูลตำบล
$sql = "SELECT id, name_th AS district_name FROM districts WHERE amphure_id = :amphure_id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':amphure_id', $amphure_id);
$stmt->execute();
$districts = $stmt->fetchAll(PDO::FETCH_ASSOC);

// ส่งข้อมูลเป็น JSON
echo json_encode($districts);
?>

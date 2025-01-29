<?php
// ตั้งค่า header ให้แสดงผลเป็น UTF-8
header('Content-Type: text/html; charset=UTF-8');

// ตั้งค่า Meta tag สำหรับการเข้ารหัสในส่วนหัวของ HTML
echo '<meta charset="UTF-8">';

// เชื่อมต่อฐานข้อมูล postgres
$hostname_db = "localhost";
$database_db = "b_farm";
$username_db = "postgres";  // เปลี่ยนจาก root เป็น postgres
$password_db = "postgres";  // ใส่รหัสผ่านที่ถูกต้องของผู้ใช้ postgres
$port_db = "5432";

// Connect to PostgreSQL database using pg_connect
$db = pg_connect("host=$hostname_db port=$port_db dbname=$database_db user=$username_db password=$password_db");

if (!$db) {
    die("เกิดข้อผิดพลาดในการเชื่อมต่อฐานข้อมูล: " . pg_last_error());
}

// ตั้งค่าการเข้ารหัส
pg_set_client_encoding($db, 'UTF8');

// รับค่าจากฟอร์ม
$title = $_POST['title'] ?? null;
$content = $_POST['content'] ?? null;

// ตรวจสอบว่าข้อมูลที่จำเป็นถูกส่งมาหรือไม่
if (!$title || !$content) {
    die("ข้อมูลไม่ครบถ้วน");
}

// การจัดการภาพ
$image = $_FILES['image']['tmp_name'] ?? null;
$image_extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION) ?? null;

$imagePath = null;  // กำหนดตัวแปร $imagePath

if (isset($image) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
    $imageData = file_get_contents($image);
    if ($imageData === false) {
        die(json_encode(['status' => 'error', 'message' => 'Failed to read image file']));
    }
    $base64Image = base64_encode($imageData);
    $base64Image = 'data:image/' . $image_extension . ';base64,' . $base64Image;

    // เก็บข้อมูล Base64 ลงในตัวแปร imagePath
    $imagePath = $base64Image;
} else {
    die(json_encode(['status' => 'error', 'message' => 'Failed to upload image']));
}

// SQL สำหรับการบันทึกข้อมูลข่าวสารลงในฐานข้อมูล
$sql = "INSERT INTO news (title, content, image_path, created_at) 
        VALUES ($1, $2, $3, NOW())";

// Use parameterized queries to avoid SQL injection
$result = pg_query_params($db, $sql, [$title, $content, $imagePath]);

if ($result) {
    echo json_encode(['status' => 'success', 'message' => 'บันทึกข่าวสารสำเร็จ']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'ไม่สามารถบันทึกข่าวสารลงในฐานข้อมูลได้: ' . pg_last_error($db)]);
}

// ปิดการเชื่อมต่อฐานข้อมูล
pg_close($db);
?>

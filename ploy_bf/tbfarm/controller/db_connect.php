<?php
$hostname_db = "localhost";
$database_db = "b_farm";
$username_db = "postgres";  
$password_db = "postgres";  
$port_db = "5432";

try {
    // Connect to PostgreSQL database using pg_connect
    $db = pg_connect("host=$hostname_db port=$port_db dbname=$database_db user=$username_db password=$password_db");

    // ตรวจสอบว่าการเชื่อมต่อสำเร็จหรือไม่
    if (!$db) {
        throw new Exception("Connection to database failed: " . pg_last_error());
    } else {
        //echo "Connection successful!";
    }
} catch (Exception $e) {
    // แสดงข้อความข้อผิดพลาด
    echo 'Connection failed: ' . $e->getMessage();
}
?>

<?php
// เชื่อมต่อฐานข้อมูล
$host = "localhost";
$port = "5432";
$dbname = "b_farm";
$user = "postgres"; // เปลี่ยนเป็นชื่อผู้ใช้ของ PostgreSQL
$password = "postgres"; // ใส่รหัสผ่านของคุณ

try {
    $conn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// รับข้อมูลจากฟอร์ม
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$object = $_POST['object'] === 'อื่น ๆ' ? $_POST['other_object'] : $_POST['object'];
$province = $_POST['province'];
$amphure = $_POST['amphure'];
$district = $_POST['district'];

// ตรวจสอบว่าข้อมูลครบถ้วนหรือไม่
if (
    empty($first_name) || empty($last_name) || empty($email) || empty($tel) || 
    empty($object) || empty($province) || empty($amphure) || empty($district)
) {
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
          <script>
            window.onload = function() {
                Swal.fire({
                    icon: 'error',
                    title: 'ข้อมูลไม่ครบถ้วน',
                    text: 'กรุณากรอกข้อมูลให้ครบทุกช่องก่อนสมัครสมาชิก',
                }).then(function() {
                    window.history.back();
                });
            }
          </script>";
    exit();
}

// สุ่มตัวเลข 5 หลักสำหรับ token
$token = random_int(10000, 99999);

// เตรียมคำสั่ง SQL
try {
    $sql = "INSERT INTO users (first_name, last_name, email, tel, object, province_id, amphure_id, district_id, token) 
            VALUES (:first_name, :last_name, :email, :tel, :object, :province_id, :amphure_id, :district_id, :token)";
    $stmt = $conn->prepare($sql);

    // ผูกข้อมูลกับคำสั่ง SQL
    $stmt->bindParam(':first_name', $first_name);
    $stmt->bindParam(':last_name', $last_name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':tel', $tel);
    $stmt->bindParam(':object', $object);
    $stmt->bindParam(':province_id', $province, PDO::PARAM_INT);
    $stmt->bindParam(':amphure_id', $amphure, PDO::PARAM_INT);
    $stmt->bindParam(':district_id', $district, PDO::PARAM_INT);
    $stmt->bindParam(':token', $token, PDO::PARAM_INT);

    // ตรวจสอบว่าการบันทึกข้อมูลสำเร็จหรือไม่
    if ($stmt->execute()) {
        // ส่งข้อมูลไปยัง API
        $api_url = 'https://bfarm-api.vercel.app/token';
        $api_data = [
            'email' => $email,
            'token' => $token, // ส่ง token ไปยัง API ด้วย
        ];

        $response = sendToAPI($api_url, $api_data);

        if ($response['status'] === 'success') {
            echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                  <script>
                    window.onload = function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'สมัครสมาชิกสำเร็จ!',
                            text: 'ข้อมูลถูกส่งไปยัง API เรียบร้อยแล้ว',
                        }).then(function() {
                            window.location.href = 'download.php';
                        });
                    }
                  </script>";
        } else {
            echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script>
                window.onload = function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'สมัครสมาชิกสำเร็จ!',
                        text: 'ข้อมูลถูกส่งไปยัง API: เรียบร้อยแล้ว" . json_encode($response['message']) . "',
                    }).then(function() {
                        window.location.href = 'download.php';
                    });
                }
            </script>";

        }
    } else {
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
              <script>
                window.onload = function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'เกิดข้อผิดพลาด',
                        text: 'ไม่สามารถสมัครสมาชิกได้ โปรดลองอีกครั้ง',
                    }).then(function() {
                        window.history.back();
                    });
                }
              </script>";
    }
} catch (PDOException $e) {
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
          <script>
            window.onload = function() {
                Swal.fire({
                    icon: 'error',
                    title: 'เกิดข้อผิดพลาด',
                    text: '" . $e->getMessage() . "',
                }).then(function() {
                    window.history.back();
                });
            }
          </script>";
}


// ฟังก์ชันสำหรับส่งข้อมูลไปยัง API
function sendToAPI($url, $data)
{
    $ch = curl_init($url);

    // ตั้งค่า cURL
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Accept: application/json',
    ]);

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        return ['status' => 'error', 'message' => curl_error($ch)];
    }

    curl_close($ch);

    return json_decode($response, true);
}

// ปิดการเชื่อมต่อฐานข้อมูล
$conn = null;
?>
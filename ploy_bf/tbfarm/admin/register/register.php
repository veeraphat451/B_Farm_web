<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/css/bootstrap.min.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Custom CSS -->
    <!-- SweetAlert CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        /* การออกแบบและสไตล์ต่างๆ */
        body {
            background: linear-gradient(to right, #28a745, #218838);
            font-family: 'Arial', sans-serif;
        }

        .register-box {
            max-width: 850px;
            margin: 5% auto;
        }

        .card {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .card-header {
            background: #218838;
            color: #fff;
            text-align: center;
            padding: 20px;
            font-size: 24px;
            font-weight: bold;
        }

        .card-body {
            background: #f7f7f7;
            padding: 30px;
        }

        .form-control {
            border-radius: 10px;
        }

        .form-group label {
            font-weight: bold;
        }

        .btn-primary {
            background: #28a745;
            border: none;
            border-radius: 10px;
            padding: 10px 20px;
        }

        .btn-primary:hover {
            background: #218838;
        }

        .form-footer {
            text-align: center;
            margin-top: 20px;
        }

        .form-footer a {
            color: #28a745;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="register-box">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-user-plus"></i> สมัครสมาชิก
            </div>
            <div class="card-body">
                <form action="register_process.php" method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="first_name"><i class="fas fa-user"></i> ชื่อ</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="กรอกชื่อ">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="last_name"><i class="fas fa-user"></i> นามสกุล</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="กรอกนามสกุล">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email"><i class="fas fa-envelope"></i> อีเมล</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="กรอกอีเมล">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="password"><i class="fas fa-lock"></i> รหัสผ่าน</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="กรอกรหัสผ่าน">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="confirm_password"><i class="fas fa-lock"></i> ยืนยันรหัสผ่าน</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="ยืนยันรหัสผ่าน">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="province"><i class="fas fa-map-marker-alt"></i> จังหวัด</label>
                            <select class="form-control" id="province" name="province">
                                <option value="" disabled selected>เลือกจังหวัด</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="amphure"><i class="fas fa-map-marker-alt"></i> อำเภอ</label>
                            <select class="form-control" id="amphure" name="amphure">
                                <option value="" disabled selected>เลือกอำเภอ</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="district"><i class="fas fa-map-marker-alt"></i> ตำบล</label>
                            <select class="form-control" id="district" name="district">
                                <option value="" disabled selected>เลือกตำบล</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-paper-plane"></i> สมัคร</button>
                </form>
                <div class="form-footer">
                    <p class="mt-3">มีบัญชีอยู่แล้ว? <a href="login.php">เข้าสู่ระบบ</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/js/bootstrap.bundle.min.js"></script>

    <script>
        // ฟังก์ชันดึงข้อมูลจังหวัด
        $.ajax({
            url: 'get_province.php',
            method: 'GET',
            success: function(data) {
                var provinces = JSON.parse(data);
                var provinceSelect = $('#province');
                provinces.forEach(function(province) {
                    provinceSelect.append('<option value="' + province.id + '">' + province.name_th + '</option>');
                });
            }
        });

        // ฟังก์ชันดึงข้อมูลอำเภอเมื่อเลือกจังหวัด
        $('#province').change(function() {
            var province_id = $(this).val();
            $.ajax({
                url: 'get_amphure.php',
                method: 'GET',
                data: {
                    province_id: province_id
                },
                success: function(data) {
                    var amphures = JSON.parse(data);
                    var amphureSelect = $('#amphure');
                    amphureSelect.empty().append('<option value="" disabled selected>เลือกอำเภอ</option>');
                    amphures.forEach(function(amphure) {
                        amphureSelect.append('<option value="' + amphure.id + '">' + amphure.amphure_name + '</option>');
                    });
                }
            });
        });

        // ฟังก์ชันดึงข้อมูลตำบลเมื่อเลือกอำเภอ
        $('#amphure').change(function() {
            var amphure_id = $(this).val();
            $.ajax({
                url: 'get_district.php',
                method: 'GET',
                data: {
                    amphure_id: amphure_id
                },
                success: function(data) {
                    var districts = JSON.parse(data);
                    var districtSelect = $('#district');
                    districtSelect.empty().append('<option value="" disabled selected>เลือกตำบล</option>');
                    districts.forEach(function(district) {
                        districtSelect.append('<option value="' + district.id + '">' + district.district_name + '</option>');
                    });
                }
            });
        });
    </script>
</body>

</html>

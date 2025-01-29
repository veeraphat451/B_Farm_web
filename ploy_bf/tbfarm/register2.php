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
    <!-- SweetAlert CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body {
            background: linear-gradient(to bottom, #74ebd5, #acb6e5);
            font-family: 'Poppins', sans-serif;
            color: #333;
        }

        .register-box {
            max-width: 850px;
            margin: 5% auto;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .card-header {
            background: #007bff;
            color: #fff;
            text-align: center;
            padding: 20px;
            font-size: 24px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .card-body {
            padding: 30px;
        }

        .form-control {
            border-radius: 8px;
            border: 1px solid #ced4da;
            font-size: 16px;
        }

        .form-group label {
            font-weight: 600;
            font-size: 14px;
            color: #555;
        }

        .btn-primary {
            background: #007bff;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: 600;
            letter-spacing: 1px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: #0056b3;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .form-footer {
            text-align: center;
            margin-top: 20px;
        }

        .form-footer a {
            color: #007bff;
            font-weight: bold;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .form-footer a:hover {
            text-decoration: underline;
        }

        @media (max-width: 576px) {
            .card-body {
                padding: 20px;
            }

            .card-header {
                font-size: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="register-box">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-user-plus"></i> สมัครสมาชิก B-Farm
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
                            <label for="geographies"><i class="fas fa-map-marker-alt"></i> ภาค</label>
                            <select class="form-control" id="geographies" name="geographies">
                                <option value="" disabled selected>เลือกภาค</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="province"><i class="fas fa-map-marker-alt"></i> จังหวัด</label>
                            <select class="form-control" id="province" name="province">
                                <option value="" disabled selected>เลือกจังหวัด</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="amphure"><i class="fas fa-map-marker-alt"></i> อำเภอ</label>
                            <select class="form-control" id="amphure" name="amphure">
                                <option value="" disabled selected>เลือกอำเภอ</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
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
        // ดึงข้อมูลภาค
        $.ajax({
            url: 'get_regions.php',
            method: 'GET',
            success: function(data) {
                var geographies = JSON.parse(data);
                var geographiesSelect = $('#geographies');
                geographies.forEach(function(region) {
                    geographiesSelect.append('<option value="' + region.id + '">' + region.name + '</option>');
                });
            },
            error: function(xhr, status, error) {
                console.error('Error fetching regions:', error);
            }
        });

        // ดึงข้อมูลจังหวัดเมื่อเลือกภาค
        $('#geographies').change(function() {
            var geography_id = $(this).val();
            $.ajax({
                url: 'get_province.php',
                method: 'GET',
                data: { geography_id: geography_id },
                success: function(data) {
                    var provinces = JSON.parse(data);
                    var provinceSelect = $('#province');
                    provinceSelect.empty().append('<option value="" disabled selected>เลือกจังหวัด</option>');
                    provinces.forEach(function(province) {
                        provinceSelect.append('<option value="' + province.id + '">' + province.name_th + '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching provinces:', error);
                }
            });
        });

        // ดึงข้อมูลอำเภอเมื่อเลือกจังหวัด
        $('#province').change(function () {
                var province_id = $(this).val();
                $.ajax({
                    url: 'get_amphure.php',
                    method: 'GET',
                    data: { province_id: province_id },
                    success: function (data) {
                        var amphures = JSON.parse(data);
                        var amphureSelect = $('#amphure');
                        amphureSelect.empty().append('<option value="" disabled selected>เลือกอำเภอ</option>');
                        amphures.forEach(function (amphure) {
                            amphureSelect.append('<option value="' + amphure.id + '">' + amphure.name_th + '</option>');
                        });
                    }
                });
            });


        // ดึงข้อมูลตำบลเมื่อเลือกอำเภอ
        $('#amphure').change(function() {
            var amphure_id = $(this).val();
            $.ajax({
                url: 'get_district.php',
                method: 'GET',
                data: { amphure_id: amphure_id },
                success: function(data) {
                    var subdistricts = JSON.parse(data);
                    var districtSelect = $('#district');
                    districtSelect.empty().append('<option value="" disabled selected>เลือกตำบล</option>');
                    subdistricts.forEach(function(subdistrict) {
                        districtSelect.append('<option value="' + subdistrict.id + '">' + subdistrict.name_th + '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching subdistricts:', error);
                }
            });
        });
    </script>
</body>

</html>

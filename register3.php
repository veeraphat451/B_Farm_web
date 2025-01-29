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
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- SweetAlert -->
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
            padding: 10px;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
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

        .select2-container .select2-selection--single {
            height: 40px;
            border-radius: 8px;
        }

        .select2-selection__rendered {
            padding: 5px;
            font-size: 16px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 40px;
        }
    </style>
</head>

<body>
    <div class="register-box">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-user-plus"></i> แบบฟอร์มการลงทะเบียนดาวน์โหลด B-FARM
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
                            <label for="tel"><i class="fas fa-phone"></i> หมายเลขโทรศัพท์</label>
                            <input type="tel" class="form-control" id="tel" name="tel" placeholder="กรอกหมายเลขโทรศัพท์">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="object"><i class="fas fa-bullseye"></i> วัตถุประสงค์การใช้</label>
                            <select class="form-control" id="object" name="object">
                                <option value="" disabled selected>เลือกวัตถุประสงค์</option>
                                <option value="1">การศึกษา</option>
                                <option value="2">เกษตรกรรม</option>
                                <option value="3">อื่น ๆ</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="province"><i class="fas fa-map-marker-alt"></i> จังหวัด</label>
                            <select id="province" name="province" class="form-control"></select>
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
    <!-- Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/js/bootstrap.bundle.min.js"></script>
    <!-- Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            // ใช้งาน Select2 สำหรับจังหวัด
            $('#province').select2({
                placeholder: "พิมพ์เพื่อค้นหาจังหวัด",
                ajax: {
                    url: 'get_province.php',
                    type: 'GET',
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return { search: params.term };
                    },
                    processResults: function (data) {
                        return {
                            results: data.map(function (item) {
                                return { id: item.id, text: item.name_th };
                            })
                        };
                    },
                    cache: true
                }
            });
        });
    </script>
</body>

</html>

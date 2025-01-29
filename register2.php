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
            background: linear-gradient(to bottom,rgb(255, 255, 255),rgb(255, 255, 255));
            font-family: 'Poppins', sans-serif;
            color: #333;
        }

        .register-box {
            max-width: 900px;
            margin: 4% auto;
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        .card-header {
            background: #28a745;
            color: #ffffff;
            text-align: center;
            padding: 25px;
            font-size: 26px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .card-body {
            padding: 30px;
        }

        .form-control {
            height: 50px;
            border-radius: 10px;
            border: 1px solid #ced4da;
            font-size: 16px;
            padding: 8px;
        }

        .form-control:focus {
            border-color: #28a745;
            box-shadow: 0 0 5px rgba(40, 167, 69, 0.5);
        }

        .form-group label {
            font-weight: bold;
            font-size: 15px;
            color: #555;
        }

        .btn-primary {
            background: #28a745;
            border: none;
            border-radius: 10px;
            padding: 10px 25px;
            font-size: 18px;
            font-weight: bold;
            transition: all 0.3s ease;
            letter-spacing: 1px;
        }

        .btn-primary:hover {
            background: #218838;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }

        .form-footer {
            text-align: center;
            margin-top: 25px;
        }

        .form-footer a {
            color: #28a745;
            font-weight: bold;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .form-footer a:hover {
            text-decoration: underline;
            color: #1e7e34;
        }

        .select2-container .select2-selection--single {
            height: 50px;
            border-radius: 10px;
        }

        .select2-selection__rendered {
            padding-left: 5px;
            font-size: 16px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 50px;
        }
    </style>
</head>
        
<body>
    <div class="register-box">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-seedling"></i> ลงทะเบียนเพื่อใช้งาน B-FARM
            </div>
            <div class="card-body">
            <form action="register_process.php" method="POST">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="first_name"><i class="fas fa-user"></i> ชื่อ</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="กรอกชื่อ" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="last_name"><i class="fas fa-user"></i> นามสกุล</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="กรอกนามสกุล" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email"><i class="fas fa-envelope"></i> อีเมล</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="กรอกอีเมล" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="tel"><i class="fas fa-phone"></i> หมายเลขโทรศัพท์</label>
                    <input type="tel" class="form-control" id="tel" name="tel" placeholder="กรอกหมายเลขโทรศัพท์" required>
                </div>
            </div>
            <div class="form-row">
            <div class="form-group col-md-6">
                    <label for="object"><i class="fas fa-bullseye"></i> วัตถุประสงค์</label>
                    <select class="form-control" id="object" name="object" required>
                        <option value="" disabled selected>เลือกวัตถุประสงค์</option>
                        <option value="การศึกษา">การศึกษา</option>
                        <option value="การประกอบธุรกิจ">การประกอบธุรกิจ</option>
                        <option value="อื่น ๆ">อื่น ๆ</option>
                    </select>
                </div>
                <div class="form-group col-md-6" id="other-object-group" style="display: none;">
                    <label for="other_object"><i class="fas fa-pencil-alt"></i> โปรดระบุวัตถุประสงค์อื่น ๆ</label>
                    <input type="text" class="form-control" id="other_object" name="other_object" placeholder="กรอกวัตถุประสงค์อื่น ๆ">
                </div>

                </div>
                <div class="form-row">
            <div class="form-group col-md-4">
                <label for="province"><i class="fas fa-map-marker-alt"></i> จังหวัด</label>
                <select id="province" name="province" class="form-control" required>
                    <option value="" disabled selected>เลือกจังหวัด</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="amphure"><i class="fas fa-map-marker-alt"></i> อำเภอ</label>
                <select id="amphure" name="amphure" class="form-control" required disabled>
                    <option value="" disabled selected>กรุณาเลือกจังหวัดก่อน</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="district"><i class="fas fa-map-marker-alt"></i> ตำบล</label>
                <select id="district" name="district" class="form-control" required disabled>
                    <option value="" disabled selected>กรุณาเลือกอำเภอก่อน</option>
                </select>
            </div>
        </div>

            <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-paper-plane"></i> สมัครใช้งาน</button>
        </form>

                <!-- <div class="form-footer">
                    <p class="mt-3">มีบัญชีอยู่แล้ว? <a href="login.php">เข้าสู่ระบบ</a></p>
                </div> -->
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
            $('#object').on('change', function () {
                if ($(this).val() === 'อื่น ๆ') {
                    $('#other-object-group').show(); // แสดงช่องกรอก
                    $('#other_object').prop('required', true); // ตั้งค่าช่องนี้ให้เป็น required
                } else {
                    $('#other-object-group').hide(); // ซ่อนช่องกรอก
                    $('#other_object').prop('required', false); // เอา required ออก
                }
            });
        });


        $(document).ready(function () {
            // Select2
            $('#province').select2({
                //placeholder: "พิมพ์เพื่อค้นหาจังหวัด",
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
                            results: data.map(item => ({ id: item.id, text: item.name_th }))
                        };
                    },
                    cache: true
                }
            });

            $('#province').on('change', function () {
                const provinceId = $(this).val();
                $('#amphure').prop('disabled', true).empty();

                if (provinceId) {
                    $.ajax({
                        url: 'get_amphure.php',
                        type: 'GET',
                        dataType: 'json',
                        data: { province_id: provinceId },
                        success: function (data) {
                            $('#amphure').prop('disabled', false).select2({
                                data: data.map(item => ({ id: item.id, text: item.name_th }))
                            });
                        },
                        error: function () {
                            Swal.fire('Error', 'Cannot load amphure data.', 'error');
                        }
                    });
                }
            });
            // Load subdistrict data when amphur is selected
            $('#amphure').on('change', function () {
                const amphurId = $(this).val();
                $('#district').prop('disabled', true).empty();

                if (amphurId) {
                    $.ajax({
                        url: 'get_district.php',
                        type: 'GET',
                        dataType: 'json',
                        data: { amphure_id: amphurId },
                        success: function (data) {
                            $('#district').prop('disabled', false).select2({
                                data: data.map(item => ({ id: item.id, text: item.name_th }))
                            });
                        },
                        error: function () {
                            Swal.fire('Error', 'Cannot load subdistrict data.', 'error');
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>
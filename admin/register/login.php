<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/css/bootstrap.min.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            background: linear-gradient(to right, #28a745, #218838);
            font-family: 'Arial', sans-serif;
        }
        .login-box {
            max-width: 450px;
            margin: 7% auto;
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
    <div class="login-box">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-sign-in-alt"></i> เข้าสู่ระบบ
            </div>
            <div class="card-body">
                <form action="login_process.php" method="POST">
                    <div class="form-group">
                        <label for="email"><i class="fas fa-envelope"></i> อีเมล</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="กรอกอีเมล">
                    </div>
                    <div class="form-group">
                        <label for="password"><i class="fas fa-lock"></i> รหัสผ่าน</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="กรอกรหัสผ่าน">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-sign-in-alt"></i> เข้าสู่ระบบ</button>
                </form>
                <div class="form-footer">
                    <p class="mt-3">ยังไม่มีบัญชี? <a href="register.php">สมัครสมาชิก</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>

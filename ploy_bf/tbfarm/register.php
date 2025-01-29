<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up for bFarm</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #6E8EFB, #A777E3);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .signup-container {
            background: #fff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            max-width: 600px;
        }
        h2 {
            text-align: center;
            margin-bottom: 32px;
        }
        .form-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .form-field {
            flex: 48%; /* Adjusts to half width */
            margin-bottom: 10px;
        }
        .form-field.full-width {
            flex: 100%; /* Takes full width */
        }
        input, select {
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #ccc;
        }
        input[type="submit"] {
            background-color: #4C63B6;
            color: white;
            cursor: pointer;
            transition: background 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #4056a1;
        }
    </style>
</head>
<body>
    <div class="signup-container">
        <h2>Register for bFarm</h2>
        <form action="register.php" method="POST">
            <div class="form-row">
                <div class="form-field">
                    <label for="name">ชื่อ:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-field">
                    <label for="surname">นามสกุล:</label>
                    <input type="text" id="surname" name="surname" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-field">
                    <label for="region">ภาค:</label>
                    <select id="region" name="region" required>
                        <option value="">Select Region</option>
                    </select>
                </div>
                <div class="form-field">
                    <label for="province">จังหวัด:</label>
                    <select id="province" name="province" required>
                        <option value="">Select Province</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-field">
                    <label for="district">อำเภอ:</label>
                    <select id="district" name="district" required>
                        <option value="">Select District</option>
                    </select>
                </div>
                <div class="form-field">
                    <label for="sub_district">ตำบล:</label>
                    <select id="sub_district" name="sub_district" required>
                        <option value="">Select Sub-District</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-field full-width">
                    <label for="email">อีเมลล์:</label>
                    <input type="email" id="email" name="email" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-field ">
                    <label for="password">รหัสผ่าน:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-field ">
                    <label for="confirm_password">ยืนยันรหัสผ่าน:</label>
                    <input type="password" id="confirm_password" name="confirm_password" required>
                </div>
            </div>
            <div class="form-row">
                <input type="submit" value="Sign Up">
            </div>
        </form>
    </div>
    <script>
        $(document).ready(function() {
            // Load regions, provinces, districts, sub-districts dynamically
            $('#region').on('change', function() {
                var regionId = $(this).val();
                if (regionId) {
                    // Example: Populate provinces based on selected region
                    $.ajax({
                        url: 'getProvinces.php', // Adjust to your PHP file
                        type: 'POST',
                        data: {region: regionId},
                        dataType: 'json',
                        success: function(data) {
                            var options = '<option value="">Select Province</option>';
                            $.each(data, function(key, value) {
                                options += '<option value="' + key + '">' + value + '</option>';
                            });
                            $('#province').html(options);
                        }
                    });
                } else {
                    $('#province').html('<option value="">Select Province</option>');
                }
                // Reset subsequent selects
                $('#district').html('<option value="">Select District</option>');
                $('#sub_district').html('<option value="">Select Sub-District</option>');
            });

            // Similar AJAX calls for districts and sub-districts based on province and district
        });
    </script>
</body>
</html>

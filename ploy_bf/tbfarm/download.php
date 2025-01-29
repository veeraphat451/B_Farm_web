<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Download B-Farm</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <!-- <link rel="stylesheet" href="assets/css/pd.css"> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">

</head>
<body>
    <!-- Include Navbar -->
    <?php
        $navbar_path = __DIR__ . '/includes/navbar.php';
        if (file_exists($navbar_path)) {
            include $navbar_path;
        } else {
            echo '<p style="color:red;">Error: Navbar file not found!</p>';
        }
    ?>

    <div class="download-section" style="
        padding: 20px; 
        border-radius: 10px; 
        width: 90%; 
        max-width: 800px; 
        margin: 50px auto; 
        text-align: center;">
        <div class="header-container">
            <h1 style="
                font-size: 2.5rem; 
                font-weight: 700; 
                color: #333; 
                text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1);">
                <i class="fas fa-download"></i> Download B-Farm
            </h1>
            <p style="
                font-size: 1.25rem; 
                color: #555; 
                margin-bottom: 20px; 
                text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);">
                Select the appropriate platform and start managing your farm efficiently.
            </p>
            <div class="links">
                <a href="#" style="
                    color: #4682B4; 
                    text-decoration: none; 
                    font-weight: 700; 
                    font-size: 1.1rem;">
                    <i class="fas fa-history"></i> View Older Versions →
                </a>
            </div>
        </div>

        <div class="content-section" style="margin-top: 20px;">
            <table style="
                width: 100%; 
                border-collapse: collapse;">
                <tbody>
                    <tr style="background: transparent; border-bottom: 1px solid #ddd;">
                        <td style="
                            padding: 12px; 
                            font-size: 0.9rem; 
                            color: #333;">
                            <i class="fas fa-tractor"></i> B-Farm (Windows)
                        </td>
                        <td style="
                            padding: 12px; 
                            font-size: 0.9rem; 
                            color: #333; 
                            text-align: center;">
                            7 Nov 2024
                        </td>
                        <td style="
                            padding: 12px; 
                            font-size: 0.9rem; 
                            color: #333; 
                            text-align: center;">
                            V1.0.0
                        </td>
                        <td style="
                            padding: 12px; 
                            text-align: right;">
                            <a href="#" class="download-button" style="
                                padding: 10px 30px; 
                                border: none; 
                                background: #4CAF50; 
                                color: #fff; 
                                border-radius: 25px; 
                                font-size: 0.9rem; 
                                font-weight: 700; 
                                text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);">
                                Download
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Include Footer -->
    <?php
        $footer_path = __DIR__ . '/includes/footer.php';
        if (file_exists($footer_path)) {
            include $footer_path;
        } else {
            echo '<p class="error-message">Error: Footer file not found!</p>';
        }
    ?>

    <script src="assets/js/script.js"></script>
</body>
</html>
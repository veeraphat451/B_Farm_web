<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home B-Farm</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/pd.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    
    <div class="download-section">
        <div class="custom-header">
            <img src="/tbfarm/images/icons3.png" alt="B-Farm Logo" class="logo"> <!-- Update path to your logo -->
            <h1>B-Farm Community Server Download</h1>
        </div>
        
        <section class="download-info">
            <p>The Community version of our agricultural database offers a flexible document data model along with support for ad-hoc queries, real-time aggregation, and more.</p>
            <p>Give it a try with a free, high-availability B-Farm cluster, or get started from your terminal with the following commands:</p>
            <code>
                brew install b-farm<br>
                b-farm setup
            </code>
        </section>

        <section class="download-section">
            <div class="selector">
                <label for="version">Version</label>
                <select id="version">
                    <option>8.0.4 (current)</option>
                </select>
            </div>

            <div class="selector">
                <label for="platform">Platform</label>
                <select id="platform">
                    <option>Windows x64</option>
                </select>
            </div>

            <div class="selector">
                <label for="package">Package</label>
                <select id="package">
                    <option>msi</option>
                </select>
            </div>

            <div class="buttons">
                <button class="download-button">Download</button>
                <button class="copy-link">Copy Link</button>
                <button class="more-options">More Options</button>
            </div>
        </section>
    </div>

    <!-- Include Footer -->
    <?php
        $footer_path = __DIR__ . '/includes/footer.php';
        if (file_exists($footer_path)) {
            include $footer_path;
        } else {
            echo '<p style="color:red;">Error: Footer file not found!</p>';
        }
    ?>

    <script src="assets/js/script.js"></script> <!-- External JS -->

</body>
</html>
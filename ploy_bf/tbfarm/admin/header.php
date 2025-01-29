<header class="main-header">
  <!-- Logo 50x50 pixels -->
  <a href="#" class="logo">
    <span class="logo-mini"><b>LTE</b></span>
    <span class="logo-lg"><b>Admin LTE</b></span>
  </a>
  
  <!-- Header Navbar -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">            
        <!-- User Account -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <!-- รูปภาพผู้ใช้ -->
            <img src="img-member/14072019286626112.png" class="user-image" alt="User Image">
            <?php
              // session_start();
              if (isset($_SESSION['first_name'], $_SESSION['last_name'])) {
                  echo '<span class="hidden-xs">ยินดีต้อนรับ : ' . 
                       htmlspecialchars($_SESSION['first_name']) . ' ' . 
                       htmlspecialchars($_SESSION['last_name']) . '</span>';
              } else {
                  echo '<span class="hidden-xs">ยินดีต้อนรับ : ผู้เยี่ยมชม</span>';
              }
            ?>
          </a>
        </li>
        
        <!-- Logout Button -->
        <li class="header">
          <a href="logout.php">
            <span class="fa fa-power-off"></span> ออกจากระบบ
          </a>
        </li>

      </ul>
    </div>
  </nav>
</header>

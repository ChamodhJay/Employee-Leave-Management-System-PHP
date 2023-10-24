<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <title>Pulathisi leave</title>
    <link rel="stylesheet" href="style.css">
   
  </head>
  <body>
    <!-- navbar -->
    <nav class="navbar">
      <div class="logo_item">
        <i class="bx bx-menu" id="sidebarOpen"></i>
        <img src="images/logo.png" alt=""></i>Pulathisi Leave
      </div>

      <div class="search_bar">
        <input type="text" placeholder="Search" />
      </div>

      <div class="navbar_content">
        <i class="bi bi-grid"></i>
        <i class='bx bx-sun' id="darkLight"></i>
        <i class='bx bx-bell' ></i>
        <img src="images/profile.jpg" alt="" class="profile" />
      </div>
    </nav>

    <!-- sidebar -->
    <nav class="sidebar">
       <div class="siteidentity">
          
            <div class="txtcompany">
              <span class="pulathisi">Pulathisi Leave</span>
            </div>
        </div>
      <div class="menu_content">

       
        <ul class="menu_items">
          <div class="menu_title menu_dahsboard"></div>
          <!-- duplicate or remove this li tag if you want to add or remove navlink with submenu -->
          <!-- start -->
        
          <li class="item">
            <a href="admin_dashboard.php" class="nav_link">
              <span class="navlink_icon">
                <i class="bx bx-home-alt"></i>
              </span>
              <span class="navlink">Home</span>
            </a>
          </li>
          <!-- End -->

          <li class="item">
            <a href="department.php" class="nav_link" id="department">
              <span class="navlink_icon">
                <i class="bx bx-buildings"></i>
              </span>
              <span class="navlink">Department</span>
            </a>
          </li>

          <li class="item">
            <div href="javascript:;" class="nav_link submenu_item">
              <span class="navlink_icon">
                <i class="bx bx-user-plus"></i>
              </span>
              <span class="navlink">Staff</span>
              <i class="bx bx-chevron-right arrow-left"></i>
            </div>

            <ul class="menu_items submenu">
              <a href="add_staff.php" class="nav_link sublink"><i class="bx bx-chevron-right"></i>New Staff</a>
              <a href="staff.php" class="nav_link sublink"><i class="bx bx-chevron-right"></i>Manage Staff</a>

            </ul>
          </li>
          <!-- end -->

          <!-- duplicate this li tag if you want to add or remove  navlink with submenu -->
          <!-- start -->
          <li class="item">
            <div href="javascript:;" class="nav_link submenu_item">
              <span class="navlink_icon">
                <i class="bx bx-run"></i>
              </span>
              <span class="navlink">Leave</span>
              <i class="bx bx-chevron-right arrow-left"></i>
            </div>

            <ul class="menu_items submenu">
              <a href="apply_leave.php" class="nav_link sublink"><i class="bx bx-chevron-right"></i>Apply Leave</a>
              <a href="leaves.php" class="nav_link sublink"><i class="bx bx-chevron-right"></i>All Leave</a>
              <a href="pending_leave.php" class="nav_link sublink"><i class="bx bx-chevron-right"></i>Pending Leave</a>
              <a href="approved_leave.php" class="nav_link sublink"><i class="bx bx-chevron-right"></i>Approved Leave</a>
              <a href="rejected_leave.php" class="nav_link sublink"><i class="bx bx-chevron-right"></i>Rejected Leave</a>
            </ul>
          </li>
          <!-- end -->
        </ul>

      
        <ul class="menu_items">
          <div class="menu_title menu_setting"></div>
          <li class="item">
            <a href="my_profile.php" class="nav_link">
              <span class="navlink_icon">
                <i class="bx bx-user"></i>
              </span>
              <span class="navlink">My Profile</span>
            </a>
          </li>

          <li class="item">
            <a href="change.php" class="nav_link">
              <span class="navlink_icon">
                <i class="bx bx-key"></i>
              </span>
              <span class="navlink">Change Password</span>
            </a>
          </li>
    

          <li class="item">
            <a  href="../logout.php" class="nav_link">
              <span class="navlink_icon">
                <i class="bx bxs-disc"></i>
              </span>
              <span class="navlink">Logout</span>
            </a>
          </li>
        </ul>

        

        <!-- Sidebar Open / Close -->
        <div class="bottom_content">
          <div class="bottom expand_sidebar">
            <span> Expand</span>
            <i class='bx bx-log-in' ></i>
          </div>
          <div class="bottom collapse_sidebar">
            <span> Collapse</span>
            <i class='bx bx-log-out'></i>
          </div>
        </div>
      </div>
    </nav>
    
    <script>
    document.addEventListener("DOMContentLoaded", function() {
    const listItems = document.querySelectorAll(".nav_link");

    listItems.forEach(item => {
        item.addEventListener("click", function() {
            // Remove the 'active' class from all list items
            listItems.forEach(item => {
                item.classList.remove("active");
            });

            // Add the 'active' class to the clicked item
            this.classList.add("active");

           
        });
     
    });
});

    </script>
  </body>
</html>

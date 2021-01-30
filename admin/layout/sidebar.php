   <!-- Sidebar -->
   <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class=" bg-white p-1 mt-0 m-4 " href="#"> <img class='w-75' src="../img/logo.jpeg" alt=""> </a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="dashboard.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Users
</div>

<!-- Nav Item - Pages Amin Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
        aria-expanded="true" aria-controls="collapseOne">
        <i class="fas fa-fw fa-user-tie"></i>
        <span>Admin</span>
    </a>
    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Manage Admnins:</h6>
            <a class="collapse-item" href="admins.php">Manage Admin</a>
        </div>
    </div>
</li>
<!-- Nav Item - Pages Instructor Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-user-tie"></i>
        <span>Instructors</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Manage Instructors:</h6>
            <a class="collapse-item" href="instructors.php"> Manage Instructors</a>
            <a class="collapse-item" href="assign_students.php"> Assign Students</a>
        </div>
    </div>
</li>

<!-- Nav Item - Student Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-users"></i>
        <span>Students</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Manage Students:</h6>
            <a class="collapse-item" href="students.php">Manage Student</a>
            <a class="collapse-item" href="assign_students.php"> Assign Instructor</a>
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Other
</div>

<!-- Nav Item - Inventory Collapse Menu -->
<!-- <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-paste"></i>
        <span>Workbooks</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Manage Workbooks</h6>
            <a class="collapse-item" href="login.html">CHapters</a>
            <a class="collapse-item" href="register.html">Purchase</a>
            <a class="collapse-item" href="forgot-password.html">Revenue</a>
          
        </div>
    </div>
</li> -->
<!-- Nav Item - Stocks -->
<li class="nav-item">
    <a class="nav-link" style="cursor:pointer" href='../workbook_template.php?lesson=1.1'>
        <i class="fas fa-fw fa-paste"></i>
        <span>Workbooks</span></a>
     
</li>
<!-- Nav Item - Stocks -->
<li class="nav-item">
    <a class="nav-link" style="cursor:pointer" href='lisences.php'>
        <i class="fas fa-fw fa-id-card"></i>
        <span>Licenses</span></a>
     
</li>
<!-- Nav Item - Stocks -->
<li class="nav-item">
    <a class="nav-link" style="cursor:pointer" href='subscribers.php'>
        <i class="fas fa-fw fa-server"></i>
        <span>Subscriptions</span></a>
     
</li>
<!-- Nav Item - Stocks -->
<li class="nav-item">
    <a class="nav-link" style="cursor:pointer" data-toggle="modal" data-target="#logoutModal">
        <i class="fas fa-fw fa-sign-out-alt"></i>
        <span>Logout</span></a>
     
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>



</ul>
<!-- End of Sidebar -->
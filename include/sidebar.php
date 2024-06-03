<!-- ======= Sidebar ======= -->
<?php
$role = ""; // Set a default value
if (isset($_SESSION["auth"])) {
    $id = $_SESSION["id"];
    $role = $_SESSION["role"];
} ?>

<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        <?php if ($role == "Admin" || $role == "User") { ?>
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->
        <?php } ?>

        <li class="nav-heading">Pages</li>
        <?php if ($role == "Admin" || $role == "") { ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="register.php">
                    <i class="bi bi-card-list"></i>
                    <span>Register</span>
                </a>
            </li><!-- End Register Page Nav -->
        <?php } ?>

        <?php if ($role == "Admin" ) { ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="show.php">
                    <i class="bi bi-card-list"></i>
                    <span>User Data</span>
                </a>
            </li><!-- End Register Page Nav -->
        <?php } ?>

        <?php if ($role == "Admin" || $role == "") { ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="login.php">
                    <i class="bi bi-box-arrow-in-right"></i>
                    <span>Login</span>
                </a>
            </li><!-- End Login Page Nav -->
        <?php } ?>
    </ul>

</aside><!-- End Sidebar-->
<?php
include ("include/topbar.php");
session_start();

?>

<body>
    <?php
    include ("include/topbar.php");
    include ("include/header.php");
    include ("include/sidebar.php");
    ?>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row"></div>
        </section>

    </main><!-- End #main -->
    <?php include ("include/footer.php"); ?>
</body>
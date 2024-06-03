<?php

session_start();
include ("include/topbar.php");
include ("include/dbconn.php");
include ("include/auth.php");
$query = "select * from tbl_crud";
$result = mysqli_query($conn, $query);

?>

<body>
    <?php include ("include/topbar.php"); ?>
    <?php include ("include/header.php"); ?>
    <?php include ("include/sidebar.php"); ?>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Data Tables</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item">User Data</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <div class="status">
                                <h5 style="padding-top:40px; margin-bottom:-30px;">
                                    <?php if (isset($_SESSION["status"])) {
                                        echo $_SESSION['status'];
                                        unset($_SESSION['status']);
                                    } ?>
                                </h5>
                            </div>
                            <div style="text-align:right;">
                                <a href="register.php"><button type="button" class="btn btn-primary">Add
                                        New</button></a>
                            </div>
                            <!-- Table with stripped rows -->
                            <table class="table datatable ">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>First name</th>
                                        <th>Last name</th>
                                        <th>Username</th>
                                        <th>Designation</th>
                                        <th>Email</th>
                                        <th>User Type</th>
                                        <th>Action</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $a = 1;
                                    while ($res = mysqli_fetch_array($result)) { ?>
                                        <tr>
                                            <td><?php echo $a; ?></td>
                                            <td><?php echo $res['fname']; ?></td>
                                            <td><?php echo $res['lname']; ?></td>
                                            <td><?php echo $res['username']; ?></td>
                                            <td><?php echo $res['designation']; ?></td>
                                            <td><?php echo $res['email']; ?></td>
                                            <td><?php echo $res['role']; ?></td>
                                            <td>
                                                <a href="register.php?action='edit'&id=<?php echo $res['id']; ?>"><button
                                                        type="button" class="btn btn-primary">Edit</button></a>
                                            </td>
                                            <td>
                                                <a href="code.php?action='delete'&id=<?php echo $res['id']; ?>"><button
                                                        type="button" class="btn btn-danger">Delete</button></a>
                                            </td>
                                        </tr>
                                        <?php $a = $a + 1;
                                    } ?>
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
    <?php include ("include/footer.php"); ?>
</body>
<?php
session_start();
include ("include/topbar.php");
include ("include/dbconn.php");
if (isset($_SESSION["auth"])) {
    // $_SESSION["status"] = "You are already logged in";
    header("location:dashboard.php");
    exit();
}
if (isset($_POST["login"])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $select_query = "select * from tbl_crud where email='$email' and password='$password'";
    $select_result = mysqli_query($conn, $select_query);
    $res = mysqli_fetch_array($select_result);

    $id = $res['id'];
    $fname = $res['fname'];
    $lname = $res['lname'];
    $username = $res['username'];
    $designation = $res['designation'];
    $email = $res['email'];
    $role = $res['role'];

    if (mysqli_num_rows($select_result) > 0) {
        // $_SESSION['status'] = "Logged in successfully";
        $_SESSION["auth"] = true;
        $_SESSION["id"] = $id;
        $_SESSION["fname"] = $fname;
        $_SESSION["lname"] = $lname;
        $_SESSION["username"] = $username;
        $_SESSION["designation"] = $designation;
        $_SESSION["email"] = $email;
        $_SESSION["role"] = $role;
        $_SESSION["logged"] = $log;
        header('location:dashboard.php');
        exit();
    } else {
        $_SESSION['status'] = "Incorrect User id and password";
        header('location:login.php');
        exit();
    }
}
?>

<body>
    <?php include ("include/topbar.php"); ?>

    <main>
        <div class="container">

            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="index.php" class="logo d-flex align-items-center w-auto">
                                    <img src="assets/img/logo.png" alt="">
                                    <span class="d-none d-lg-block">Login</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                                    </div>

                                    <form class="row g-3 needs-validation" novalidate action="" method="POST">
                                        <div class="status">
                                            <h6>
                                                <?php if (isset($_SESSION["status"])) {
                                                    echo $_SESSION['status'];
                                                    unset($_SESSION['status']);
                                                } ?>
                                            </h6>
                                        </div>
                                        <div class="col-12">
                                            <label for="email" class="form-label">Email</label>
                                            <div class="input-group has-validation">
                                                <input type="text" name="email" class="form-control" id="email"
                                                    required>
                                                <div class="invalid-feedback">Please enter your username.</div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control"
                                                id="yourPassword" required>
                                            <div class="invalid-feedback">Please enter your password!</div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    value="true" id="rememberMe">
                                                <label class="form-check-label" for="rememberMe">Remember me</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" name="login"
                                                type="submit">Login</button>
                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0">Don't have account? <a href="register.php">Create an
                                                    account</a></p>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

    <?php include ("include/footer.php"); ?>
</body>
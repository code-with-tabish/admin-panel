<?php
session_start();
include ("include/topbar.php");
include ("include/dbconn.php");

$id = $fname =$lname = $username = $designation = $email = $password = $cpassword = $role = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $action = $_GET['action'];
    $query = "select * from tbl_crud where id='$id'";
    $result = mysqli_query($conn, $query);
    $res = mysqli_fetch_array($result);

    $id = $res['id'];
    $fname = $res['fname'];
    $lname = $res['lname'];
    $username = $res['username'];
    $designation = $res['designation'];
    $email = $res['email'];
    $password = $res['password'];
    $cpassword = $res['cpassword'];
    $role = $res['role'];
}
?>

<body>
    <?php include ("include/topbar.php"); ?>
    <main>
        <div class="container">
            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4 ">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-10 col-md-10 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="index.php" class="logo d-flex align-items-center w-auto">
                                    <img src="assets/img/logo.png" alt="">
                                    <span class="d-none d-lg-block">Register User</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                                    </div>
                                    <div class="status">
                                        <h6>
                                            <?php if (isset($_SESSION["status"])) {
                                                echo $_SESSION['status'];
                                                unset($_SESSION['status']);
                                            } ?>
                                        </h6>
                                    </div>
                                    <form class="row g-3 needs-validation" novalidate action="code.php" method="post">

                                        <div class="col-6 d-none">
                                            <label for="name" class="form-label">ID</label>
                                            <input type="text" name="id" class="form-control" id="id"
                                                value="<?php echo $id ?>" required>
                                        </div>

                                        <div class="col-6">
                                            <label for="fname" class="form-label">First Name</label>
                                            <input type="text" name="fname" class="form-control" id="fname"
                                                value="<?php echo $fname ?>" required>
                                            <div class="invalid-feedback">Please, enter your name!</div>
                                        </div>

                                        <div class="col-6">
                                            <label for="lname" class="form-label">Second Name</label>
                                            <input type="text" name="lname" class="form-control" id="lname"
                                                value="<?php echo $lname ?>" required>
                                            <div class="invalid-feedback">Please, enter your name!</div>
                                        </div>

                                        <div class="col-6">
                                            <label for="yourUsername" class="form-label">Username</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                                <input type="text" name="username" class="form-control" id="username"
                                                    required value="<?php echo $username ?>">
                                                <div class="invalid-feedback">Please choose a username.</div>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <label for="yourUsername" class="form-label">Designation </label>
                                            <div class="input-group has-validation">
                                                <select name="designation" id="designation" id="inputGroupPrepend"
                                                    class="form-control">
                                                    <option value="<?php echo $designation; ?>" class="d-none">
                                                        <?php echo $designation; ?>
                                                    </option>
                                                    <option value="Web Developer">Web Developer</option>
                                                    <option value="Tester">Tester</option>
                                                    <option value="UI & UX Designer">UI & UX Designer</option>
                                                </select>
                                                <div class="invalid-feedback">Please choose a username.</div>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <label for="yourEmail" class="form-label">Your Email</label>
                                            <input type="email" name="email" class="form-control" id="email" required
                                                value="<?php echo $email ?>">
                                            <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                                        </div>



                                        <div class="col-6">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control" id="password"
                                                required value="<?php echo $password ?>">
                                            <div class="invalid-feedback">Please enter your password!</div>
                                        </div>

                                        <div class="col-6">
                                            <label for="yourPassword" class="form-label">Confirm Password</label>
                                            <input type="password" name="cpassword" class="form-control" id="cpassword"
                                                required value="<?php echo $cpassword ?>">
                                            <div class="invalid-feedback">Please enter your password!</div>
                                        </div>

                                        <div class="col-6">
                                            <label for="role" class="form-label">Role </label>
                                            <div class="input-group has-validation">
                                                <select name="role" id="role" id="inputGroupPrepend"
                                                    class="form-control">
                                                    <option value="<?php echo $role; ?>" class="d-none">
                                                        <?php echo $role; ?>
                                                    </option>
                                                    <option value="Admin">Admin</option>
                                                    <option value="User">User</option>
                                                </select>
                                                <div class="invalid-feedback">Please choose your role.</div>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-check">
                                                <input class="form-check-input" name="terms" type="checkbox" value=""
                                                    id="acceptTerms" required>
                                                <label class="form-check-label" for="acceptTerms">I agree and accept the
                                                    <a href="#">terms and conditions</a></label>
                                                <div class="invalid-feedback">You must agree before submitting.</div>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <button class="btn btn-primary w-100" name="submit"
                                                type="submit"><?php echo $id ? "Update" : "Create"; ?></button>
                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0">Already have an account? <a href="login.php">Log
                                                    in</a></p>
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

</body>
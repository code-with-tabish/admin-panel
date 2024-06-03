<?php
session_start();
include ("include/dbconn.php");
include ("include/auth.php");

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $username = $_POST['username'];
    $designation = $_POST['designation'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $role = $_POST['role'];
    $email_query = "select email from tbl_crud where email='$email'";
    $check_email = mysqli_query($conn, $email_query);

    if ($password == $cpassword) {
        // update and insert query
        if ($id) {
            $edit_query = "update tbl_crud set fname='$fname',lname='$lname',designation='$designation',username='$username',email='$email',password='$password',cpassword='$cpassword',role='$role' where id='$id'";
            $results = mysqli_query($conn, $edit_query);
            $_SESSION["status"] = "Account updated successfully";
            header("location:show.php");

        } else {
            if (mysqli_num_rows($check_email) == 0) {
                $query = "insert into tbl_crud(fname,lname,username,designation,email,password,cpassword,role) values('$fname','$lname','$username','$designation','$email','$password','$cpassword','$role')";
                $result = mysqli_query($conn, $query);
                $_SESSION["status"] = "Account Created successfully";
                header("location:register.php");
            } else {
                $_SESSION["status"] = "Email Already Exist";
                header("location:register.php");
            }

        }

    } else {
        $_SESSION["status"] = "Password and Confirm Password doesnot matched";
        header("location:register.php");
    }
}

// Delete query 

if (isset($_GET['id']) && isset($_GET['action'])) {
    $id = $_GET['id'];
    $action = $_GET['action'];
    $delete_query = "delete from tbl_crud where id='$id'";
    $results = mysqli_query($conn, $delete_query);
    header("location:show.php");
}

?>
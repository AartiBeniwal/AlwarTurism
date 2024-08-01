<?php
session_start();
include("db.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $Mobileno = $_POST['mno'];
    $gmail = $_POST['email'];
    $Password = $_POST['pass'];

    if (!empty($gmail) && !empty($Password)) {
        $query = "INSERT INTO form (fname, lname, mno, email, pass) VALUES ('$firstname', '$lastname', '$Mobileno', '$gmail', '$Password')";
        
        if (mysqli_query($con, $query)) {
            echo "<script type='text/javascript'> alert('Successfully Registered');</script>";
        } else {
            echo "<script type='text/javascript'> alert('Error: " . mysqli_error($con) . "');</script>";
        }
    } else {
        echo "<script type='text/javascript'> alert('Please enter valid information');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <div class="signup">
        <h2>Sign Up</h2>
        <h4>It's free and only takes a minute</h4>
        <form method="POST">
            <label>First Name</label>
            <input type="text" name="fname" required>
            <label>Last Name</label>
            <input type="text" name="lname" required>
            <label>Mobile No.</label>
            <input type="number" name="mno" required>
            <label>Email</label>
            <input type="email" name="email" required>
            <label>Password</label>
            <input type="password" name="pass" required>
            <input type="submit" value="Submit">
        </form>
        <p>By clicking the Sign Up button, you agree to our<br/>
        <a href="">Terms and Conditions</a> and <a href="#">Privacy Policy</a>
        </p>
        <p>Already have an account? <a href="login.php">Login Here</a></p>
    </div>
</body>
</html>

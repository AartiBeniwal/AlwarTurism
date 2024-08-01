<?php
session_start();

include("db.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $gmail = $_POST['email'];
    $password = $_POST['pass'];

    if (!empty($gmail) && !empty($password)) {
        $query = "SELECT * FROM form WHERE email = '$gmail' LIMIT 1";
        $result = mysqli_query($con, $query);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);

                if ($user_data['pass'] == $password) {
                    header("Location: index.php");
                    die;
                }
            }
        }
        echo "<script type='text/javascript'> alert('Wrong username or password');</script>";
    } else {
        echo "<script type='text/javascript'> alert('Wrong username or password');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <div class="login">
        <h2>Login</h2>
        <h4>It's free and only takes a minute</h4>
        <form method="POST">
            <label>Email</label>
            <input type="email" name="email" required>
            <label>Password</label>
            <input type="password" name="pass" required>
            <input type="submit" value="Submit">
        </form>
        <p>Not have an Account? <a href="form.php">Sign Up here</a></p>
    </div>
</body>
</html>
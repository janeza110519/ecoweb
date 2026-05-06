<?php
session_start(); [span_4](start_span)
include 'db_connect.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // check user database
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['username'] = $user['username'];
        
        header("Location: dashboard.php"); [span_5](start_span)// I-direkta sa dashboard kon malampuson[span_5](end_span)
    } else {
        echo "Invalid Username or Password!";
    }
}
?>
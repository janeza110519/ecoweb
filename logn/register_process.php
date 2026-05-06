<?php
include 'db_connect.php';

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password']; // Sa tinuod nga app, mas maayo i-hash kini
    $role = $_POST['role'];

    // I-insert ang bag-ong user sa database
    $query = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')";
    
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Registration Successful!'); window.location='login.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
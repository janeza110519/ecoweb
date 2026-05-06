<?php
include 'db_connect.php'; // Siguroha nga husto ang filename sa imong connection

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];


    $query = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')";

    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('Registration Successful!');
                window.location.href='login.php'; 
              </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
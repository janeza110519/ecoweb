<?php
session_start();
include 'db_connect.php';

if (isset($_POST['set_task'])) {
    $location_id = $_POST['location_id'];
    $day = $_POST['collection_day'];
    $target = $_POST['target_type'];
    $user_id = $_SESSION['user_id']; // Kinsa ang nag-login nga admin/collector

    // SQL Query para sa CREATE operation
    $query = "INSERT INTO schedules (user_id, location_id, collection_day, target_type, status) 
              VALUES ('$user_id', '$location_id', '$day', '$target', 'Pending')";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Task Added!'); window.location='dashboard.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
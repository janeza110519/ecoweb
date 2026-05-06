<?php
include 'db_connect.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    // SQL Delete Operation
    $sql = "DELETE FROM schedules WHERE schedule_id = $id";
    
    if(mysqli_query($conn, $sql)){
        header("Location: dashboard.php?msg=Deleted Successfully");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
?>
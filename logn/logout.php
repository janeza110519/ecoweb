<?php
session_start();
session_destroy(); [span_7](start_span)// Hunongon ang session para dili na maka-access sa dashboard[span_7](end_span)
header("Location: login.php");
exit();
?>
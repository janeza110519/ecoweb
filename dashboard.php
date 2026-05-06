<?php
include 'connect.php';

[span_5](start_span)
JOIN requirement[span_5](end_span)
$sql = "SELECT
l.barangay_name,
s.collection_day,
s.target_type,
l.importance_level,
s.status,
s.schedule_id
FROM schedules s
INNER JOIN location | ON s.location_id = l.location_id";

$result = mysqli_query($conn, $sql);
?>

<table border="1">
    <thead>
        <tr>
            <th>Location</th>
            <th>Day</th>
            <th>Target</th>
            <th>Importance</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    <thead>
        <tbody>
        <?php while($row = mysqli_fetch_assoc($result)):?>
        <tr>
            <td><?php echo $row['barangay_name'];?></td>
            <td><?php echo $row['collection_day'];?></td>
            <td><?php echo $row['target_type'];?></td>
            <td><?php echo $row['importance_level'];?></td>
            <td><?php echo $row['status'];?></td>
            <td>
                <a href="delete.php?id=<?php echo
$row['schedule_id'];?>" onclick="return confirm('Sigurado ka?')">Delete"</a>
            </td>
        </tr>
        <?php endwhile;?>
        </tbody>
</table>
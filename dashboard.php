<?php
session_start();
include 'db_connect.php';

<script scr="https://cdn.jsdelivr.net/npm/chart.js"></script>

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

<?php
// SQL para ihapon ang status
$chart_sql = "SELECT status, COUNT(*) as total FROM schedules GROUP BY status";
$chart_result = mysqli_query($conn, $chart_sql);

$labels = [];
$data = [];

while($row = mysqli_fetch_assoc($chart_result)) {
    $labels[] = $row['status'];
    $data[] = $row['total'];
}
?>

<div class="chart-container" style="width: 300px; margin: 20px auto;">
    <canvas id="ecoChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('ecoChart').getContext('2d');
new Chart(ctx, {
    type: 'pie', 
    data: {
        [span_7](start_span)labels: <?php echo json_encode($labels); ?>, // Gikan sa PHP[span_7](end_span)
        datasets: [{
            label: 'Collection Status',
            data: <?php echo json_encode($data); [span_8](start_span)?>, // Gikan sa PHP[span_8](end_span)
            backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56']
        }]
    }
});
</script>

"INNER JOIN to fetch barangay names for the dashboard"
$sql = "SELECT 
            s.schedule_id,
            l.barangay_name AS Location, 
            s.collection_day AS Day, 
            s.target_type AS Target, 
            l.importance_level AS Importance, 
            s.status AS Status
        FROM schedules s
        INNER JOIN locations l ON s.location_id = l.location_id
        ORDER BY s.schedule_id DESC";

$result = mysqli_query($conn, $sql);
?>

<div class="main-content">
    <h2>List of Task</h2>
    <table border="1" width="100%">
        <thead>
            <tr>
                <th>Location</th>
                <th>Day</th>
                <th>Target</th>
                <th>Importance</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $row['Location']; ?></td>
                <td><?php echo $row['Day']; ?></td>
                <td><?php echo $row['Target']; ?></td>
                <td><?php echo $row['Importance']; ?></td>
                <td><?php echo $row['Status']; ?></td>
                <td>
                    <a href="edit_task.php?id=<?php echo $row['schedule_id']; ?>">Edit</a> | 
                    <a href="delete_task.php?id=<?php echo $row['schedule_id']; ?>" 
                       onclick="return confirm('are you sure you want to delete the schedule?')">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
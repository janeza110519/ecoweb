<?php
include 'db_connect.php';

// Mokuha og mga barangay para sa dropdown
$loc_query = "SELECT * FROM locations";
$loc_result = mysqli_query($conn, $loc_query);
?>

<div class="sidebar">
    <h3>Set Schedule</h3>
    <form action="save_task.php" method="POST">
        <label>Maps (Location):</label>
        <select name="location_id" required>
            <?php while($loc = mysqli_fetch_assoc($loc_result)): ?>
                <option value="<?php echo $loc['location_id']; ?>">
                    <?php echo $loc['barangay_name']; ?>
                </option>
            <?php endwhile; ?>
        </select>

        <label>Set Day:</label>
        <select name="collection_day">
            <option value="Monday">Monday</option>
            <option value="Tuesday">Tuesday</option>
            <option value="Wednesday">Wednesday</option>
            <option value="Thursday">Thursday</option>
            <option value="Friday">Friday</option>
        </select>

        <label>Target:</label>
        <select name="target_type">
            <option value="Recyclable">Recyclable</option>
            <option value="Residual">Residual</option>
            <option value="Biodegradable">Biodegradable</option>
        </select>

        <button type="submit" name="set_task">Set</button>
    </form>
</div>
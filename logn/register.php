<form action="register_process.php" method="POST">
    <h2>EcoWise Registration</h2>
    <input type="text" name="username" placeholder="Enter Username" required>
    <input type="password" name="password" placeholder="Enter Password" required>
    <select name="role">
        <option value="Resident">Resident</option>
        <option value="Collector">Collector</option>
    </select>
    <button type="submit" name="register">Sign Up</button>
    <p>Naa nay account? <a href="login.php">Login diri</a></p>
</form>
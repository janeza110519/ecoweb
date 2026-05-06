<form action="register_process.php" method="POST">
    <h2>EcoWise Registration</h2>
    <input type="text" name="username" placeholder="Enter Username" required>
    <input type="password" name="password" placeholder="Enter Password" required>
    <select name="role">
        <option value="Resident">Resident</option>
        <option value="Collector">Collector</option>
    </select>
    <button type="submit" name="register"><b>Sign Up</b></button>
    <p>Already have an account? <a href="login.php"><b>Login</b></a></p>
</form>
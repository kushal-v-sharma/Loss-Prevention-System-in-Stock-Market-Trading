<?php

$hostname = '127.0.0.1';
$username = 'root';
$password = 'student';
$database = 'kushal';


$conn = mysqli_connect($hostname, $username, $password, $database);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $username = $_POST['username'];
    $email = $_POST['email'];
    $newPassword = $_POST['new_password'];

    
    $sql = "UPDATE user SET password = '$newPassword' WHERE username = '$username' AND email = '$email'";

    
    if (mysqli_query($conn, $sql)) {
        echo "Password updated successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
    <link rel="stylesheet" href="style13.css">
</head>
<body>
<header>
        <h1>Change Password</h1>
        <div>
            <button class="btn btn-primary"><a href="index.html">Home</a></button>
            <button class="btn btn-primary"><a href="dashboard.html">Dashboard</a></button>
            <button class="btn btn-primary"><a href="buystock.php">Buy Stock</a></button>
            <button class="btn btn-primary"><a href="sell_stock.php">Sell Stock</a></button>
            <button class="btn btn-primary"><a href="live.html">Live Stock</a></button>
            <button class="btn btn-primary"><a href="stockdetail.php">Stock Detail</a></button>
            <button class="btn btn-primary"><a href="logoutuser.html">Log Out</a></button>
        </div>
    </header>
    <div class="container">
        <h1>Change Password</h1>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="username">Username:</label>
            <input type="text" name="username" required><br><br>

            <label for="email">Email:</label>
            <input type="email" name="email" required><br><br>

            <label for="new_password">New Password:</label>
            <input type="password" name="new_password" required><br><br>

            <input type="submit" value="Change Password">
        </form>
    </div>
</body>
</html>

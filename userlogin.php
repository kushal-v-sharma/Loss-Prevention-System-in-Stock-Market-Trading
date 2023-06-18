<?php

$host = '127.0.0.1';
$dbUsername = 'root';
$dbPassword = 'student';
$dbName = 'kushal';


$mysqli = new mysqli($host, $dbUsername, $dbPassword, $dbName);


if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}


function sanitize_input($input)
{
    global $mysqli;
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    $input = $mysqli->real_escape_string($input);
    return $input;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = sanitize_input($_POST['username']);
    $password = sanitize_input($_POST['password']);

    
    $query = "SELECT * FROM user WHERE username = '$username'";
    $result = $mysqli->query($query);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($password == $row['password']) {
            
            $success = "Login successful. Welcome, " . $row['username'] . "!";
            header("Location: dashboard.html");
            exit;
            
        } else {
            
            $error = "Invalid password.";
        }
    } else {
       
        $error = "Invalid username.";
    }
}


$mysqli->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style0.css">
    <script src="script0.js"></script>
</head>
<body>
<div class="background-image"></div>
    <div class="login-form">
      <h1>User Login</h1>
    <?php if (isset($success)) { ?>
        <div><?php echo $success; ?></div>
    <?php } ?>
    <?php if (isset($error)) { ?>
        <div><?php echo $error; ?></div>
    <?php } ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label>Username:</label>
        <input type="text" name="username" required><br><br>

        <label>Password:</label>
        <input type="password" name="password" required><br><br>

        <input type="submit" value="Login">
    </form>
    <p>Don't have an account? <a href="signup1.php">Sign up</a></p>
</body>
</html>

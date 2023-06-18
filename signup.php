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
    $email = sanitize_input($_POST['email']);
    $password = sanitize_input($_POST['password']);
    $confirm_password = sanitize_input($_POST['confirm_password']);

    
    if ($password !== $confirm_password) {
        $error = "Passwords do not match.";
    } else {
       
        $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        if ($mysqli->query($query)) {
            
            $success = "Registration successful. You can now login.";
            $username = $email = $password = $confirm_password = '';
        } else {
            
            $error = "Registration failed. Please try again later.";
        }
    }
}


$mysqli->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="style6.css">
    <script src="script6.js"></script>
</head>
<body>
<Body background="bg3.webp"> <br> 
    <div class="signup-form">
      <h1>Sign Up</h1>
    <?php if (isset($success)) { ?>
        <div><?php echo $success; ?></div>
    <?php } ?>
    <?php if (isset($error)) { ?>
        <div><?php echo $error; ?></div>
    <?php } ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label>Username:</label>
        <input type="text" name="username"  required><br><br>

        <label>Email:</label>
        <input type="email" name="email"  required><br><br>

        <label>Password:</label>
        <input type="password" name="password" required><br><br>

        <label>Confirm Password:</label>
        <input type="password" name="confirm_password" required><br><br>

        <input type="submit" value="Sign Up">
    </form>
    <p>Already have an account? <a href="adminlogin.php">Log in</a></p>
</body>
</html>

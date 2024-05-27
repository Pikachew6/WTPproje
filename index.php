<?php
session_start();
include("php/config.php");

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);


    $stmt = $con->prepare("SELECT * FROM users WHERE Username = ? AND Password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['valid'] = $row['Email'];
        $_SESSION['username'] = $row['Username'];
        $_SESSION['age'] = $row['Age'];
        $_SESSION['id'] = $row['Id'];
        header("Location: home.php");
        exit();
    } else {

        $stmt_username_check = $con->prepare("SELECT * FROM users WHERE Username = ?");
        $stmt_username_check->bind_param("s", $username);
        $stmt_username_check->execute();
        $result_username_check = $stmt_username_check->get_result();
        if ($result_username_check->num_rows == 0) {
            echo "<script>alert('Username not found');</script>";
        } else {
            echo "<script>alert('Wrong username or password');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignIn</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="wrapper">
        <h1>Login</h1>
        <br>
        <form action="index.php" method="post">
            <div class="input-box">
                <input type="text" name="username" id="username" placeholder="Username" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" id="password" placeholder="Password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox">Remember me</label>
                <a href="#">Forgot Password?</a>
            </div>
            <button type="submit" name="submit" class="btn">Login</button>
            <div class="register-link">
                <p>Don't have an account? <a href="signup.php">Register here</a></p>
                <p><a href="signup.php">github</a></p>
            </div>
        </form>
    </div>
</body>

</html>
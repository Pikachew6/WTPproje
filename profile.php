<?php
session_start();

include("php/config.php");
if (!isset($_SESSION['valid'])) {
    header("Location: index.php");
    exit(); // Add exit after header redirection
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Profile</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <div class="banner">
        <div class="navbar">
            <img src="logonobg.png" class="logo">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="aboutus.php">About Us</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="profile.php">Profile</a></li>
            </ul>
        </div>
        <div class="profile-content">
            <?php
            if (isset($_POST['submit'])) {
                $username = mysqli_real_escape_string($con, $_POST['username']);
                $age = mysqli_real_escape_string($con, $_POST['age']);
                $email = mysqli_real_escape_string($con, $_POST['email']);
                $password = mysqli_real_escape_string($con, $_POST['password']);

                $id = $_SESSION['id'];
                $edit_query = mysqli_query($con, "UPDATE users SET Username='$username', Age='$age', Email='$email', Password='$password' WHERE Id=$id") or die("error");

                if ($edit_query) {
                    echo "<script>alert('Profile Updated!');</script>";
                }
            } else {
                $id = $_SESSION['id'];
                $query = mysqli_query($con, "SELECT * FROM users WHERE Id=$id");
                while ($result = mysqli_fetch_assoc($query)) {
                    $res_Password = $result['Username'];
                    $res_Age = $result['Age'];
                    $res_Username = $result['Email'];
                    $res_Password = $result['Password'];
                }
            }
            ?>
            <h1>Change Profile</h1>
            <br>
            <form method="post" action="">
                <div class="input-box">
                    <input type="text" name="username" placeholder="Username" required>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="text" name="age" placeholder="Age" required>
                    <i class='bx bx-face'></i>
                </div>
                <div class="input-box">
                    <input type="text" name="email" placeholder="Email" required>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="password" name="password" placeholder="Password" required>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <button type="submit" name="submit" class="btn">Save</button>
                <button type="button" class="btn"><a href="index.php">Logout</a></button>
            </form>
        </div>
    </div>

</body>

</html>
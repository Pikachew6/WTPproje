<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div id="signup" class="signup-section">
        <?php
        include("php/config.php");
        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $age = $_POST['age'];
            $password = $_POST['password'];

            $verify_query = mysqli_query($con, "SELECT Email FROM users WHERE Email = '$email'");

            if (mysqli_num_rows($verify_query) != 0) {
                echo "<div class='message'>
                <p>Email already exists</p>
                </div> <br>";
                echo "<a href='javascript:self.history.back()'><button class='btn'>Go back</button>";
            } else {
                $stmt = $con->prepare("INSERT INTO users (Username, Email, Age, Password) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("ssis", $username, $email, $age, $password);
                $stmt->execute();
                $stmt->close();

                echo "<div class='message'>
                <p>Signup process successful!</p>
                </div> <br>";
                echo "<a href='index.php'><button class='btn'>Login Now</button>";
            }
        } else {
        ?>

            <h1>Sign Up</h1>
            <form action="signup.php" method="post">
                <div class="input-box">
                    <input type="text" name="username" id="username" placeholder="Username" required>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="email" name="email" id="email" placeholder="Email" required>
                    <i class='bx bx-mail-send'></i>
                </div>
                <div class="input-box">
                    <input type="text" name="age" id="age" placeholder="Age" required>
                    <i class='bx bx-face'></i>
                </div>
                <div class="input-box">
                    <input type="password" name="password" id="password" placeholder="Password" required>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <div class="signupbt">
                    <button type="submit" class="btn" name="submit">Sign Up</button>
                </div>
            </form>
        <?php } ?>
    </div>

</body>

</html>
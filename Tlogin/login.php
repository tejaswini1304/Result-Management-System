<?php
session_start();

include("db.php");

// Signup functionality
// Signup functionality
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['signup'])) {
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];
    $ConfirmPassword = $_POST['ConfirmPassword'];

    // Validate input
    if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Please enter a valid email address');</script>";
    } elseif ($Password !== $ConfirmPassword) {
        echo "<script>alert('Passwords do not match');</script>";
    } else {
        // Sanitize input
        $Email = mysqli_real_escape_string($con, $Email);
        $Password = mysqli_real_escape_string($con, $Password);

        // Check if email already exists
        $checkQuery = "SELECT * FROM teacher_account WHERE Email = '$Email'";
        $checkResult = mysqli_query($con, $checkQuery);

        if (mysqli_num_rows($checkResult) > 0) {
            // Email already exists, redirect to home page
            echo "<script>alert('Email already exists');</script>";
            echo "<script>window.location.href = 'Tprofile/Home/home.php';</script>"; // Replace 'index.php' with your homepage URL
        } else {
            // Insert new user into the database
            $query = "INSERT INTO teacher_account (Email, Password) VALUES ('$Email', '$Password')";
            if (mysqli_query($con, $query)) {
                echo "<script>alert('Successfully Created Account');</script>";
                echo "<script>window.location.href = 'Tprofile/profile.php';</script>";
            } else {
                echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
            }
        }
    }
}

// Login functionality
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['login'])) {
    $RegNo = $_POST['RegNo'];
    $Password = $_POST['Password'];

    // Validate input
    if (empty($RegNo) || empty($Password)) {
        echo "<script>alert('Please enter both UID and password');</script>";
    } else {
        // Sanitize input
        $RegNo = mysqli_real_escape_string($con, $RegNo);
        $Password = mysqli_real_escape_string($con, $Password);

        // Check if the user exists in the profile table
        $profileQuery = "SELECT * FROM teacher_profile WHERE RegNo = '$RegNo'";
        $profileResult = mysqli_query($con, $profileQuery);

        if (mysqli_num_rows($profileResult) == 1) {
            // User found in profile table, now check password in signup table
            $signupQuery = "SELECT sp.*, sa.Password 
                            FROM teacher_profile sp 
                            JOIN teacher_account sa ON sp.email = sa.Email
                            WHERE sp.RegNo = '$RegNo' AND sa.Password = '$Password'";
            $signupResult = mysqli_query($con, $signupQuery);

            if (mysqli_num_rows($signupResult) == 1) {
                $_SESSION['user_id'] = $RegNo; // Store user ID in session
                echo "<script>alert('Login Successful');</script>";
                echo "<script>window.location.href = 'Tprofile/Home/home.php';</script>";
                exit();
            } else {
                echo "<script>alert('Invalid Password');</script>";
            }
        } else {
            echo "<script>alert('User not found');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign in & Sign up Form</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
<main>
    <div class="box">
        <div class="inner-box">
            <div class="forms-wrap">
                <form method="POST" action="" autocomplete="off" class="sign-in-form">
                    <div class="logo">
                        <img src="logo.jpg" alt="school" />
                        <h4>AceGrade</h4>
                    </div>

                    <div class="heading">
                        <h2>Welcome Back</h2>
                        <h6>Not registered yet?</h6>
                        <a href="#" class="toggle">Sign up</a>
                    </div>

                    <div class="actual-form">
                        <div class="input-wrap">
                            <input
                                name="RegNo"
                                placeholder="Enter UID"
                                type="number"
                                minlength="4"
                                class="input-field"
                                autocomplete="off"
                                required
                            />
                        </div>

                        <div class="input-wrap">
                            <input
                                name="Password"
                                placeholder="Enter Password"
                                type="password"
                                minlength="4"
                                class="input-field"
                                autocomplete="off"
                                required
                            />
                        </div>

                        <input type="submit" name="login" value="Log In" class="sign-btn" />

                        <p class="text">
                            Forgotten your password or your login details?
                            <a href="#">Get help</a> signing in
                        </p>
                    </div>
                </form>

                <form method="POST" action="" autocomplete="off" class="sign-up-form" onsubmit="return validateForm()">
                    <div class="logo">
                        <img src="Images/schl.jpg" alt="school" />
                        <h4>School</h4>
                    </div>

                    <div class="heading">
                        <h2>Get Started</h2>
                        <h6>Already have an account?</h6>
                        <a href="#" class="toggle">Sign in</a>
                    </div>

                    <div class="actual-form">
                        <div class="input-wrap">
                            <input
                                type="email"
                                name="Email"
                                placeholder="Enter Email"
                                class="input-field"
                                autocomplete="off"
                                required
                            />
                        </div>

                        <div class="input-wrap">
                            <input
                                type="password"
                                name="Password"
                                id="password"
                                placeholder="Enter Password"
                                minlength="4"
                                class="input-field"
                                autocomplete="off"
                                required
                            />
                        </div>

                        <div class="input-wrap">
                            <input
                                type="password"
                                name="ConfirmPassword"
                                id="confirmPassword"
                                placeholder="Confirm Password"
                                minlength="4"
                                class="input-field"
                                autocomplete="off"
                                required
                            />
                        </div>

                        <input type="submit" name="signup" value="Sign Up" class="sign-btn" />

                        <p class="text">
                            By signing up, I agree to the
                            <a href="#">Terms of Services</a> and
                            <a href="#">Privacy Policy</a>
                        </p>
                    </div>
                </form>
            </div>

            <div class="carousel">
                <img src="login.jpg" alt="teacher">
            </div>
        </div>
    </div>
</main>

<!-- Javascript file -->
<script src="login.js"></script>
</body>
</html>

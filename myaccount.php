<?php
session_start();
if (!isset($_SESSION["s_name"])) {
    header("location: login.php");
    exit;
}

// Establish a database connection
$db = mysqli_connect("localhost", "root", "", "car_showroom(2)");

// Check if the form for updating the password is submitted
if (isset($_POST['update_password'])) {
    // Get the new password from the form
    $newPassword = $_POST['new_password'];

    // Hash the new password securely
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    // Update the password in the database
    $userId = $_SESSION["user_id"];
    $updateQuery = "UPDATE customer SET pass = '$hashedPassword' WHERE c_id = $userId";

    if (mysqli_query($db, $updateQuery)) {
        $message = "Password updated successfully!";
        echo "<script type='text/javascript'>alert('$message');</script>";
    } else {
        $message = "Failed to update password: " . mysqli_error($db);
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}

// Fetch user data
$user = $_SESSION["s_name"];
$getUserDataQuery = "SELECT * FROM customer WHERE name = '$user'";
$result = mysqli_query($db, $getUserDataQuery);

if ($result && mysqli_num_rows($result) > 0) {
    $userData = mysqli_fetch_assoc($result);
    // Set the user_id in the session
    $_SESSION["user_id"] = $userData['c_id'];
} else {
    $userData = false;
}
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Car Showroom</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href='http://fonts.googleapis.com/css?family=Patua+One' rel='stylesheet' type='text/css'>
</head>
<body>
    <div class="header">
        <div class="wrap">
            <div class="header-bot">
                <div class="logo">
                    <a href="index.html"><img src="images/logo2.jpg" alt="" style="width: 295px; height: 200px; position: absolute; right: 6%; top: -2%;"></a>
                </div>

                <div class="cart">
                    <div>
                        <h3 style="color: red;"> Welcome <?php echo $_SESSION['s_name']; ?> !!</h3>
                    </div>

                    <div class="menu-main">
                        <ul class="dc_css3_menu">
                            <li class="active"><a href="indexlogin.php">Home</a></li>
                            <li><a href="services.php">Brands</a></li>
                            <li><a href="othercare.php">services</a></li>
                            <li><a href="booking.php">Book</a></li>
                            <li><a href="orders.php">Orders</a></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                        <div class="clear"></div>
                    </div>
                </div>

                <div class="clear"></div>
            </div>
        </div>
    </div>
    <div class="main-content">
    <div class="wrap">
        <div class="main-box">
            <div class="box_wrapper">
                <?php if ($userData): ?>
                    <h1>Welcome to your Account, <?php echo $userData['name']; ?>!</h1>
                    <table class="user-info-table" border="2">
                        <tr>
                            <th>Name:</th>
                            <td><?php echo $userData['name']; ?></td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td><?php echo $userData['email']; ?></td>
                        </tr>
                        <tr>
                            <th>Phone:</th>
                            <td><?php echo $userData['phone']; ?></td>
                        </tr>
                        <tr>
                            <th>Address:</th>
                            <td><?php echo $userData['address']; ?></td>
                        </tr>
                        <tr>
                            <th>Password:</th>
                            <td>**********</td>
                            <td><a href="javascript:void(0);" id="changePasswordBtn">Change Password</a></td>
                        </tr>
                    </table>
                    <br>
                    <form action="myaccount.php" method="post" id="changePasswordForm" style="display: none;">
                        <label for="new_password">New Password:</label>
                        <input type="password" name="new_password" required>
                        <input type="submit" name="update_password" value="Update Password">
                    </form>
                    <script>
                        document.getElementById("changePasswordBtn").addEventListener("click", function() {
                            document.getElementById("changePasswordForm").style.display = "block";
                        });
                    </script>
                <?php else: ?>
                    <h1>User data not found.</h1>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<div class="footer">
    <div class="wrap">
        <div class="footer-top">
            <div class="col_1_of_5 span_1_of_5">
                <div class="footer-grid twitts">
                    <h3>Our Company</h3>
                    <div class="f_menu">
                        <ul>
                            <li>This is a CAR selling dealer</li>
                            <li>Please read our Terms and Conditions </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col_1_of_5 span_1_of_5">
                <div class="footer-grid twitts">
                    <h3>Get in touch</h3>
                    <ul class="follow_icon">
                        <li><a href="https://www.google.com" style="opacity: 1;"><img src="images/follow_icon.png" alt=""></a></li>
                        <li><a href="#" style="opacity: 1;"><img src="images/follow_icon1.png" alt=""></a></li>
                        <li><a href="#" style="opacity: 1;"><img src="images/follow_icon2.png" alt=""></a></li>
                        <li><a href="#" style="opacity: 1;"><img src="images/follow_icon3.png" alt=""></a></li>
                        <li><a href="#" style="opacity: 1;"><img src="images/follow_icon4.png" alt=""></a></li>
                        <li><a href="#" style="opacity: 1;"><img src="images/follow_icon5.png" alt=""></a></li>
                    </ul>
                    <p>+1 111-111-1111</p>
                    <span>support@krupla@gmail.com/span>
                </div>
            </div>

            <div class="clear"></div>
        </div>
    </div>
</div>
</body>
</html>

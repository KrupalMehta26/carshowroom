<?php
session_start();

if (!isset($_SESSION["s_name"])) {
    header("location: login.php");
    exit;
}

// Database connection parameters
$host = "localhost";
$username = "root";
$password = "";
$database = "car_showroom(2)";

// Create a database connection
$conn = new mysqli($host, $username, $password, $database);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user data based on username
$username = $_SESSION["s_name"];
$sql = "SELECT * FROM customer WHERE name = '$username'";
$result = $conn->query($sql);

$userData = null;

if ($result->num_rows > 0) {
    $userData = $result->fetch_assoc();
}

$conn->close();
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





    <div class="header-bottom">
	<div class="wrap">
		<div class="single">
				<div class="heading">
				<h3>Car Wash</h3>
				<p class="jumbotron"> <div class="header-bottom">
	<div class="wrap">
		<div class="single">
				<div class="heading">
				<p class="jumbotron"> car showroom, we understand that your car is more than just a mode of transportation;
                     it's an investment that deserves the best care and attention. Our Car Wash Services are designed to keep your vehicle looking its absolute best,
                      both inside and out.</p>
			</div>:</p>
		</div>
    </div>
</div>
<div class="heading">
<h3>why car showroom for wash car service</h3>
<p class="jumbotron"> <li><b>Expertise:</b> Our skilled technicians are passionate about cars.
 They know every nook and cranny of your vehicle, ensuring a thorough and gentle wash.</li>
<li><b>Quality Products:</b> We use only the finest car care products that are safe for your vehicle's finish. Our eco-friendly cleaning solutions leave no harmful residue behind.</li>
<li><b>Convenience:</b> We know your time is precious. With our efficient service, you can have your car sparkling clean while you relax or explore our showroom.</li>
<li><b>Personalized Care:</b> Your car is unique, and so are your preferences. We offer a range of wash options, from a quick exterior wash to a full interior and exterior detailing.</li></p>
			</div>:</p>
</div>
<div class="container">
                          <div class="row"> 

                            <div class="col-sm-4">
                            </div>

                            <div class="col-sm-4">
                               <?php
                                if(isset($_SESSION['s_name']))
                                {
                                echo '<a href="appointmentservice.php" class="btn btn-primary" style="padding-left: 110px;">
                                <h3>BOOK THE CARWASH</h3>
                            </a>';
                                }else
                                {
                                  echo '<a href="login.php" class="btn btn-primary" style =" padding-left: 110px;"><h3>BOOK THE CAR</h3> </a>';  
                                }
                                ?>
                            </div>

                            <div class="col-sm-4">       
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
                        <span>support@Krupla_gmail.comS</span>
                    </div>
                </div>

                <div class="clear"></div>
            </div>
        </div>
    </div>
</body>
</html>

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
				<h3>Car Repair</h3>
				<p class="jumbotron"> <div class="header-bottom">
	<div class="wrap">
		<div class="single">
				<div class="heading">
				<p class="jumbotron"> Our Car Repair Service is designed to keep your vehicle running smoothly and safely
                    . Whether you're dealing with minor issues or major repairs, our experienced team of technicians 
                    is here to help. We specialize in diagnosing and fixing a wide range of automotive problems..</p>
			</div>:</p>
		</div>
    </div>
</div>
<div class="heading">
<h3>why car showroom for Repair car service</h3>
<p class="jumbotron"> <li>Comprehensive vehicle diagnostics</li>
        <li>Skilled and certified mechanics</li>
        <li>Use of genuine replacement parts</li>
        <li>Timely and efficient repairs</li>
        <li>Competitive pricing</li>
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
                                <h3>BOOK THE APPOINTMENT</h3>
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
                        <span>support@autoexpress.com</span>
                    </div>
                </div>

                <div class="clear"></div>
            </div>
        </div>
    </div>
</body>
</html>

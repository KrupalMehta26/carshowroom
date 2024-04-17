
<?php
session_start();
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
                            <li><a href="myaccount.php">My Account</a></li>
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
		   <div class="box_wrapper"><h1>Car Brand </h1></div>
			<div class="section group">
			
				<div class="col_1_of_4 span_1_of_4">
					<img src="images/Toyota.jpg" alt="" style="width: 400px; height: 210px;"/>
					<div class="grid_desc">
						<p class="title">TOYOTA</p>
					</div>
					<div class="Details">
				     <a href="toyota.php" title=" TOYOTA" class="button">cars<span></span></a></div>
				</div>
				
				
				 <div class="col_1_of_4 span_1_of_4">
					<img src="images/audi.jpg" alt="" style="width: 375px; height: 210px;"/>
					<div class="grid_desc">
						<p class="title">AUDI</p>
					</div>
					<div class="Details">
				     <a href="audi.php" title="AUDI" class="button">cars<span></span></a></div>
				</div>
				
				
				 <div class="col_1_of_4 span_1_of_4">
					<img src="images/bmw.jpg" alt="" style="width: 375px; height: 210px;"/>
					<div class="grid_desc">
						<p class="title">BMW</p>
					</div>
					<div class="Details">
				     <a href="bmw.php" title="BMW" class="button">cars<span></span></a></div>
				</div>
				
				
				 <div class="col_1_of_4 span_1_of_4">
					<img src="images/Chevrolet.jpg" alt="" style="width: 375px; height: 210px;"/>
					<div class="grid_desc">
						<p class="title">CHEVROLET</p>
					</div>
					<div class="Details">
				     <a href="chervolet.php" title="CHEVROLET" class="button">cars<span></span></a></div>
				</div>
				
				
				<div class="clear"></div>
			</div>

			
		</div>
	</div>
</div>

<div>
    <a href="services.php" style="border: 1px black solid; margin-left: 65px;"> <b>Click here for more brands ...</b></a>
</div>



<div class="main-content">
	<div class="wrap">
		<div class="main-box">
		   <div class="box_wrapper"><h1>Other care by us </h1></div>
			<div class="section group">
			
				<div class="col_1_of_4 span_1_of_4">
					<img src="images/Services/car-wash.png" alt="" style="width: 230px; height: 210px;"/>
					<div class="grid_desc">
						<p class="title">Wash</p>
					</div>
					<div class="Details">
				     <a href="wash.php" title="Car Wash" class="button">Car-Wash<span></span></a></div>
				</div>
				
				
				 <div class="col_1_of_4 span_1_of_4">
					<img src="images/Services/car (1).png" alt="" style="width: 230px; height: 200px;"/>
					<div class="grid_desc">
						<p class="title">Modification</p>
					</div>
					<div class="Details">
				     <a href="modification.php" title="Modification" class="button">cars-Modification<span></span></a></div>
				</div>
				
				
				 <div class="col_1_of_4 span_1_of_4">
					<img src="images/Services/car-engine.png" alt="" style="width: 230px; height: 210px;"/>
					<div class="grid_desc">
						<p class="title">Repair</p>
					</div>
					<div class="Details">
				     <a href="repair.php" title="Repair" class="button">Repair<span></span></a></div>
				</div>

                <div class="col_1_of_4 span_1_of_4">
					<img src="images/Services/feedback.avif" alt="" style="width: 230px; height: 210px;"/>
					<div class="grid_desc">
						<p class="title">feedback</p>
					</div>
					<div class="Details">
				     <a href="feedback.php" title="feedback" class="button">feedback<span></span></a></div>
				</div>
				
				
				<div class="clear"></div>
			</div>

			
		</div>
	</div>
</div>
<div>
    <a href="othercare.php" style="border: 1px black solid; margin-left: 65px;"> <b>Click here for more more ...</b></a>
</div>






    <br><br>

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
                        <span>KRUPAL_MEHTA<BR>ISHIT_VAGHELA<BR>KISHAN_HADGALA</span>
                    </div>
                </div>

                <div class="clear"></div>
            </div>
        </div>
    </div>
</body>
</html>

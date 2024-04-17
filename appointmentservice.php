<?php
// Connect to the MySQL database (update with your credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "car_showroom(2)";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables to store user input
$s_name = ""; // Session's username
$service_type = "";
$appointment_date = "";
$message = "";

// Check if the session is started and s_name is set
session_start();
if (isset($_SESSION["s_name"])) {
    $s_name = $_SESSION["s_name"];
} else {
    // Redirect to the login page if the session username is not set
    header("location: login.php");
    exit;
}

// Check if the form has been submitted
// Check if the form fields are set in $_POST
if (isset($_POST['servicetype']) && isset($_POST['dateandtime'])) {
    // Get user input
    $service_type = $_POST['servicetype'];
    $appointment_date = $_POST['dateandtime'];

    // Insert data into the table using the customer_id (replace $s_name with the actual customer_id)
    $sql = "INSERT INTO serviceappointments (username, service_type, appointment_date) VALUES ('$s_name', '$service_type', '$appointment_date')";

    if ($conn->query($sql) === TRUE) {
        $message = "Appointment booked successfully.";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    $message = "Please fill out all the form fields.";
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Book Appointment</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<div class="header">    
<div class="wrap"> 
    <div class="header-bot">
         <div class="logo">
             <a href="index.html"><img src="images/logo2.jpg" alt="" style="width: 295px; height: 200px; position: absolute; right: 6%; top: -2%;"></a>
         </div>
         
         <div class="cart">
            
        
            <div class="menu-main">
            
               <ul class="dc_css3_menu">
                     <li class="active"><a href="indexlogin.php">Home</a></li>
                    <li><a href="services.php">Brands</a></li>
                    <li><a href="othercare.php">Services</a></li>
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
        <div class="page-not-found">
            <div class="text-center">
                <h2>Book an Appointment</h2>
                <form action="#" method="POST">
                <label for="username">Username:</label>
                <input type="text" name="username" value="<?php echo $s_name; ?>" readonly><br><br>
                <label for="servicetype">Service Type:</label>
                <select name="servicetype" id="service_type">
                    <option value="car wash">Car Wash</option>
                    <option value="car repair">Car Repair</option>
                    <option value="car modification">Car Modification</option>
                </select><br><br>

                <label for="dateandtime">Appointment Date and Time:</label>
                <input type="datetime-local" name="dateandtime" required><br><br>

                <input type="submit" value="Book Appointment">
                </form>
            </div>
        </div>
    </div>
</div>
<p><?php echo $message; ?></p>
    
<div class="footer">
    <div class="wrap">
       <div class="footer-top">                
                <div class="col_1_of_5 span_1_of_5">
                    <div class="footer-grid twitts">
                    <h3>Our Company</h3>
                        <div class="f_menu">
                             <ul>
                                  <li>This is a CAR selling dealer</li>
                                  <li>Please read our Terms and Conditions</li>
                             </ul>
                        </div>
                   </div>
                </div>
                
                <div class="col_1_of_5 span_1_of_5">
                    <div class="footer-grid twitts">
                        <h3>Get in touch</h3>
                        <ul class="follow_icon">
                            <li><a href="#" style="opacity: 1;"><img src="images/follow_icon.png" alt=""></a></li>
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

<?php
$conn->close();
?>

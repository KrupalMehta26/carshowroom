<?php
// Start a session (make sure this is the very first thing in your PHP code)
session_start();

// Check if the user is not logged in and redirect to the login page
if (!isset($_SESSION["s_name"])) {
    header("location: login.php");
    exit;
}
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$database = "car_showroom(2)";

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// If the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $website = $_POST["website"];
    $subject = $_POST["subject"];

    // Insert data into the database
    $sql = "INSERT INTO feedback (name, email, website, subject) VALUES ('$name', '$email', '$website', '$subject')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Feedback submitted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Fetch feedback data from the database
$feedbackData = array();
$sql = "SELECT * FROM feedback";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $feedbackData[] = $row;
    }
}

// Close the database connection
$conn->close();
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Feedback</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<div class="header">	
    <div class="wrap"> 
        <div class="header-bot">
             <div class="logo">
                 <a href="index.php"><img src="images/logo2.jpg" alt="" style="width: 295px; height: 200px; position: absolute; right: 6%; top: -2%;"></a>
             </div>
             <div class="cart">
                <ul class="ph-no">
                    <li class="item  first_item">
                        <div class="item_html">
                            <span class="text1">feedback</span>
                            <span class="text2">+800-0005-5289</span>
                         </div>
                    </li>
                </ul>
                <div id="top-search">
                    <form method="get" action="http://livedemo00.template-help.com/jigoshop_45422/">
                      <input type="text" name="s" class="input-search"><input type="submit" value="Search" id="submit">
                    </form>
                </div>
                <div class="menu-main">
                   <ul class="dc_css3_menu">
                         <li class="active"><a href="index.php">Home</a></li>
                         <li><a href="about.html">About</a></li>
                         <li><a href="services.php">Services</a></li>
                         <li><a href="othercare.php">services</a></li>
                         <li><a href="contact.html">Contact</a></li>
                    </ul>
                 <div class="clear"></div>
                </div>                
            </div>    
            <div class="clear"></div> 
           </div>
          </div>    
    </div>
</div>

<div class="wrap">
    <div class="team">
        <h2>Feedback Form</h2>
        <form method="post" action="feedback.php">
            <p>
                <label for="name">Name</label>
                <span>*</span>
                <input type="text" name="name" id="name" required>
            </p>
            <p>
                <label for="email">Email</label>
                <span>*</span>
                <input type="email" name="email" id="email" required>
            </p>
            <p>
                <label for="website">Website</label>
                <input type="text" name="website" id="website">
            </p>
            <p>
                <label for="subject">Subject</label>
                <span>*</span>
                <textarea name="subject" id="subject" required></textarea>
            </p>
            <p>
                <input type="submit" value="Submit">
            </p>
        </form>
    </div>

    <div class="team">
        <h2>Feedback Data</h2>
        <table class="table table-bordered">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Website</th>
                <th>Subject</th>
            </tr>
            <?php
            foreach ($feedbackData as $feedback) {
                echo "<tr>";
                echo "<td>" . $feedback["name"] . "</td>";
                echo "<td>" . $feedback["email"] . "</td>";
                echo "<td>" . $feedback["website"] . "</td>";
                echo "<td>" . $feedback["subject"] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</div>

<div class="footer">
    <div class="wrap">
        <div class="footer-top">
            <!-- Footer content goes here -->
        </div>
    </div>
</div>
</body>
</html>

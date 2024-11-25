
<?php
session_start();
include('dbconnect.php');

// Ensure user is logged in
if (!isset($_SESSION['uid'])) {
    header('Location: index.php');
    exit();
}

// Retrieve the logged-in user's ID
$uid = $_SESSION['uid'];

// Fetch the Transaction ID (tr_id) from customer_order
$sql = "SELECT tr_id FROM customer_order WHERE uid = '$uid' ORDER BY order_date DESC LIMIT 1";
$run_query = mysqli_query($conn, $sql);

if ($run_query && mysqli_num_rows($run_query) > 0) {
    // Fetch the transaction ID
    $row = mysqli_fetch_assoc($run_query);
    $tr_id = $row['tr_id'];
} else {
    // Handle case where no transaction is found
    $tr_id = "N/A";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Order Success</title>
    <link rel="icon" href="assets/images/logo1.png" type="image/jpeg"> 
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-3.3.6-dist/css/bootstrap.css">
    <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
    <style>
       /* Ensure body doesn't have margin or padding */
body {
    margin: 0; /* Remove any default margin */
    padding: 0; /* Remove any default padding */
    font-family: 'Abel', sans-serif;
    color: #5b4b40;
     color: #5b4b40;background-color: #fff5f8; /* Background color for the entire page */
}

/* Ensure the content section takes up the full viewport height */
.content {
    background-color: #fff5f8; /* Background color */
    min-height: 100vh; /* Ensure it takes up the full height of the page */
    display: none; /* Hide content initially */
    font-family: 'Abel', sans-serif;
    padding-bottom: 0; /* Remove extra space at the bottom */
}

/* Loader styles */
.preload {
    background-color:white;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999;
}

.preload img {
    width: 120px;
    height: 120px;
}

/* Panel styling */
.panel {
    background: linear-gradient(135deg, #ff85a1, #ffb3c6);
    padding: 25px;
    border-radius: 15px;
    color: #fff;
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
    transition: transform 0.2s, box-shadow 0.2s;
    font-family: 'Abel', sans-serif;
}

.panel:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
}

/* Button styling */
.btn {
    border-radius: 25px;
    font-family: 'Abel', sans-serif;
    font-size: 18px;
    padding: 5px 20px;
    text-transform: uppercase;
    transition: background-color 0.3s, transform 0.2s;
}

.btn-success {
    background-color: #ff85a1;
    border: none;
    color: #fff;
}

.btn-success:hover {
    background-color: #ff6589;
    transform: scale(1.05);
}

/* Navbar styling */
.navbar {
    color: #5b4b40;
    background-color: #f9c8d6;
    border: none;
    border-radius: 0;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    padding: 8px 0;
    border-bottom: 3px solid #e6a3b5;
    font-family: 'Abel', sans-serif;
}

.navbar-brand {
    color: #fff !important;
    font-weight: bold;
    text-transform: uppercase;
    font-size: 20px;
    letter-spacing: 1px;
}

.navbar-brand:hover {
    color: #ffe6f0 !important;
}

.navbar-logo {
    height: 40px;
    width: auto;
}

/* Align the "Hello" message to the right */
.navbar-right {
    float: left;
    color: #5b4b40;
}

.navbar-nav.navbar-right {
    float: right;
    margin-right: 0px;
}
    </style>
</head>
<body>
    <!-- Loader -->
    <div class="preload">
        <img src="assets/images/new-loading.gif" alt="Loading...">
    </div>

    <!-- Main Content -->
    <div class="content">
        <!-- Navbar from the first file -->
      <!-- Navbar from the first file -->
<div class="navbar navbar-default navbar-fixed-top" id="topnav">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="index.php" class="navbar-brand">
                <img src="assets/images/logo2.jpg" alt="Curlytops Logo" class="navbar-logo">
            </a>
        </div>
        <!-- Make sure this part is after navbar-header to move it to the right -->
        <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="glyphicon glyphicon-user"></span> Hello, <?php echo htmlspecialchars($_SESSION['uname']); ?>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
        <br><br><br><br><br>
        <div class='container-fluid'>
            <div class='row'>
                <div class='col-md-2'></div>
                <div class='col-md-8'>
                    <div class="panel panel-default">
                        <div class="panel-heading"><h1>Thank you!</h1></div>
                        <div class="panel-body">
                            <p>Hello <?php echo htmlspecialchars($_SESSION['uname']); ?>, your Cash on Delivery order is successful.</p>
                            <p>Your Transaction ID is <strong><?php echo htmlspecialchars($tr_id); ?></strong></p>
                            <p>You can continue with your shopping.</p>
                            <a href="profile.php" class='btn btn-success btn-lg'>Back to store</a>
                        </div>
                    </div>
                </div>
                <div class='col-md-2'></div>
                
            </div>
        </div>
        
	<?php include 'includes/footer.php'; ?>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="assets/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
    <script>
        // Show the loader and fade into content
        $(document).ready(function () {
            $(".preload").fadeOut(3000, function () {
                $(".content").fadeIn(500);
            });
        });
    </script>
</body>
</html>

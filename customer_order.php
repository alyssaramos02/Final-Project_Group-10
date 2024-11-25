<?php
session_start();
include('dbconnect.php'); // Ensure this file connects to your database.

// Check if the user is logged in
if (!isset($_SESSION['uid'])) {
    header('Location: index.php');
    exit();
}

$uid = $_SESSION['uid'];

// Secure the SQL query to prevent SQL injection
$sql = "SELECT * FROM customer_order WHERE uid = ? ORDER BY p_status ASC, order_date DESC"; // Order by status and then date
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, 'i', $uid);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Order Tracking - Curlytops</title>
    <link rel="stylesheet" href="assets/bootstrap-3.3.6-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css"> 
    <link rel="icon" href="assets/images/logo1.png" type="image/jpeg"> 
    <style>
        body {
            margin-top: 60px;
            background-color: #f8f9fa;
        }

        .navbar {
            margin-bottom: 20px;
        }

        h2 {
            margin-bottom: 30px;
            font-family: Arial, sans-serif;
            color: #e6a3b5; /* Pink color for the heading */
        }

        .table {
            margin-top: 30px;
            border: 1px solid #e6a3b5; /* Pink border around the table */
        }

        .table th, .table td {
            text-align: center;
            padding: 12px;
            vertical-align: middle;
        }

        .table thead {
            background-color: #e6a3b5; /* Pink header background */
            color: white;
        }

        /* Grouping colors */
        .group-pending {
            background-color: #f8e1e6; /* Light pink for pending */
        }

        .group-completed {
            background-color: #f4b8d4; /* Darker pink for completed */
        }

        .group-canceled {
            background-color: #e6a3b5; /* Pink for canceled */
        }

        .no-orders {
            text-align: center;
            color: #e6a3b5; /* Pink color for no orders message */
            font-size: 18px;
            margin-top: 50px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .alert-info {
            background-color: #f8e1e6; /* Light pink background for no orders alert */
            border-color: #e6a3b5; /* Pink border for alert box */
            color: #e6a3b5; /* Pink text color */
        }

        .label {
            padding: 5px 10px;
            font-size: 14px;
            border-radius: 5px;
        }

        .label-warning {
            background-color: #f8c3d2; /* Light pink for pending */
        }

        .label-success {
            background-color: #f4b8d4; /* Darker pink for completed */
        }

        .label-danger {
            background-color: #e6a3b5; /* Pink for canceled */
        }

        .label-default {
            background-color: #f8e1e6; /* Default light pink for other statuses */
        }

        .navbar-logo {
            height: 45px; /* Adjust height as needed */
            width: auto; /* Automatically adjust width to maintain aspect ratio */
        }

        .navbar-header {
            display: flex;
            justify-content: space-between;
            width: 100%;
        }

        .navbar-nav {
            margin-left: auto; /* This ensures that the menu items align to the right */
            padding-right: 15px; /* Adds space to the right side */
        }
    </style>
</head>
<body>

    <div class="navbar navbar-default navbar-fixed-top" id="topnav">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="index.php" class="navbar-brand">
                    <img src="assets/images/logo2.jpg" alt="Curlytops Logo" class="navbar-logo">
                </a>
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
    </div>

    <div class="container">
        <br>
        <h2>Track Your Orders</h2>

        <?php if (mysqli_num_rows($result) > 0): ?>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Transaction ID</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th>Order Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $previous_status = ''; // To track the previous group status and alternate colors
                    while ($row = mysqli_fetch_assoc($result)):
                        $status = strtolower($row['p_status']); // Get status in lowercase
                        $group_class = 'group-' . $status; // Class name for the group
                    ?>
                        <tr class="<?php echo $group_class; ?>">
                            <td><?php echo htmlspecialchars($row['tr_id']); ?></td>
                            <td><?php echo htmlspecialchars($row['p_name']); ?></td>
                            <td>Php <?php echo number_format($row['p_price'], 2); ?></td>
                            <td><?php echo htmlspecialchars($row['p_qty']); ?></td>
                            <td>
                                <span class="label <?php echo getStatusClass($row['p_status']); ?>">
                                    <?php echo htmlspecialchars($row['p_status']); ?>
                                </span>
                            </td>
                            <td><?php echo htmlspecialchars($row['order_date']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="alert alert-info no-orders">
                You have no orders yet.
            </div>
        <?php endif; ?>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="assets/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
</body>
</html>

<?php
// Helper function to return the appropriate label class based on order status
function getStatusClass($status) {
    switch (strtolower($status)) {
        case 'pending':
            return 'label-warning';
        case 'completed':
            return 'label-success';
        case 'canceled':
            return 'label-danger';
        default:
            return 'label-default';
    }
}
?>

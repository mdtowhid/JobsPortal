<?php 
include '../Classes/admin.php';
session_start();
if($_SESSION['AdminId'] == null){
    header("Location: ./login.php");
}
$companyId = $_SESSION['AdminId'];
$admin = new Admin();

if (isset($_GET['logout'])) {
    $admin->logOut();
}
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
    <title>Admin</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../Assets/bootstrap.min.css">
    <link rel="stylesheet" href="../Assets/styles.css">
    <script src="../Scripts/jquery-3.3.1.min.js"></script>
    <script src="../Scripts/bootstrap.min.js"></script>
    <script src="../Scripts/scripts.js"></script>
</head>
<body>
<div class="container-fluid fix">
    <div class="row fix">
        <div class="left fix">
            <ul class="list-items">
                <li style="padding: 5px; height: 60px; overflow: hidden; cursor: pointer;">
                    <div style="width: 25%; float: left">
                        <img src="<?php echo $_SESSION['ImageUrl'] ?>" style="width: 50px; height: 50px">
                    </div>
                    <div style="width: 75%; float: left">
                        <h5 style="line-height: 52px; color: green;"><?php echo $_SESSION['FirstName'] . ' ' . $_SESSION['LastName'] ?></h5>
                    </div>
                </li>
                <li><h3><a href="./home.php">Dashboards</a></h3></li>
                <li><a href="./admins.php">Admins</a></li>
                <li><a href="./add-categories.php">Add Job Categories</a></li>
                <li><a href="./companies.php">Companies</a></li>
                <li><a href="./messages.php">Messages</a></li>
                <li><a href="./job-seekers.php">Job Seekers</a></li>
                <li><a href="?logout=logout">Log Out</a></li>
            </ul>
        </div>


    
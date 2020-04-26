<?php 
include_once './file-path.php';

?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>ICT Jobs</title>
    <link rel="stylesheet" href="./Assets/bootstrap.min.css">
    <link rel="stylesheet" href="./Assets/styles.css">
    <script src="./Scripts/jquery-3.3.1.min.js"></script>
    <script src="./Scripts/bootstrap.min.js"></script>
    <script src="./Scripts/scripts.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>

<div class="wrapper">
    <nav style="background: #1DBFAF">
        <div class="nv-left">
            <ul class="menu">
                <li>
                    <a href="./index.php"><i class="fa fa-home" id="faHome"></i> ICT Jobs</a>
                </li>
            </ul>
        </div>      
        <div class="nv-right">
            <ul class="menu">
                <li>
                    <input type="text" id="searcBoxId" class="form-control search-box" placeholder="Search jobs...">
                </li>
                <li class="signup-btn">Sign Up/Login</li>
            </ul>
        </div>
    </nav>
</div>
<div class="container">
    <div class="custom-modal">
        <h4 class="text-muted text-center" style="margin-bottom: 20px;"><b>C</b>reate an account.</h4>
        <div class="alert alert-info">
            <a href="myjobs/sign-up.php">Create Account as a Seeker</a> 
            <br>
            or
            <br>
            <a href="myjobs/log-in.php">Log In</a>
        </div>
        <hr>
        <div class="alert alert-primary">
            <a href="companies/sign-up.php">Create Account as a Employeer</a>
            <br>
            or
            <br>
            <a href="companies/log-in.php">Log In</a>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="search-result">
                <div class="search-result-cancel-btn"><b>&times;</b></div>
                <div class="search-result-content">

                </div>
            </div>
        </div>
    </div>
</div>





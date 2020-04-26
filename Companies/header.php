<?php 
session_start();
if($_SESSION['CompanyId'] == null){
    header("Location: ./log-in.php");
}
$companyId = $_SESSION['CompanyId'];

include_once './file-path.php';
$company = new Company();
$gateway = new Gateway();

$thisCompany = $gateway->getCompanyDetailsById($companyId);

if(isset($_GET['logout'])){
    $gateway->logOut();
}
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
    <title>ICT Jobs</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../Assets/bootstrap.min.css">
    <link rel="stylesheet" href="../Assets/styles.css">
    <script src="../Scripts/jquery-3.3.1.min.js"></script>
    <script src="../Scripts/bootstrap.min.js"></script>
    <script src="../Scripts/scripts.js"></script>
</head>
<body id="companyBodyId" >

<div class="wrapper">
    <nav id="companyNavId">
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
                    <a href="#">
                        <span><b>
                            <img class="comany-logo" src="<?php echo $thisCompany['LogoPath'] ?>" alt="">
                            <?php echo $thisCompany['CompanyName'] ?>
                        </b></span></a>

                    <ul class="nv-drop">
                        <li><a href="./my-profile.php">My Profile</a></li>
                        <li><a href="./edit-profile.php">Edit Profile</a></li>
                        <li><a href="./contact-admin.php">Contact with admin</a></li>
                        
                        <li>
                            <a href="?logout=logout">Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</div>

<div class="container margin-top20px resonsiveConditions">
    <div class="row">
        <div class="col-md-3" id="comapanyDashboards">
            <ul class="list-group cmp-menu">
                <li class="list-group-item active">
                    Dashboards
                </li>
                <li class="list-group-item"><a href="./index.php">Home</a></li>
                <li class="list-group-item"><a href="./add-new-job.php">Post New Job</a></li>
                <li class="list-group-item">
                    <a href="./eligibled-seekers.php">Eligibled Seekers</a>
                </li>
                <li class="list-group-item"><a href="./messages.php">Messages</a></li>
                <li class="list-group-item"><a href="./reviews.php">Reviews</a></li>
            </ul>
        </div>

<?php 
include_once './file-path.php';
session_start();
if($_SESSION['JobSeekerId'] == null){
    header("Location: ./log-in.php");
}
$seekerId = $_SESSION['JobSeekerId'];
$user = new User();
$gateway = new Gateway();

$jobSeeker = $user->getUserById($seekerId);

$eligibledSeeker = $user->getEligibledSeekerById($seekerId);


//get New Job By Max Id Column
//$t = $gateway->maxDataColumn();
//$newJob = $gateway->getPostedJobById($t['DataColumn']);
$newJobs = $gateway->getPostedJobsWithLimit();

if (isset($_GET['logout'])) {
    $gateway->logOut();
}

?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Seeker</title>
    <link rel="stylesheet" href="../Assets/bootstrap.min.css">
    <link rel="stylesheet" href="../Assets/styles.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <script src="../Scripts/jquery-3.3.1.min.js"></script>
    <script src="../Scripts/bootstrap.min.js"></script>
    <script src="../Scripts/scripts.js"></script>
    
    <script src="https://use.fontawesome.com/7799a41c01.js"></script>

</head>
<body>

<div class="wrapper seeker-nav">
    <nav id="seekerNav">
        <div class="nv-left">
            <ul class="menu">
                <li>
                    <a href="./index.php" style="padding: 17px;"><i class="fa fa-home" id="faHome"></i> ICT Jobs</a>
                </li>
            </ul>
        </div>      
        <div class="nv-right">
            <ul class="menu">
                <li>
                    <input type="text" id="searcBoxId" class="form-control search-box" placeholder="Search jobs...">
                </li>
                <li>
                    <a href=""><b>New Job</b></a>
                    <ul class="nv-drop">
                        <?php 
                            while($row = mysqli_fetch_assoc($newJobs)){?>
                                <li><a href="new-job.php?id=<?php echo $row['JobId']; ?>"><?php echo $row['JobTitle']; ?></a></li>
                        <?php
                            }
                        ?>
                       
                        
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <img style="width: 30px; height: 30px;" src="<?php echo $jobSeeker['ImageUrl'] ?>">
                        <span><b>
                            <?php echo $jobSeeker['FirstName'] . ' '.$jobSeeker['LastName']; ?>
                        </b></span></a>

                    <ul class="nv-drop">
                        <li><a href="job-suggestion.php">Suggested Job</a></li>
                        <li><a href="./my-profile.php">My Profile</a></li>
                        <li><a href="./edit-profile.php">Edit Profile</a></li>
                        <li><a href="./cv.php">My CV</a></li>
                        <li>
                            <a href="?logout=logout">Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
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

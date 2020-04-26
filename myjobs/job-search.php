<?php
include_once 'header.php';
include_once './file-path.php';

if($_SESSION['JobSeekerId'] == null){
    header("Location: ./log-in.php");
}
$seekerId = $_SESSION['JobSeekerId'];


$id = $_GET['id'];
$title = $_GET['job-title'];
$gateway = new Gateway();
$queryRes = $gateway->getPostedJobsByCategoryId($id);

?>

<div class="container margin-top20px">
    <div class="row">
        <div class="col-md-12">
                <h2 class="alert">Job Category by <?php echo $title; ?></h2>
                <?php 
                    while($job = mysqli_fetch_assoc($queryRes)){?>
                        <div class="card">
                            <div class="card-body">  
                                <h4 class="card-title"><?php echo $job['JobTitle']; ?></h4>
                                <p class="card-title"><?php echo $job['CompanyName']; ?></p>
                                <p class="card-title"><?php echo $job['JobLocation']; ?></p>
                                <a href="./job-details.php?id=<?php echo $job['JobId'] ?>&& job-title=<?php echo $job['JobTitle']; ?>" class="btn btn-info">More Details</a>
                            </div>
                        </div>
                        <br>
                <?php        
                    }
                ?>

        </div>
    </div>
</div>

<?php include_once './footer.php' ?>

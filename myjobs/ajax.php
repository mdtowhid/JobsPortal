<?php
include_once './file-path.php';

$gateway = new Gateway();

if(isset($_POST['searchString'])){
    $jobs = $gateway->searchJobs($_POST['searchString']);
    while($postedJob = mysqli_fetch_assoc($jobs)){?>
        <div class="card">
            <h4 class="card-header"><?php echo $postedJob['JobTitle'] ?></h4>
            <div class="card-body">
                <h4 class="card-text">Job Context</h4>
                <p class="card-text">
                    <?php echo $postedJob['JobTitle'] ?>
                </p>

                <h4 class="card-text">Vacancy</h4>
                <p class="card-text">
                    <?php echo $postedJob['Vacancy'] ?>
                </p>


                <h4 class="card-text">Employment Status</h4>
                <p class="card-text">
                    <?php echo $postedJob['EmploymentStatus'] ?>
                </p>

                <h4 class="card-text">Job Location</h4>
                <p class="card-text">
                    <?php echo $postedJob['JobLocation'] ?>
                </p>

                <h4 class="card-text">Deadline</h4>
                <p class="card-text">
                    <?php echo $postedJob['DeadLineDate'] ?>
                </p>
                <p class="card-text">
                    <a href="job-details.php?id=<?php echo $postedJob['JobId'] ?>" class="btn btn-info">More Details</a>
                </p>
            </div>
        </div>
        <br>
<?php       
    }
}
?>
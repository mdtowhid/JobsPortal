<?php
    include_once 'header.php';

    if($_SESSION['CompanyId'] == null){
        header("Location: ./log-in.php");
    }
    $companyId = $_SESSION['CompanyId'];

    $jobId = $_GET['jobId'];
    
    $gateway = new Gateway();
    $jobsByCompanyId = $gateway->getPostedJobsByCompanyId($companyId);
    $thisJobDetails = $gateway->getPostedJobById($jobId);

    $company = new Company();
    $appliedSeekers = $company->getSeekersByAppliedJobId($jobId);

?>

<div class="col-md-9">
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    <h4><?php echo $thisJobDetails['JobTitle'] ?></h4>
                </div>
                <div class="card-body">
                    <h5>Job Context</h5>
                    <div class="card-text"><?php echo $thisJobDetails['JobContext'] ?></div>
                    <hr>

                    <h5>Vacancy</h5>
                    <div class="card-text"><?php echo $thisJobDetails['Vacancy'] ?></div>
                    <hr>

                    <h5>Posted Date</h5>
                    <div class="card-text"><?php echo $thisJobDetails['PostedDate'] ?></div>
                    <hr>

                    <h5>Deadline Date</h5>
                    <div class="card-text"><?php echo $thisJobDetails['DeadLineDate'] ?></div>
                    <hr>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <h4 class="alert alert-secondary">Applied Seekers</h4>

            <ul class="list-group">
                <?php 
                    foreach($appliedSeekers as $seeker){?>

                    <div class="card">
                        <div class="card-header">
                            <img class="img-responsive img1" src="<?php echo $seeker['ImageUrl']?>" alt="">
                        </div>
                        <div class="card-body">
                            <div class="card-text">
                                <?php echo $seeker['FirstName'].' '. $seeker['LastName']; ?>
                            </div>
                            <div class="card-text">
                                <?php echo $seeker['Email'] ?>
                            </div>
                            <br>
                            <div class="card-text">
                                <a href="seeker-details.php?seekerId=<?php echo $seeker['JobSeekerId'] ?> && jobId=<?php echo $jobId; ?>" class="btn btn-info">
                                    Details
                                </a>
                            </div>
                        </div>
                    </div>
                    <hr>

                <?php       
                    }
                ?>
            </ul>
        </div>
    </div>
</div>


    </div>
</div>

</body>
</html>
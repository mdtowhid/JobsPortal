<?php

    include_once 'header.php';
    if($_SESSION['CompanyId'] == null){
        header("Location: ./log-in.php");
    }
    $companyId = $_SESSION['CompanyId'];
    $status = '';
    $seekerId = $_GET['seekerId'];
    $jobId = $_GET['jobId'];

    $company = new Company();
    $gateway = new Gateway();
    $user = new User();

    $thisSeeker = $user->getUserById($seekerId);
    if(isset($_POST['submit'])){
        $company->updateEligibleSeeker($_POST);
    }

    //marked ad un-eligible seekers...
    if(isset($_POST['uneligible_submit'])){
        $company->updateEligibledSeeker($_POST);
    }
    $updatedThisSeeker = $company->getAppliedOrEligibleSeekerHistoryBySeekerId($jobId, $seekerId);
?>

<div class="col-md-9">
    <?php
        if($updatedThisSeeker['IsEligible'] == true){?>
            <div class="alert alert-success">
                <?php echo 'This employee was slected as eligible for this job.' ?>
            </div>
    <?php        
        }
    ?>
    <div class="row">
        <div class="col-md-8">
            <embed style="width: 100%; height: 90vh" src="<?php echo $thisSeeker['CVPath'] ?>" type="">
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <figure class="figure seeker-details-card">
                    <img src="<?php echo $thisSeeker['ImageUrl']?>" class="figure-img img-fluid">
                        <figcaption>
                            <h4 class="text-muted"><?php echo $thisSeeker['FirstName'] . ' '. $thisSeeker['LastName'];?></h4>
                        </figcaption>
                    </figure>
                </div>
                <div class="card-body">
                    <p class="card-text">Mail: <?php echo $thisSeeker['Email']?></p>
                    <p class="card-text">Address: <?php echo $thisSeeker['Address']?></p>
                    <p class="card-text">Mobile: <?php echo $thisSeeker['PhoneNo']?></p>
                    
                    <form action="" method="post" onsubmit="return confirm('Are you sure this employee eligible for this Job?')">
                        <input type="text" name="JobId" value="<?php echo $jobId;?>" hidden>
                        <input type="text" name="SeekerId" value="<?php echo $thisSeeker['JobSeekerId']; ?>" hidden>
                        <input type="text" name="CompanyId"  value="<?php echo $companyId; ?>" hidden>
                        <?php 
                            if($updatedThisSeeker['IsEligible'] == true){?>
                                <input type="submit" name="submit" value="Eligibled" class="btn btn-info" style="display: none">
                        <?php
                            }else{?>
                                <input type="submit" name="submit" value="Is Eligible?" class="btn btn-info">
                        <?php
                            }
                        ?>
                    </form>

                    <form action="" method="post" onsubmit="return confirm('Are you sure? you want to make this employee as Un-eligible for this Job?')">
                        <input type="text" name="JobId" value="<?php echo $jobId;?>" hidden>
                        <input type="text" name="SeekerId" value="<?php echo $thisSeeker['JobSeekerId']; ?>" hidden>
                        <input type="text" name="CompanyId"  value="<?php echo $companyId; ?>" hidden>
                        <?php 
                            if($updatedThisSeeker['IsEligible'] == true){?>
                                <input type="submit" name="uneligible_submit" value="Un-Eligible?" class="btn btn-info">
                        <?php
                            }else{?>
                                <input type="submit" name="uneligible_submit" value="Un-Eligible?" class="btn btn-info" style="display: none">
                        <?php
                            }
                        ?>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>














</div>
</div>
</body>
</html>
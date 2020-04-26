<?php
include_once 'header.php';
include_once './file-path.php';

if($_SESSION['JobSeekerId'] == null){
    header("Location: ./log-in.php");
}
$seekerId = $_SESSION['JobSeekerId'];

$id = $_GET['id'];
$status = "";

$gateway = new Gateway();
$postedJob = $gateway->getPostedJobById($id);
$appliedJob = $gateway->getAppliedJobBySeekerId($id, $seekerId);

$thisCompanyId = $postedJob['CompanyId'];

$companyDetails = $gateway->getCompanyDetailsById($thisCompanyId);
//User... company_job_seekers tbl
$eligibledSeeker = $user->getEligibledSeekerById($seekerId);

if(isset($_POST['submit'])){
    $status = $gateway->applyJob($_POST);
    $appliedJob = $gateway->getAppliedJobBySeekerId($id, $seekerId);
}
?>



<div class="container mat margin-top20px">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
            <h4 class="card-header"><?php echo $postedJob['JobTitle'] ?></h4>
                <div class="card-body">
                    <h4 class="card-text">Job Context</h4>
                    <p class="card-text">
                        <?php echo $postedJob['JobContext'] ?>
                    </p>

                    <h4 class="card-text">Vacancy</h4>
                    <p class="card-text">
                        <?php echo $postedJob['Vacancy'] ?>
                    </p>

                    <h4 class="card-text">Job Responsibility</h4>
                    <p class="card-text">
                        <?php echo $postedJob['JobResponsibility'] ?>
                    </p>

                    <h4 class="card-text">Educational Requirments</h4>
                    <p class="card-text">
                        <?php echo $postedJob['EducationalReq'] ?>
                    </p>

                    <h4 class="card-text">Experience Requirments</h4>
                    <p class="card-text">
                        <?php echo $postedJob['ExperienceReq'] ?>
                    </p>

                    <h4 class="card-text">Additional Requirments</h4>
                    <p class="card-text">
                        <?php echo $postedJob['AdditionalReq'] ?>
                    </p>


                    <h4 class="card-text">Employment Status</h4>
                    <p class="card-text">
                        <?php echo $postedJob['EmploymentStatus'] ?>
                    </p>
                    

                    <h4 class="card-text">Job Location</h4>
                    <p class="card-text">
                        <?php echo $postedJob['JobLocation'] ?>
                    </p>

                    <h4 class="card-text">Salary</h4>
                    <p class="card-text">
                        <?php echo $postedJob['Salary'] ?>
                    </p>


                    <h4 class="card-text">Deadline</h4>
                    <p class="card-text">
                        <?php echo $postedJob['DeadLineDate'] ?>
                    </p>

                    <form action="" method="post" onsubmit="return confirm('Are you sure you want to applying for this job?');">
                        <input type="text" name="JobId" value="<?php echo $postedJob['JobId'] ?>" hidden>
                        <input type="text" name="CompanyId" value="<?php echo $postedJob['CompanyId'] ?>" hidden>
                        <!--Replace value with session value-->
                        <input type="text" name="SeekerId" value="<?php echo $seekerId ?>" hidden>
                        <input type="date" name="AppliedDate" value="<?php echo date("Y-m-d"); ?>" hidden>
                        <input type="date" name="AppliedStatus" value="Applied" hidden>
                        
                        <input type="checkbox" name="IsEligible" hidden>
                        <input type="checkbox" name="ActiveStatus" hidden>
                        <?php
                            if($appliedJob['AppliedStatus'] == "Applied"){?>
                                <input type="submit" id="sbmt" name="submit" value="<?php echo $appliedJob['AppliedStatus'] ?>" class="btn btn-success" disabled>
                        <?php
                            }else{?>
                                <?php if($status!=null){?> 
                                    <input type="submit" id="sbmt" name="submit" value="Applied" class="btn btn-success" disabled>
                                <?php } else { ?>
                                    <input type="submit" id="sbmt" name="submit" value="Apply" class="btn btn-success">
                                <?php }?>
                                
                        <?php
                            }
                        ?>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <?php
                if($appliedJob != null){?>
                    <h4 class="alert alert-success">
                        <?php echo $appliedJob['AppliedStatus'] ?>
                    </h4>
                <?php
               
                }                        
            ?>

            <div class="card">
                <div class="card-header">
                    <h5>Company Details</h5>
                </div>
                <div class="card-body">
                    <h4 class="">
                        <?php echo $companyDetails['CompanyName'] ?>
                    </h4>

                    <p class="card-text"><?php echo $companyDetails['Address'] ?></p>
                    <p class="card-text"><?php echo $companyDetails['Email'] ?></p>

                </div>
                <?php
               
                while($seeker = mysqli_fetch_assoc($eligibledSeeker)){
                        $eligibledJobDetails = $gateway->getPostedJobById($seeker['JobId']);
                        if($eligibledJobDetails['JobId'] == $appliedJob['JobId']){?>

                        <h4 class="alert alert-success">
                            You are Eligibled for this job!
                        </h4>
                    <?php
                    
                }}?>
            </div>
        </div>
    </div>
</div>

<?php include_once './footer.php' ?>
</body>
</html>
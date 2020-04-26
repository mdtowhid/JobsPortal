<?php
include_once 'header.php';
include_once './Classes/businessLogic.php';

$id = $_GET['id'];
$status = "";
//$title = $_GET['job-title'];
session_start();
$gateway = new Gateway();
$postedJob = $gateway->getPostedJobById($id);
//$appliedJob = $gateway->getAppliedJobBySeekerId($id, 1);

$thisCompanyId = $postedJob['CompanyId'];

$companyDetails = $gateway->getCompanyDetailsById($thisCompanyId);


if(isset($_POST['submit'])){
    $status = $gateway->applyJob($_POST);
    $appliedJob = $gateway->getAppliedJobBySeekerId($id, 1);
}


?>



<div class="container">
    <div class="row">
        <div class="col-md-8">
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
                </div>
            </div>
        </div>

        <div class="col-md-4">
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
            </div>









        </div>
    </div>
</div>

<?php include_once './footer.php' ?>
</body>
</html>
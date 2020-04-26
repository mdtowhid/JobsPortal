<?php

include_once 'header.php';

if($_SESSION['CompanyId'] == null){
    header("Location: ./log-in.php");
}
$companyId = $_SESSION['CompanyId'];
$statusSession = "";

$status = "";
$gateway = new Gateway();
$jobCategoriesQueryResult = $gateway->getJobCategories();

$company = new Company();

if (isset($_POST['submit'])) {
    $company->addJob($_POST);
    $statusSession = $_SESSION['PostSuccess'];
}

?>

<div class="col-md-9">
            <div class="bodyTop">
                <h3 class="text-center text-muted">Post a New Job</h3>
                <?php
                if ($statusSession != null) {?>
                            <div class="alert alert-success">
                                <?php echo $statusSession ?>
                            </div>
                    <?php
                }
                ?>

            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label>Job Title</label>
                        <input type="text" name="JobTitle" class="form-control" placeholder="Job Title"required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label>Vacancy</label>
                        <input type="number" name="Vacancy" class="form-control" placeholder="Vacancy" required>
                    </div>
                </div>



                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label>Job Context</label>
                        <textarea type="text" name="JobContext" class="form-control" placeholder="Job Context..." required></textarea>
                    </div>
                </div>



                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label>Job Responsibilitis</label>
                        <textarea type="text" name="JobResponsibility" class="form-control" placeholder="Job Responsibilitis..." required></textarea>
                    </div>
                </div>


                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label>Educational Requirments</label>
                        <textarea type="text" name="EducationalReq" class="form-control" placeholder="Educational Requirments" required></textarea>
                    </div>
                </div>


                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label>Experience Requirments</label>
                        <textarea type="text" name="ExperienceReq" class="form-control" placeholder="Experience Requirments" required></textarea>
                    </div>
                </div>



                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label>Additional Requirments</label>
                        <textarea type="text" name="AdditionalReq" class="form-control" placeholder="Additional Requirments" required></textarea>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label>Additional Requirments</label>
                        <textarea type="text" name="AdditionalReq" class="form-control" placeholder="Additional Requirments" required></textarea>
                    </div>
                </div>


                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label>Other Benefits</label>
                        <textarea type="text" name="OtherBenefit" class="form-control" placeholder="Other Benefits" required></textarea>
                    </div>
                </div>

                <div class="form-row">

                    <div class="col-md-4 mb-3">
                        <label>Job Categories</label>
                        <select name="CategoryId" class="form-control" required>
                            <option value="none">-Select Job Category-</option>
                            <?php
while ($jobCategory = mysqli_fetch_assoc($jobCategoriesQueryResult)) {?>
                                        <option value="<?php echo $jobCategory['CategoryId'] ?>"><?php echo $jobCategory['CatgoryName'] ?></option>
                                    <?php
}
?>
                        </select>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Posted Date</label>
                        <input type="date" name="PostedDate" class="form-control" value="<?php echo date("Y-m-d"); ?>" required readonly>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Dead Line Date</label>
                        <input type="date" name="DeadLineDate" class="form-control" placeholder="DeadLine Date" required>
                    </div>

                </div>

                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label>Employment Status</label>
                        <input type="text" name="EmploymentStatus" class="form-control" placeholder="Employment Status" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Job Location</label>
                        <input type="text" name="JobLocation" class="form-control" placeholder="Job Location" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Salary</label>
                        <input type="text" name="Salary" class="form-control" value="Negotiable" placeholder="Salary" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-2 mb-3">
                        <label style="cursor: pointer">
                            <input type="checkbox" name="ActiveStatus" checked hidden>
                        </label>
                        <input type="text" name="CompanyId" class="form-control" placeholder="Company Id" value="<?php echo $thisCompany['CompanyId'] ?>" hidden>
                    </div>
                </div>

                <input name="submit" class="btn btn-primary" type="submit" value="Submit"/>
            </form>
            <br>
            <a href="./index.php" class="btn btn-success">Go to posted jobs</a>
        </div>

</div>
</div>

<?php include_once './footer.php' ?>
</body>
</html>



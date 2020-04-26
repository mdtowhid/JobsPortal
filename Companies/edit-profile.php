<?php
    include_once 'header.php';

    if($_SESSION['CompanyId'] == null){
        header("Location: ./log-in.php");
    }
    $companyId = $_SESSION['CompanyId'];
    $status = '';

    $company = new Company();
    $gateway = new Gateway();
    $thisCompany = $gateway->getCompanyDetailsById($companyId);

    if(isset($_POST['submit'])){
        $status = $company->updateCompany($_POST);
    }

?>


<div class="col-md-9">

    <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <div class="bodyTop">
                    <h3 class="text-center text-muted">Edit Company account.</h3>
                    <?php 
                        if($status != null){?>
                            <h5 class="alert alert-success">
                                <?php echo $status; ?>
                            </h5>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
        <form action="" method="POST" enctype="multipart/form-data" class="">
            <input type="hidden" name="CompanyId" value="<?php echo $companyId ?>">
            <div class="form-row">
                <div class="col-md-6 mb-3">
                <label>Company Name</label>
                <input type="text" name="CompanyName" value="<?php echo $thisCompany['CompanyName'] ?>" class="form-control" placeholder="Company Name"required>
                </div>

                <div class="col-md-6 mb-3">
                <label>Email</label>
                <input type="text" name="Email" value="<?php echo $thisCompany['Email'] ?>" class="form-control" placeholder="Email" required>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-6 mb-3">
                <label>Address</label>
                <input type="text" name="Address" value="<?php echo $thisCompany['Address'] ?>" class="form-control" placeholder="Address" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Phone Number</label>
                    <input id="phnNumb" type="text" name="PhoneNumber" class="form-control"  value="<?php echo $thisCompany['PhoneNumber'] ?>" required>
                    <div class="text-danger"><b id="phnNumbError"></b></div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-12 mb-3">
                <label>Password</label>
                    <input id="password" type="text" name="Password" class="form-control"  value="<?php echo $thisCompany['Password'] ?>" required>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-12 mb-3">
                <label>Confirm Password</label>
                    <input id="confirmPassword" type="text" name="ConfirmPassword" class="form-control"  value="<?php echo $thisCompany['ConfirmPassword'] ?>" required>
                    <div class="text-danger"><b id="notMachedPasswordErrorId"></b></div>
                </div>
            </div>

            <input type="checkbox" name="IsActive" value="true" hidden/>

            <input id="seekerCompanySameSubmitBtnId" name="submit" class="btn btn-success" type="submit" value="Submit"/>
        </form>

    </div>
</div>

    </div>
</div>


</body>
</html>
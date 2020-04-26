<?php
include_once './header.php';
include_once '../Classes/admin.php';
include_once '../Classes/businessLogic.php';
include_once '../Classes/company.php';
$companyId = $_GET['companyId'];

$gateway = new Gateway();
$thisCompany = $gateway->getCompanyDetailsById($companyId);
$admin = new Admin();

if(isset($_POST['submit'])){
    $admin->updateCompanyById($_POST);
    $thisCompany = $gateway->getCompanyDetailsById($companyId);
}


?>


<div class="right">
    <div class="container" style="width: 95%">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="text-muted">
                    <b>Edit</b> <?php echo $thisCompany['CompanyName'] ?>
                </h1>
            </div>
        </div>
        <hr>
        <div class="row" style="margin: 0 auto;">
            <form action="" method="POST" enctype="multipart/form-data" style="width: 100%">
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
                        <input type="text" name="PhoneNumber" value="<?php echo $thisCompany['PhoneNumber'] ?>" class="form-control" placeholder="Phone Number" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-12 mb-3">
                    <label>Password</label>
                        <input type="password" name="Password" value="<?php echo $thisCompany['Password'] ?>" class="form-control" placeholder="Password" required readonly>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-12 mb-3"> 

                        <?php 
                            if($thisCompany['IsActive'] == 1){?>
                                <input type="checkbox" value="<?php echo $thisCompany['IsActive']?>" name="IsActive" checked> Active
                        <?php
                            }else{?>
                            <input type="checkbox" value="<?php echo $thisCompany['IsActive']?>" name="IsActive">  Inactive
                        <?php
                            }
                        ?>
                        

                    </div>
                </div>

                <input name="submit" class="btn btn-success" type="submit" value="Update"/>
            </form>
        </div>
    </div>
</div>




<?php
include_once './footer.php';
?>
</body>
</html>
</body>
</html>

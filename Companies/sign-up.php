<?php
include_once './file-path.php';
$status = "";

$company = new Company();
if (isset($_POST['submit'])) {
    $status = $company->createAccount($_POST);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../Assets/bootstrap.min.css">
    <link rel="stylesheet" href="../Assets/styles.css">
    <script src="../Scripts/jquery-3.3.1.min.js"></script>
    <script src="../Scripts/scripts.js"></script>
    <title>Create Company Account</title>
    <style>
        body{
            background: #fbfbfb;
        }
    </style>
</head>
<body>
    <div class="container"><a href="#" onclick="window.history.back();" class="btn btn-info go-back-btn">Go Back</a>
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <div class="bodyTop">
                    <h3 class="text-center text-muted">Create Company account.</h3>
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
        <form action="" method="POST" enctype="multipart/form-data" class="accForm">
            <div class="form-row">
                <div class="col-md-6 mb-3">
                <label>Company Name</label>
                <input type="text" name="CompanyName" class="form-control" placeholder="Company Name"required>
                </div>

                <div class="col-md-6 mb-3">
                <label>Email</label>
                <input type="text" name="Email" class="form-control" placeholder="Email" required>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-6 mb-3">
                <label>Address</label>
                <input type="text" name="Address" class="form-control" placeholder="Address" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Phone Number</label>
                    <input id="phnNumb" type="text" name="PhoneNumber" class="form-control" placeholder="Phone Number" required>
                    <div class="text-danger"><b id="phnNumbError"></b></div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-12 mb-3">
                <label>Password</label>
                    <input id="password" type="password" name="Password" class="form-control" placeholder="Password" required>
                </div>
            </div>

            

            <div class="form-row">
                <div class="col-md-12 mb-3">
                <label>Confirm Password</label>
                    <input id="confirmPassword" type="password" name="ConfirmPassword" class="form-control" placeholder="Confirm Password" required>
                    <div class="text-danger"><b id="notMachedPasswordErrorId"></b></div>
                </div>
            </div>


            <div class="form-row">
                <div class="col-md-12">
                    <label>Choose Logo</label>
                    <input type="file" name="ImageUrl" class="form-control" required>
                </div>
            </div>

            <input type="checkbox" name="IsActive" value="true" hidden/>
            <br>

            <input id="seekerCompanySameSubmitBtnId" name="submit" class="btn btn-success btn-sm" type="submit" value="Submit"/>
        </form>
    </div>
</body>
</html>



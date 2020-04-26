<?php
include_once 'file-path.php';
$status = "";
$user = new User();
$statusClass = "";

if(isset($_POST['submit'])){
    $status = $user->addUser($_POST);
    $statusClass = $_SESSION['ErrorClass'];
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
    <title>Create Seeker Account</title>
    <style>
        body{
            background: #fbfbfb;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="#" onclick="window.history.back();" class="btn btn-info go-back-btn">Go Back</a>
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <div class="bodyTop">
                    <h3 class="text-center text-muted">Create Seeker account.</h3>
                    <?php 
                        if($status != null){?>
                            <h5 class="<?php if($statusClass != null){ echo $statusClass;} ?>">
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
                <label>First Name</label>
                <input type="text" name="FirstName" class="form-control" placeholder="First Name"required>
                </div>

                <div class="col-md-6 mb-3">
                <label>Last Name</label>
                <input type="text" name="LastName" class="form-control" placeholder="Last name" required>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-6 mb-3">
                <input type="text" name="FatherName" hidden>
                </div>

                <div class="col-md-6 mb-3">
                <input type="text" name="MotherName" hidden>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-6 mb-3">
                <label>Email</label>
                <input type="text" name="Email" class="form-control" placeholder="Email" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Phone Number</label>
                    <input id="phnNumb" type="text" name="PhoneNo" class="form-control" placeholder="Phone Number" required>
                    <div class="text-danger"><b id="phnNumbError"></b></div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-12 mb-3">
                <label>Address</label>
                <textarea name="Address" class="form-control" placeholder="Address" required></textarea>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-12 mb-3">
                <label>NID Number</label>
                <input name="NIDNumber" id="nidNumberId" class="form-control" placeholder="NID Number" required>
                <div class="text-danger"><b id="nidNumberErrorId"></b></div>
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
                <div class="col-md-5 mb-3">
                <label>Choose Image</label>
                <input type="file" name="ImageUrl" class="form-control" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label>Date</label>
                    <input type="date" name="CreationDate" class="form-control" value="<?php echo date("Y-m-d")?>" readonly/>
                </div>

                <div class="col-md-3 mb-3">
                    <label class="label-control">Gender</label>
                    <br>
                    <input type="radio" name="Gender" class="radio" value="Male" checked  required/> Male
                    <input type="radio" name="Gender" class="radio" value="Female"  required/> Female
                </div>
                
            </div>
            <input type="checkbox" name="ActiveStatus" value="true" hidden/>
            
            <input type="checkbox" name="CVPath" value="true" hidden/>

            <input id="seekerCompanySameSubmitBtnId" name="submit" class="btn btn-primary" type="submit" value="Submit"/>
        </form>
    </div>
</body>
</html>



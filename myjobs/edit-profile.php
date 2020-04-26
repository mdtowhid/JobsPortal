<?php

include_once './header.php';
include_once './file-path.php';

if($_SESSION['JobSeekerId'] == null){
    header("Location: ./log-in.php");
}
$seekerId = $_SESSION['JobSeekerId'];

$status = '';
$user = new User();
if(isset($_POST['submit'])){
    $status = $user->updateUser($_POST);
}
?>

<?php 
    if($status != null){?>
        <div class="alert alert-success">
            <?php echo $status; ?>
        </div>
<?php
    }
?>
<br>
<div class="container margin-top20px">
    <div class="row" style="width: 100%;">
        <div class="col-md-3">
            <ul class="list-group">
                <li class="list-group-item active">Update Your Profile</li>
                <li class="list-group-item"><a href="./add-skill.php">Add Your Skill</a></li>
                <li class="list-group-item"><a href="">Employent History</a></li>
            </ul>
        </div>
        <div class="col-md-9">
            <form action="" method="POST" enctype="multipart/form-data" class="">
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                    <input type="text" name="JobSeekerId" value="<?php echo $jobSeeker['JobSeekerId'] ?>" hidden>
                    <label>First Name</label>
                    <input type="text" name="FirstName" value="<?php echo $jobSeeker['FirstName'] ?>" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                    <label>Last Name</label>
                    <input type="text" name="LastName" value="<?php echo $jobSeeker['LastName'] ?>" class="form-control" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6 mb-3">
                    <label>Father Name</label>
                    <input type="text" name="FatherName" value="<?php echo $jobSeeker['FatherName'] ?>" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                    <label>Mother Name</label>
                    <input type="text" name="MotherName" value="<?php echo $jobSeeker['MotherName'] ?>" class="form-control" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6 mb-3">
                    <label>Email</label>
                    <input type="text" name="Email" value="<?php echo $jobSeeker['Email'] ?>"  class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Phone Number</label>
                        <input id="phnNumb" type="text" name="PhoneNo" value="<?php echo $jobSeeker['PhoneNo'] ?>"  class="form-control"required>
                        <div class="text-danger"><b id="phnNumbError"></b></div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-12 mb-3">
                    <label>Address</label>
                    <textarea name="Address" class="form-control" required><?php echo $jobSeeker['Address'] ?></textarea>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-12 mb-3">
                    <label>NID Number</label>
                    <input name="NIDNumber" id="nidNumberId" value="<?php echo $jobSeeker['NIDNumber'] ?>" class="form-control" placeholder="NID Number" required>
                    <div class="text-danger"><b id="nidNumberErrorId"></b></div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-12 mb-3">
                    <label>Password</label>
                        <input id="password" type="password" name="Password" value="<?php echo $jobSeeker['Password']; ?>" class="form-control" placeholder="Password" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-12 mb-3">
                    <label>Confirm Password</label>
                        <input id="confirmPassword" type="password" name="ConfirmPassword" value="<?php echo $jobSeeker['ConfirmPassword']; ?>" class="form-control" placeholder="Password" required>
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
                        <input type="date" name="CreationDate" class="form-control" value="<?php echo date("Y-m-d") ?>" readonly/>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label class="label-control">Gender</label>
                        <br>
                        <input type="radio" name="Gender" class="radio" value="Male" required/> Male
                        <input type="radio" name="Gender" class="radio" value="Female" required/> Female
                    </div>

                </div>
                
                <input type="checkbox" name="ActiveStatus" value="true" hidden/>

                <br>
                <div class="form-row">
                    <div class="col-md-12">
                    <input id="userSubmit" name="submit" class="btn btn-primary" type="submit" value="Update"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
</div>

<?php include_once './footer.php' ?>


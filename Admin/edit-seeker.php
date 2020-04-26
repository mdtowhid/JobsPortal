<?php

include_once './header.php';
include_once '../Classes/admin.php';
include_once '../Classes/businessLogic.php';
include_once '../Classes/company.php';
include_once '../Classes/user.php';
$seekerId = $_GET['seekerId'];
$status='';
$gateway = new Gateway();

$admin = new Admin();

$user = new User();
$jobSeeker = $user->getUserById($seekerId);
if(isset($_POST['submit'])){
    $status = $admin->updateUserById($_POST);
    $jobSeeker = $user->getUserById($seekerId);
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
<div class="right">
    <div class="container" style="width: 95%">
    <div class="row">
        <div class="col-md-12">

            <form action="" method="POST" enctype="multipart/form-data" class="">
                <div class="form-row">
                    <div class="col-md-3" style="margin: 0 auto;">
                        <div class="card">
                            <div class="card-header">
                                <img src="<?php echo $jobSeeker['ImageUrl']; ?>" style="width: 100px; height; 90px;">
                            </div>
                            <div class="card-body">
                                <div class="card-text">
                                <?php echo $jobSeeker['FirstName'] . ' ' . $jobSeeker['LastName']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>

                <div class="form-row">
                    <div class="col-md-6 mb-3">
                    <input type="text" name="JobSeekerId" value="<?php echo $jobSeeker['JobSeekerId'] ?>" hidden>
                    <label>First Name</label>
                    <input type="text" name="FirstName" value="<?php echo $jobSeeker['FirstName'] ?>" class="form-control" required readonly>
                    </div>

                    <div class="col-md-6 mb-3">
                    <label>Last Name</label>
                    <input type="text" name="LastName" value="<?php echo $jobSeeker['LastName'] ?>" class="form-control" required readonly>
                    </div>
                </div>

                
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <?php 
                            if($jobSeeker['ActiveStatus'] == 1){?>
                                <input type="checkbox" value="<?php echo $jobSeeker['ActiveStatus']?>" name="ActiveStatus" checked> This Account is Active Now.
                        <?php
                            }else{?>
                            <input type="checkbox" value="<?php echo $jobSeeker['ActiveStatus']?>" name="ActiveStatus"> This Account is Inactive Now.
                        <?php
                            }
                        ?>
                        

                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-12">
                    <input name="submit" class="btn btn-primary" type="submit" value="Update"/>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
    </div>
</div>


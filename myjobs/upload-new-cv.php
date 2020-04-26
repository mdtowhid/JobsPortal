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
    $status = $user->uploadNewCVBySeekerId($_POST);
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

<div class="container margin-top20px">
    <div class="row" style="width: 100%;">
        <div class="col-md-12">
            <form action="" method="POST" enctype="multipart/form-data" class="">
            <br><br><br><br>
                <div class="form-row">
                    <input type="hidden" name="JobSeekerId" value="<?php echo $seekerId; ?>">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                Upload
                            </span>
                        </div>
                        <div class="custom-flie">
                            <input type="file" name="CVPath" class="custom-flie-input" id="01" required>
                            <label class="custom-file-label" for="01">Choose File</label>
                        </div>
                    </div>
                </div>

                <br>
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


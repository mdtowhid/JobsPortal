<?php
include_once './header.php';
include_once './file-path.php';

if($_SESSION['JobSeekerId'] == null){
    header("Location: ./log-in.php");
}
$seekerId = $_SESSION['JobSeekerId'];
$status = '';
$user = new User();
?>

<div class="container margin-top20px">
    <div class="row">
        <div class="col-md-10">
            <embed style="width: 100%; height: 100vh;" src="<?php echo $jobSeeker['CVPath'] ?>" type="">
        </div>
        <div class="col-md-2">
            <a href="./upload-new-cv.php" class="btn btn-info">Upload New CV</a>
        </div>
    </div>
</div>

<?php include_once './footer.php' ?>

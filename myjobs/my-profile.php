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
<br>
<div class="container margin-top20px">
    <div class="row">
    <div class="col-md-3" style="">
        <ul class="list-group">
            <li class="list-group-item active">Update Your Profile</li>
            <li class="list-group-item"><a href="add-skill.php">Add Your Skill</a></li>
            <li class="list-group-item"><a href="job-suggestion.php">Suggested Job</a></li>
        </ul>
    </div>

    <div class="col-md-9" style="border: 1px solid #ccc; height: 100vh;">
        <div class="card">
            <div class="card-header">
                <img style="width: 200px; height: 180px;" src="<?php echo $jobSeeker['ImageUrl'] ?>" class="img-thumnail img-responsive mx-auto d-block img-fluid"/>
            </div>
            <div class="card-body">
                <div class="card-text">
                    <h3>
                        <?php echo $jobSeeker['FirstName'] . ' ' . $jobSeeker['LastName'] ?>
                    </h3>
                    <p><?php echo $jobSeeker['Email']?></p>
                    <p class="card-text"><?php echo $jobSeeker['Address'] ?></p>
                    <p class="card-text"><b>Member Since</b> - <?php echo $jobSeeker['CreationDate'] ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

</div><br>
<?php include_once './footer.php' ?>
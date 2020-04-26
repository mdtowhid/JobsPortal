<?php
include_once './header.php';
include_once './file-path.php';

if($_SESSION['JobSeekerId'] == null){
    header("Location: ./log-in.php");
}
$seekerId = $_SESSION['JobSeekerId'];

$skillId = $_GET['skill-id'];

$status = '';
$user = new User();
$thisSkill = $user->getSeekerSkillById($skillId);

if(isset($_POST['submit'])){
    $user->deleteSeekerSkill($skillId);
}
?>
<br>
<div class="container margin-top20px">
    <div class="row">
    <div class="col-md-3" style="">
        <ul class="list-group">
            <li class="list-group-item active">Update Your Profile</li>
            <li class="list-group-item"><a href="add-skill.php">Add Your Skill</a></li>
            <li class="list-group-item"><a href="">Employent History</a></li>
        </ul>
    </div>

    <div class="col-md-9">
        <form action="" method="POST" enctype="multipart/form-data" class="">
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <p>
                        Are you sure you ? want to delete  your skill <b><?php echo $thisSkill['SkillText']; ?></b>
                    </p>
                </div>
                <div class="form-row">
                    <div class="col-md-12">
                    <input id="sjsjsjsj" name="submit" class="btn btn-danger btn-sm" type="submit" value="Delete"/>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

</div><br>
<?php include_once './footer.php' ?>
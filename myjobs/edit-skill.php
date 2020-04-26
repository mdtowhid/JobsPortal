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
    $user->updateSeekerSkill($_POST);
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

        <div class="card">
            <div class="card-header active">
                <h3 class="text-muted"><b>Edit Your Skill</b></h3>
            </div>
        </div>
        <br>
        <form action="" method="POST" enctype="multipart/form-data" class="">
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <input type="text" name="Id" value="<?php echo $thisSkill['Id']; ?>" hidden>
                    <input type="text" name="SeekerId" value="<?php echo $seekerId; ?>" hidden>
                    <label>Skill</label>
                    <input type="text" name="SkillText" placeholder="Add skill" value="<?php echo $thisSkill['SkillText']; ?>" class="form-control" required>
                </div>

                <br>
                <div class="form-row">
                    <div class="col-md-12">
                    <input id="sjsjsjsj" name="submit" class="btn btn-success btn-sm" type="submit" value="Update"/>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

</div><br>
<?php include_once './footer.php' ?>
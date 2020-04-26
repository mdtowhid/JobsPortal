<?php
include_once './header.php';
include_once './file-path.php';

if($_SESSION['JobSeekerId'] == null){
    header("Location: ./log-in.php");
}
$seekerId = $_SESSION['JobSeekerId'];

$status = '';
$user = new User();
$seekerSkills = $user->getSeekerSkillsBySeekerId($seekerId);

if(isset($_POST['submit'])){
    $user->addSeekerSkill($_POST);
    $seekerSkills = $user->getSeekerSkillsBySeekerId($seekerId);
}
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

    <div class="col-md-9">

        <div class="card">
            <div class="card-header active">
                <h3 class="text-muted"><b>Your Skills</b></h3>
            </div>
            <?php 
                $counter = 0;
                while($row = mysqli_fetch_assoc($seekerSkills)){?>
                    <div class="card-text skills">
                        <b>Skill <?php echo ' ' . ++$counter; ?></b>
                        <br>
                        <br>
                        <span><?php echo $row['SkillText']; ?></span>
                        <a href="./delete-skill.php?skill-id=<?php echo $row['Id']; ?>" class="btn btn-sm btn-danger">Delete</a>
                        <a href="./edit-skill.php?skill-id=<?php echo $row['Id']; ?>" class="btn btn-sm btn-info">Edit</a>
                    </div>
            <?php
                }
            ?>
        </div>
        <br>
        <form action="" method="POST">
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <input type="text" name="SeekerId" value="<?php echo $seekerId; ?>" hidden>
                    <label>Skill</label>
                    <input type="text" name="SkillText" placeholder="Add skill" class="form-control" required>
                </div>
            </div>
            
            <div class="form-row">
                <div class="col-md-12">
                    <input name="submit" class="btn btn-success btn-sm" type="submit" value="Add"/>
                </div>
            </div>
        </form>
    </div>
</div>

</div><br>
<?php include_once './footer.php' ?>
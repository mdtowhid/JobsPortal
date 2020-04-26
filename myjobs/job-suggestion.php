<?php
include_once './header.php';
include_once './file-path.php';

if($_SESSION['JobSeekerId'] == null){
    header("Location: ./log-in.php");
}
$seekerId = $_SESSION['JobSeekerId'];

$user = new User();
$seekerSkills = $user->getSeekerSkillsBySeekerId($seekerId);
$gateway = new Gateway();


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
            <h2 class="text-center text-muted">Job Suggestion based on your skills</h2>
            <?php 
                while($seekerSkill = mysqli_fetch_assoc($seekerSkills)){
                    $postedJobs = $gateway->searchJobs($seekerSkill['SkillText']);
                    while($postedJob = mysqli_fetch_assoc($postedJobs)){?>
                        <h4 class="text-muted">Your Skill: <?php echo $seekerSkill['SkillText']; ?></h4>
                        <hr>

                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-muted">
                                    <?php echo $postedJob['JobTitle'];?>
                                </h4>
                            </div>
                            <div class="card-body">
                                <h5>Job Context</h5>
                                <p class="card-text"><?php echo $postedJob['JobContext'];?></p>
                                <hr>
                                <h5>Employment Status</h5>
                                <p class="card-text"><?php echo $postedJob['EmploymentStatus'];?></p>
                                <hr>
                                <h5>Vacancy</h5>
                                <p class="card-text"><?php echo $postedJob['Vacancy'];?></p>
                                <a href="./job-details.php?id=<?php echo $postedJob['JobId'];?>" class="btn btn-info btn-sm">View More</a>
                            </div>
                        </div>
                        <br>
            <?php
                    }
                }
            ?>
        </div>
    </div>
</div>

</div><br>
<?php include_once './footer.php' ?>
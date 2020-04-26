<?php
    include_once('./header.php');
    include_once('../Classes/admin.php');
    include_once('../Classes/user.php');

    $admin = new Admin();
    $user = new User();
    $jobSeeker = $user->getUserById($_GET['seekerId']);
?>


<div class="right">
    <div class="container">
    <a href="#" onclick="return window.history.back();" class="btn btn-info go-back-btn" style="z-index: 1; top: 35px;left: 35px;">Go Back</a>
        <div class="card">
            <div class="card-header">
                <img src="<?php echo $jobSeeker['ImageUrl'] ?>" class="img-thumnail img-responsive mx-auto d-block img-fluid" style="width: 300px; height: 280px;"/>
            </div>
            <div class="card-body">
                <div class="card-text">
                    <h3>
                        <?php echo $jobSeeker['FirstName'] . ' ' . $jobSeeker['LastName'] ?>
                    </h3>
                    <p><?php echo $jobSeeker['Email']?></p>
                    <p class="card-text"><?php echo $jobSeeker['Address'] ?></p>
                    <p class="card-text"><b>Member Since</b> <?php echo $jobSeeker['CreationDate'] ?></p>
                    <p class="card-texe"><a href="./edit-seeker.php?seekerId=<?php echo $jobSeeker['JobSeekerId'];?>" class="btn btn-info">Edit this seeker</a></p>
                </div>
            </div>
        </div>

    </div>
</div>





<?php
include_once './footer.php';
?>
    </div>
    </div>
</body>
</html>

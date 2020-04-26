<?php
    include_once('./header.php');
    include_once('../Classes/admin.php');

    $admin = new Admin();
    $seekers = $admin->getJobSeekers();
?>


<div class="right">
    <div class="container">
        <div class="bodyTop">
            <h3 class="text-center text-muted">Job Seekers</h3>
        </div>
        
        <table class="table table-bordered table-condensed table-hover">  
            <tr class="text-center">
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Phone Number</th>
                <th>Photo</th>
                <th>Actions</th>
            </tr>
            <?php 
                while($skr = mysqli_fetch_assoc($seekers)){?>
                <tr>
                    <td><?php echo $skr['FirstName'] . ' ' . $skr['LastName']; ?></td>
                    <td><?php echo $skr['Email'] ?></td>
                    <td><?php echo $skr['Address'] ?></td>
                    <td><?php echo $skr['PhoneNo'] ?></td>
                    <td><img style="width: 50px; height: 50px;" src="<?php echo $skr['ImageUrl'] ?>"></td>
                    <td><a href="job-seeker-details.php?seekerId=<?php echo $skr['JobSeekerId'] ?>">Details</a></td>
                </tr>
            <?php        
                }
            ?>
        </table>  

    </div>
</div>





<?php
include_once './footer.php';
?>
    </div>
    </div>
</body>
</html>

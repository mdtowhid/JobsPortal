<?php
include_once('./header.php');
include_once('../Classes/admin.php');
$admin = new Admin();
$queryRes = $admin->getPostedJobs();

?>

<div class="right">

    <div class="container">
        <a href="addNewPost.php" class="btn btn-primary">Add New Job Post</a>
        <br>
        <br>
        <table class="table table-bordered table-hover table-condensed table-responsive">
            <tr class="">
                <th>Title</th>
                <th>Company Name</th>
                <th>Category</th>
                <th>Address</th>
                <th>Experience</th>
                <th>Deadline</th>
                <th>Active ?</th>
                <th>PostedBy</th>
                <th>Actions</th>
            </tr>
            <?php
            while($jobs = mysqli_fetch_assoc($queryRes)){ 
                if($jobs['ActiveStatus'] == true){?>
                    <tr>
                        <td><?php echo $jobs['Title'] ?></td>
                        <td><?php echo $jobs['CompanyName'] ?></td>
                        <td><?php echo $jobs['CategoryId'] ?></td>
                        <td><?php echo $jobs['Address'] ?></td>
                        <td><?php echo $jobs['Experience'] ?></td>
                        <td><?php echo $jobs['Deadline'] ?></td>
                        <td><?php echo $jobs['ActiveStatus'] ?></td>
                        <td><?php echo $jobs['PostedBy'] ?></td>
                        <td><a href="editJbPost.php?id=<?php echo $jobs['JobId'] ?>">Edit</td>
                    </tr>

                    
                        <?php
                    }
                }
                ?>
            </table>
        </div>
    </div>
</div>
</div>


<?php
include_once('./footer.php');
?>
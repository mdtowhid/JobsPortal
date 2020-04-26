<?php
    include_once('./header.php');
    include_once('../Classes/admin.php');

    $admin = new Admin();
    $users = $admin->getUsers();
    $counter = 0;

?>


<div class="right">
    <div class="container">
        <div class="bodyTop">
            <h3 class="text-center text-muted">Users</h3>
        </div>

        <table class="table table-bordered table-condensed table-hover">  
            <tr class="text-center">
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Gender</th>
                <th>Image</th>
                <th>Status</th>
                <th>Creation Date</th>
                <th>Actions</th>
            </tr>
            <?php 
                while($user = mysqli_fetch_assoc($users)){ $counter += 1;?>
                    
                <tr>
                    <td><?php echo $user['FirstName'] . ' ' . $user['LastName'] ?></td>
                    <td><?php echo $user['Email'] ?></td>
                    <td><?php echo $user['PhoneNo'] ?></td>
                    <td><?php echo $user['Gender'] ?></td>
                    <td><img src="<?php echo '.'.$user['ImageUrl']; ?>" style="width: 120px; height:65px;object-fit: cover;"/></td>
                    <td><?php echo $user['ActiveStatus'] ?></td>
                    <td><?php echo $user['CreationDate'] ?></td>
                    <td><a href="editUser.php?id=<?php echo $user['JobSeekerId'] ?>">Edit</a></td>
                </tr>
            <?php        
                }
            ?>
        </table>  
        <p class="text-center table-bordered">Total Number of Job Seekers: <span class="badge badge-success"><?php echo $counter ?></span></p>

    </div>

</div>



<?php
include_once './footer.php';

?>
    </div>
    </div>
</body>
</html>

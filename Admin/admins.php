<?php
    include_once('./header.php');
    include_once('../Classes/admin.php');

    $admin = new Admin();
    $admins = $admin->getAdmins();
?>


<div class="right">
    <div class="container">
        <div class="bodyTop">
            <h3 class="text-center text-muted">Users</h3>
        </div>
        <a href="./add-admin.php" class="btn btn-success">Add New Admin</a>
        <br>
        <br>
        <table class="table table-bordered table-condensed table-hover">  
            <tr class="text-center">
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Image</th>
                <th>Creation Date</th>
                <th>Actions</th>
            </tr>
            <?php 
                while($admn = mysqli_fetch_assoc($admins)){?>
                <tr>
                    <td><?php echo $admn['FirstName'] . ' ' . $admn['LastName'] ?></td>
                    <td><?php echo $admn['Email'] ?></td>
                    <td><?php echo $admn['PhoneNo'] ?></td>
                    <td><img src="<?php echo $admn['ImageUrl']; ?>" style="width: 120px; height:65px;object-fit: cover;"/></td>
                    <td><?php echo $admn['Date'] ?></td>
                    <td><a href="edit-admin.php?adminId=<?php echo $admn['AdminId'] ?>">Edit</a></td>
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

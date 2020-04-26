<?php
include_once './header.php';
include_once('../Classes/admin.php');
$status = "";
$adminId = $_GET['adminId'];

$admin = new Admin();
$thisAdmin = $admin->getAdminById($adminId);

if(isset($_POST['submit'])){
    $status = $admin->updateAdmin($_POST);
}
?>
    
    <div class="right">
        <div class="container">
            <div class="bodyTop">
                <h3 class="text-center text-muted">Add new admin.</h3>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                    <input type="text" name="AdminId" value="<?php echo $thisAdmin['AdminId']?>" hidden readonly>
                    <label>First name</label>
                    <input type="text" name="FirstName" class="form-control" value="<?php echo $thisAdmin['FirstName'] ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                    <label>Last name</label>
                    <input type="text" name="LastName" class="form-control" value="<?php echo $thisAdmin['LastName'] ?>" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label>Email</label>
                        <input type="text" name="Email" class="form-control" value="<?php echo $thisAdmin['Email'] ?>" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>Phone Number</label>
                        <input type="text" name="PhoneNo" class="form-control" value="<?php echo $thisAdmin['PhoneNo'] ?>" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>Password</label>
                        <input type="password" name="Password" class="form-control" value="<?php echo $thisAdmin['Password'] ?>" required>
                    </div>
                </div>



                <div class="form-row">
                    <div class="col-md-10 mb-3">
                    <label>Choose Image</label>
                    <input type="file" name="ImageUrl" class="form-control" value="<?php echo $thisAdmin['ImageUrl'] ?>" required>
                    </div>
                    <div class="col-md- mb-">
                        <label hidden>Select Date</label>
                        <input type="date" name="Date" class="form-control" hidden value="<?php echo $thisAdmin['Date'] ?>"/>
                    </div>

                    <div class="col-md-2 mb-3">
                    <label class="label-control">Gender</label>
                    <br>
                    <label>
                        <input type="radio" name="Gender" value="Male" checked required> Male
                    </label>
                    <label>
                        <input type="radio" name="Gender" value="Female" required> Female
                    </label>
                    </div>
                </div>
                <input name="submit" class="btn btn-primary" type="submit" value="Add"/>
            </form>
            
            <div class="alert alert-danger">
                <?php if($status!=null) { echo $status; } ?>
            </div>

        </div>






    <?php
include_once './footer.php';
?>
    </div>
    </div>
</body>
</html>



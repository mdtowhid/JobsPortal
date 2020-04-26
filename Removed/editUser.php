<?php
include_once 'header.php';
include_once '../Classes/operations.php';
$status = "";
$operation = new Crud();
$id = $_GET['id'];
$user = $operation->getUserById($id);


if (isset($_POST['submit'])) {
    //$status = $admin->addUser($_POST);
   
}


?>


<div class="right">
<div class="container">
            <div class="bodyTop">
                <h3 class="text-center text-muted">Edit user account.</h3>
                <h5 class="alert alert-success">
                    <?php if ($status != null) {echo $status;}?>
                </h5>
            </div>
            <form action="" method="POST" enctype="multipart/form-data" class="accForm">
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                    <label>First Name</label>
                    <input type="text" name="FirstName" value="<?php echo $user['FirstName'] ?>" class="form-control" placeholder="First Name"required>
                    </div>

                    <div class="col-md-6 mb-3">
                    <label>Last Name</label>
                    <input type="text" name="LastName" value="<?php echo $user['LastName'] ?>" class="form-control" placeholder="Last name" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6 mb-3">
                    <label>Email</label>
                    <input type="text" name="Email" value="<?php echo $user['Email'] ?>" class="form-control" placeholder="Email" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Phone Number</label>
                        <input type="text" name="PhoneNo" value="<?php echo $user['PhoneNo'] ?>" class="form-control" placeholder="PhoneNo" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-12 mb-3">
                    <label hidden>Password</label>
                        <input hidden type="password" name="Password" value="<?php echo $user['password'] ?>" class="form-control" placeholder="Password" required>
                    </div>
                </div>


                <div class="form-row">
                    <div class="col-md-6 mb-3" hidden>
                    <label hidden>Choose Image</label>
                    <input hidden type="file" name="ImageUrl" value="<?php echo $user['ImageUrl'] ?>" class="form-control" required>
                    </div>

                    <div class="col-md-5 mb-3">
                        <label>Date</label>
                        <input type="date" name="CreationDate" class="form-control" value="<?php echo date("Y-m-d") ?>" readonly/>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>
                        <input type="checkbox" name="ActiveStatus" class="" value="" /> <b>Active Status</b>
                        </label>
                    </div>
                </div>

                <input name="submit" class="btn btn-primary" type="submit" value="Update"/>
            </form>
    </div>
</div>

</body>
</html>



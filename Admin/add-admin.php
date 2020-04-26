<?php
include_once './header.php';
include_once('../Classes/admin.php');
$status = '';
if(isset($_POST['submit'])){
    $admin = new Admin();
    $status = $admin->addAdmin($_POST);
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
                        
                    <label>First name</label>
                    <input type="text" name="FirstName" class="form-control" placeholder="First name"required>
                    </div>
                    <div class="col-md-6 mb-3">
                    <label>Last name</label>
                    <input type="text" name="LastName" class="form-control" placeholder="Last name" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label>Email</label>
                        <input type="text" name="Email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>Phone Number</label>
                        <input type="text" name="PhoneNo" class="form-control" placeholder="Phone Number" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>Password</label>
                        <input type="password" name="Password" class="form-control" placeholder="Password" required>
                    </div>
                </div>



                <div class="form-row">
                    <div class="col-md-4 mb-3">
                    <label>Choose Image</label>
                    <input type="file" name="ImageUrl" class="form-control" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Select Date</label>
                        <input type="date" name="Date" class="form-control"/>
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



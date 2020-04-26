<?php
include_once './header.php';
include_once('../Classes/admin.php');
$status = "";
$admin = new Admin();
$gateway = new Gateway();
$jobCategoriesQueryResult = $gateway->getJobCategories();
if(isset($_POST['submit'])){
    $status = $admin->addNewJobPost($_POST);
}
?>
    
    <div class="right">
        <div class="container">
            <div class="bodyTop">
                <h3 class="text-center text-muted">Add New Job Post</h3>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                    <label>Job Title</label>
                    <input type="text" name="Title" class="form-control" placeholder="Title"required>
                    </div>

                    <div class="col-md-4 mb-3">
                    <label>Company Name</label>
                    <input type="text" name="CompanyName" class="form-control" placeholder="Company name" required>
                    </div>

                    <div class="col-md-4 mb-3">
                    <label>Address</label>
                    <input type="text" name="Address" class="form-control" placeholder="Address" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label>Experience</label>
                        <input type="text" name="Experience" class="form-control" placeholder="Experience" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Job Categories</label>
                        <select name="CategoryId" class="form-control" required>
                            <option value="none">-Select Job Category-</option>
                            <?php
                                while($jobCategory = mysqli_fetch_assoc($jobCategoriesQueryResult)){?>
                                    <option value="<?php echo $jobCategory['CategoryId'] ?>"><?php echo $jobCategory['CatgoryName'] ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Deadline</label>
                        <input type="date" name="Deadline" class="form-control" placeholder="Deadline" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-2 mb-3">
                        <label style="cursor: pointer">
                            <input type="checkbox" name="ActiveStatus"><b> Active Status</b>
                        </label>
                        <input type="text" name="PostedBy" class="form-control" value="1" hidden>
                    </div>
                </div>

                <input name="submit" class="btn btn-primary" type="submit" value="Add"/>
            </form>
            <br>
            <a href="./jobs.php" class="btn btn-success">Go to job post</a>
            <span class="alert alert-success">
                <?php if($status!=null) { echo $status; } ?>
            </span>
        </div>

    </div>
</body>
</html>



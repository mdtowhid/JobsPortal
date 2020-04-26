<?php
include_once './header.php';
include_once '../Classes/admin.php';
$status = "";
$admin = new Admin();


$id = $_GET['id'];

$gateway = new Gateway();
$jobCategories = $gateway->getJobCategories();
$jCategory = $gateway->getJobCategoryById($id);
if (isset($_POST['submit'])) {
    $status = $admin->updateJobCategory($_POST);
}
?>

    <div class="right">
        <div class="container">
            <div class="row">
                <div class="bodyTop col-md-12" style="position: sticky; top: 0;">
                    <h3 class="text-center text-muted">Update Category</h3>
                </div>
            </div>
           
            <div class="row">
                <form autocomplete="false" action="" method="POST" enctype="multipart/form-data" class="col-md-6">
                    <div class="">
                        <div class="mb-3">
                            <label>Category Name</label>
                            <input type="text" name="CategoryId" value="<?php echo $jCategory['CategoryId'] ?>" hidden>
                            <input type="text" name="CatgoryName" value="<?php echo $jCategory['CatgoryName'] ?>" class="form-control" placeholder="Catgory Name"required>
                            <br>
                            <input name="submit" class="btn btn-success" type="submit" value="Update"/>
                            
                            <br>    
                            <br>    
                            <div class="alert alert-success">
                                <?php if ($status != null) {echo $status;}?>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="col-md-6">
                    <table class="table table-bordered table-condensed table-hover">
                        <tr style="text-align: center; background: #fbfbfb">
                            <th>Category Name</th>
                            <th>Actions</th>
                        </tr>
                        <?php
                            while($jCatefory = mysqli_fetch_assoc($jobCategories)){?>

                                <tr>
                                    <td> <?php echo $jCatefory['CatgoryName'] ?></td>
                                    <td> <a href="edit-category.php?id=<?php echo $jCatefory['CategoryId'] ?>">Edit</a> </td>
                                </tr>

                        <?php
                            }
                        ?>

                        <tr>
                            <th colspan="2" style="text-align: center; background: #fbfbfb">End of the rows</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    <?php
include_once './footer.php';
?>
    </div>
</body>
</html>



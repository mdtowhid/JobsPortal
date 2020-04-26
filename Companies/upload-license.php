<?php
    include_once 'header.php';

    if($_SESSION['CompanyId'] == null){
        header("Location: ./log-in.php");
    }
    $companyId = $_SESSION['CompanyId'];
    $company = new Company();
    if(isset($_POST['submit'])){
        $status = $company->uploadLicense($_POST);
    }
?>

<div class="col-md-9" style="margin-top: 25px;">
    <form action="" method="POST" enctype="multipart/form-data" class="">
        <br><br><br><br>
        <div class="form-row">
            <input type="hidden" name="CompanyId" value="<?php echo $companyId; ?>">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        Upload
                    </span>
                </div>
                <div class="custom-flie">
                    <input type="file" name="LicensePath" class="custom-flie-input" id="01" required>
                    <label class="custom-file-label" for="01">Choose File</label>
                </div>
            </div>
        </div>

        <br>
        <div class="form-row">
            <div class="col-md-12">
            <input name="submit" class="btn btn-primary" type="submit" value="Update"/>
            </div>
        </div>
    </form>
</div>


    </div>
</div>
<br><br><br><br><br>

<?php include_once './footer.php' ?>
</body>
</html>
<?php
    include_once 'header.php';

    if($_SESSION['CompanyId'] == null){
        header("Location: ./log-in.php");
    }
    $companyId = $_SESSION['CompanyId'];
    
    $gateway = new Gateway();
    $thisCompany = $gateway->getCompanyDetailsById($companyId);
?>

<style>
    body{
        background: #fcfcfc;
    }
</style>

<div class="col-md-9 text-center" style="margin-top: 25px;" >
    <div class="card">
        <div class="card-header">
            <h3 class="text-muted text-center">
                <?php echo $thisCompany['CompanyName']; ?>
            </h3>
        </div>
        <div class="card-body">
            <div>
                <h2 class="text-center text-muted">
                    License
                </h2>
                <img style="width: 60%; border-radius: 5px; height: 80%; margin: 0 auto; display: block;" src="<?php echo $thisCompany['LicensePath']; ?>" alt="" srcset="">
            </div>
            <div class="card-text">
                <br>
                <p>
                    <?php echo $thisCompany['Email']; ?>
                </p>
                
                <p>
                    <?php echo $thisCompany['Address']; ?>
                </p>

                <p>
                    <?php echo $thisCompany['PhoneNumber']; ?>
                </p>
                <a href="./upload-license.php" class="btn btn-success btn-sm">Update License</a>
            </div>
        </div>
    </div>
</div>


    </div>
</div>
<br><br><br><br><br>

<?php include_once './footer.php' ?>
</body>
</html>
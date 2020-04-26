<?php
    include_once('./header.php');
    include_once('../Classes/admin.php');
    include_once('../Classes/businessLogic.php');

    $companyId = $_GET['companyId'];
    $admin = new Admin();
    $gateway = new Gateway();
    $thisCompany = $gateway->getCompanyDetailsById($companyId);
?>


<div class="right">
    <div class="container">
    <a href="#" onclick="return window.history.back();" class="btn btn-info go-back-btn" style="z-index: 1; top: 35px;left: 35px;">Go Back</a>
    <div class="card">
        <div class="card-header">
            <h3 class="text-muted text-center">
                <?php echo $thisCompany['CompanyName']; ?>
            </h3>
        </div>
        <div class="card-body">
            <div class="card-text">
                <p>
                    <?php echo $thisCompany['Email']; ?>
                </p>
                
                <p>
                    <?php echo $thisCompany['Address']; ?>
                </p>

                <p>
                    <?php echo $thisCompany['PhoneNumber']; ?>
                </p>

                <p><a href="edit-company.php?companyId=<?php echo $thisCompany['CompanyId']; ?>" class="btn btn-info">Edit this company</a></p>
            </div>
        </div>
    </div>
    </div>
</div>





<?php
include_once './footer.php';
?>
    </div>
    </div>
</body>
</html>

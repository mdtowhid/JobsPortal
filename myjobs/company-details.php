<?php
    include_once 'header.php';
    $companyId = $_GET['company-id'];
    
    $gateway = new Gateway();
    $status = '';
    $thisCompany = $gateway->getCompanyDetailsById($companyId);
    if(isset($_POST['submit'])){
        $status = $gateway->storeReview($_POST);
        $thisSeekerReview = $gateway->getReviewBySeekerId($seekerId);
    }
?>

<style>
    body{
        background: #fcfcfc;
    }
</style>

<div class="col-md-9" style=" margin: 0 auto; margin-top: 25px;" >
    <div class="card">
        <div class="card-header">
            <div style="float: left">
                <img style="width: 100px; height: 90px;" src="<?php echo $thisCompany['LogoPath']; ?>" alt="">
            </div>
            <div style="float: left">
            <br>
                <h2 class="text-muted" style="margin-left: 15px;"><?php echo $thisCompany['CompanyName']; ?></h2>
            </div>
        </div>
        <div class="card-body">
            <div class="card-text">
                <br>
                <p><b>Email: </b><?php echo $thisCompany['Email']; ?></p>
                <p><b>Address: </b><?php echo $thisCompany['Address']; ?></p>
                <p><b>Phone Number: </b><?php echo $thisCompany['PhoneNumber']; ?></p>
            </div>
            <?php include_once('./review.php') ?>
        </div>
    </div>
</div>


    </div>
</div>
<br><br><br><br><br>

<?php include_once './footer.php' ?>
</body>
</html>
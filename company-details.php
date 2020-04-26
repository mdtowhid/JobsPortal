<?php
include_once 'header.php';
$companyId = $_GET['company-id'];

$gateway = new Gateway();
$status = '';
$thisCompany = $gateway->getCompanyDetailsById($companyId);

?>


<div class="container">
    <div class="row">
        
        <div class="col-md-9" style=" margin: 0 auto; margin-top: 25px;" >
            <div class="card">
                <div class="card-header">
                    <div style="float: left">
                        <img style="width: 100px; height: 90px;" src="<?php echo str_replace('..', '.', $thisCompany['LogoPath']); ?>" alt="">
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
                    <div class="btn btn-info btn-sm" id="ratingSuggestionId">
                        Rate This Company
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include './rating-review-form.php'; ?>


    </div>
</div>

<?php include_once './footer.php' ?>
<script>
$(document).ready(()=>{
    $('#ratingSuggestionId').click(()=>{
        $('#ratingLoginInfoWrapperId').css({
            'opacity': '1',
            'visibility': 'visible'
        });
    });

    $('#ratingLoginInfoWrapperCancelId').click(function(){
        $('#ratingLoginInfoWrapperId').css({
            'opacity': '0',
            'visibility': 'hidden'
        });
    });
});
</script>
</body>
</html>
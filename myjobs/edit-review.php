<?php
include_once './header.php';
include_once './file-path.php';

if ($_SESSION['JobSeekerId'] == null) {
    header("Location: ./log-in.php");
}
$status = "";
$seekerId = $_SESSION['JobSeekerId'];


$gateway = new Gateway();
$thisSeekerReview = $gateway->getReviewBySeekerId($seekerId);


if (isset($_POST['submit'])) {
    $status = $gateway->updateReview($_POST);
}

?>



<br><br>
<div class="container">
        <div id="reviewForm">
        <form action="" method="post">

            <input type="text" name="Id" value="<?php echo $thisSeekerReview['Id'] ?>" hidden>
            
            <div class="form-row">
                <div class="col-md-12">
                    <input type="text" name="CompanyId" value="<?php echo $thisSeekerReview['CompanyId'] ?>" class="form-control" hidden>
                </div>
            </div>
            
            <div class="form-row">
                <div class="col-md-12">
                    <input type="text" name="SeekerId" value="<?php echo $seekerId; ?>" class="form-control" hidden>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12">
                    <label for="">Rating</label>
                    <div class="rating-btn-wrapper" id="formRatingCheckBoxes">
                        <input type="checkbox" class="re" name="ReviewNumber" value="1" data-id="Bad">
                        <input type="checkbox" class="re" name="ReviewNumber" value="2" data-id="Good">
                        <input type="checkbox" class="re" name="ReviewNumber" value="3" data-id="Better">
                        <input type="checkbox" class="re" name="ReviewNumber" value="4" data-id="Excellent">
                        <input type="checkbox" class="re" name="ReviewNumber" value="5" data-id="Excellent ++">
                    </div>
                    <div id="ratingText" style="color: black;"><b>You have Rated As: </b><?php echo $thisSeekerReview['ReviewStatus'] ?></div>
                </div>
            </div>
            
            <div class="form-row">
                <div class="col-md-12">
                    <label for="">Leave a review</label>
                    <textarea name="ReviewText" id="reviewAreaBoxId" class="form-control" cols="2" rows="2"><?php echo $thisSeekerReview['ReviewText'] ?></textarea>
                    <div class="text-danger" id="reviewTextErrorId"></div>
                </div>
            </div>
            
            <div class="form-row">
                <div class="col-md-12">
                    <input name="ReviewStatus" id="reviewStatusId" class="form-control" hidden/>
                </div>
            </div>
            
            <div class="form-row">
                <div class="col-md-12">
                    <input name="Reviewed" value="SeekerReviewed" class="form-control" hidden/>
                </div>
            </div>
            
            <div class="form-row">
                <div class="col-md-12">
                    <input name="ReviewFor" value="ForWeb" class="form-control" hidden/>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-12">
                    <br>
                    <input type="submit" id="reviewSubmitBtnId"name="submit" value="Update Review" class="btn btn-sm btn-info">
                </div>
            </div>
        </form>
</div>










    <?php include_once './footer.php'?>

    <script>
        $(document).ready(function(){
            $('#reviewSubmitBtnId').click(()=>{
                let reviewText = $('#reviewAreaBoxId').val();
                if(reviewText.length < 40){
                    $('#reviewTextErrorId').text('Your review must be 40 characters long.');
                    return false;
                }
            });

            $('.rating-btn-wrapper input[type="checkbox"]').change(function(){
                let ratingText = "";
                $('.rating-btn-wrapper input[type="checkbox"]').removeClass('active');
                if($(this).is(":checked")){
                    ratingText = $(this).val();
                    $('#ratingText').text($(this).attr('data-id'));
                    $('#reviewStatusId').val($(this).attr('data-id'));
                    let i = 0;
                    for(i; i<parseInt($(this).val());i++){
                        let x = $('.rating-btn-wrapper input[type="checkbox"]')[i];
                        x.className += ' active';
                    }
                }
            });
        });
    </script>
</body>
</html>


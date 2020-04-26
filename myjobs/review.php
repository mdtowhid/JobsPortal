


<div id="reviewBox">
<?php 
    $isReviewed = "";
    $isReviewed = $gateway->isReviewedCompany($companyId,$seekerId);

    $thisSeekerReview = $gateway->getReviewBySeekerId($seekerId);
    if($isReviewed != null){?>
        <div class="panel panel-info" align="center">
            <h3 class="text-muted">
                You have reviewed for this Company. Thanks for your review.
            </h3>
            <p>
                <?php echo $isReviewed['ReviewText'] ?>
            </p>

            <div class="reviewed-checkboxes">
                <?php 
                    $i = 0; 
                    while($i < $isReviewed['ReviewNumber']){?>
                        <span class="active"></span>
                   <?php
                        $i++;
                    }
                ?>
                <br>
                <b><?php echo $isReviewed['ReviewStatus']; ?></b>
            </div>
            
            <a style="margin-top: 15px;" href="edit-review.php?review-id=<?php echo $isReviewed['Id'];?>" class="btn btn-sm btn-primary">Edit Review</a>
        </div>
<?php
    }else{?>
    <h4 class="text-center">
        Add a review
    </h4>

    <div class="review-open-btn" align="center">
        <button id="reviewOpenBtn" class="btn btn-primary by">
            Review
        </button>
        <?php 
            if($status != null){?>
                <h4><?php echo $status; ?></h4>
        <?php
            }
        ?>
    </div>

    <div id="reviewForm">
        <div class="review-form-canel">
            <span>&times;</span>
        </div>
        <form action="" method="post">
            
            <div class="form-row">
                <div class="col-md-12">
                    <input hidden type="text" name="CompanyId" value="<?php echo $companyId; ?>" class="form-control" >
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
                    <div id="ratingText"></div>
                </div>
            </div>
            
            <div class="form-row">
                <div class="col-md-12">
                    <label for="">Leave a review</label>
                    <textarea name="ReviewText" id="reviewAreaBoxId" class="form-control" cols="2" rows="2"></textarea>
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
                    <input name="ReviewFor" value="ForCompany" class="form-control" hidden/>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-12">
                    <br>
                    <input type="submit" id="reviewSubmitBtnId"name="submit" value="Review" class="btn btn-sm btn-info">
                </div>
            </div>
        </form>
    </div>
<?php
    }
?>

</div>


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

            $('#reviewForm').hide();
            $('#reviewOpenBtn').click(()=>{
                $('#reviewOpenBtn').hide();
                $('#reviewForm').slideToggle(1000);
            });
            $('.review-form-canel').click(()=>{
                $('#reviewOpenBtn').fadeIn();
                $('#reviewForm').slideToggle(1000);
            });
        });
    </script>
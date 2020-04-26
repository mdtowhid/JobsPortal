<?php 
    $gateway = new Gateway();
    $user = new User();
    $reviews = $gateway->getReviews();
?>
<div class="container-fluid" style="background: #1DBFAF; color: white;">
    <div class="row">
        <div class="col-md-12" style="margin: 0 13px 0;">
            <div class="review-header-index">
                <h2 class="text-muted text-center">
                    Our Top Reviews
                </h2>
            </div>
            <?php 
                while($review = mysqli_fetch_assoc($reviews)){
                    $reviewInfoes = $gateway->getReviewByCompanyIdAndSeekerId($review['CompanyId'], $review['SeekerId']);
                    $seekerInfoes = $user->getUserById($reviewInfoes['SeekerId']);
                    $companyInfoes = $gateway->getCompanyDetailsById($reviewInfoes['CompanyId']);
            ?>

                    <ul class="list-group reviews-index" style="columns: 3; margin-bottom: 10px;background: #1DBFAF !important; color: white;">
                        <li class="list-group-item">
                            <h4 class="text-muted"><?php echo $companyInfoes['CompanyName']; ?></h4>
                        </li>
                        <li class="list-group-item">
                            <?php echo $reviewInfoes['ReviewText'] ?>
                        </li>

                        <li class="list-group-item">
                            <div class="reviewed-checkboxes" id="reviewedCheckboxesId">
                                <?php 
                                    $i = 0; 
                                    while($i < $reviewInfoes['ReviewNumber']){?>
                                        <span class="active"></span>
                                <?php
                                        $i++;
                                    }
                                ?>
                                <br>
                                <b><?php echo $reviewInfoes['ReviewStatus']; ?></b>

                                <div class="reviewed-seeker-informs">
                                    <br>
                                    <h5 title="Our Job Seeker">Reviewed By</h5>
                                    <p class="text-muted"><i><?php echo $seekerInfoes['FirstName'] . ' ' .$seekerInfoes['LastName'] ?></i></p>
                                </div>
                            </div>
                        </li>

                    </ul> 

            <?php
                }
            ?>
        </div>
    </div>
</div>
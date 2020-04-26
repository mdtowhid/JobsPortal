<?php
include_once 'header.php';
$status = "";
$reviews = "";

$gateway = new Gateway();
$reviews = $gateway->getReviewsByCompanyId($companyId);

$user = new User();
?>

<div class="col-md-9">
        <?php 
            while($reviewRow = mysqli_fetch_assoc($reviews)){
                $reviewer = $user->getUserById($reviewRow['SeekerId']);?>
                <div class="alert alert-primary" style="margin-bottom: 10px;">
                    <h4><?php echo $reviewer['FirstName'] . ' ' . $reviewer['LastName'] ?></h4>
                    <div class="reviewed-checkboxes">
                    <?php 
                        $i = 0; 
                        while($i < $reviewRow['ReviewNumber']){?>
                            <span class="active"></span>
                    <?php
                            $i++;
                        }
                    ?>
                    <br>
                    <b><?php echo $reviewRow['ReviewStatus']; ?></b>
                    <br>
                    <p><?php echo $reviewRow['ReviewText']; ?></p>
                </div>
            </div>
        <?php
            }
        ?>  
</div>


<?php include_once './footer.php';?>
</div>
</div>
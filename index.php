<?php
include_once 'header.php';

$gateway = new Gateway();
$jobCategories = $gateway->getJobCategories();
$companies = $gateway->getCompanies()
?>
    <div class="container-fluid" style="margin-top: -1px">
        <div class="row" style="width: auto;">
            <div class="col-md-6 in-left">
                <div class="in-details">
                    <h3>ICT Jobs.</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste quo aspernatur nisi voluptatibus hic repellendus fugiat eos, debitis voluptates eum. Hic nam saepe inventore provident natus non cumque tempore quibusdam!</p>
                    <a href="#" class="btn btn-info">Read More &raquo;</a>
                </div>
            </div>
            <div class="col-md-6 in-right">
                <?php include_once 'slider.php'; ?>
            </div>
        </div>
    </div>
    <hr style="margin: 0;">
    <br>
    <br>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-muted text-center">Find Jobs</h3>
                <h4 class="" style="text-transform: uppercase;">Job Categories</h4>
                <br>
                <ul class="" style="columns: 4; padding-bottom: 50px;">
                    <?php 
                        while($jc = mysqli_fetch_assoc($jobCategories)){?>
                            <li class="text-muted"><a class="text-muted" href="./job-search.php?id=<?php echo $jc['CategoryId'] ?>&&job-title=<?php echo $jc['CatgoryName'] ?>"><?php echo $jc['CatgoryName'] ?></a></li>
                            
                    <?php        
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <hr style="margin: 0;">

    <?php include './banner.php' ?>
    <div style="height: 5px; background: linear-gradient(to right,#303D46,#1EAEDB)"></div>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-muted text-center">Renewed Companies.</h3>
                <br>
                <ul class="" style="columns: 3">
                    <?php 
                        while($c = mysqli_fetch_assoc($companies)){?>

                            <li class="text-muted" style="margin-bottom: 20px;">
                                <div style="">
                                    <a href="./company-details.php?company-id=<?php echo $c['CompanyId'] ?>">
                                    <img class="company-logo-index" src="<?php echo str_replace('..', '.', $c['LogoPath']) ?>" alt="" srcset="">
                                    </a>
                                    <a class="text-muted" href="./company-details.php?company-id=<?php echo $c['CompanyId'] ?>"><?php echo $c['CompanyName'] ?>
                                    </a>
                                </div>
                            </li>
                            
                    <?php        
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <br><br>


    <?php include_once('./reviews.php'); ?>


    <!-- <div style="height: 5px; background: white"></div> -->
    <div class="container-fluid" style="padding: 10px; background: black;">
        <div class="row">
            <div class="col-md-12">
                
                <h3 class="text-center text-muted">
                    Please Leave a Review to Our Companies
                </h3>
                <div class="rating-btn-wrapper">
                    <input type="checkbox" value="Bad" data-id="1">
                    <input type="checkbox" value="Good" data-id="2">
                    <input type="checkbox" value="Better" data-id="3">
                    <input type="checkbox" value="Excellent" data-id="4">
                    <input type="checkbox" value="Excellent ++" data-id="5">
                </div>
            </div>
        </div>
    </div>
    <div style="height: 5px; background: linear-gradient(to right,#303D46,#1EAEDB)"></div>

    <div class="container-fluid" id="portion2">
        <div class="row">

        </div>
    </div>
    <div style="height: 2px; background: linear-gradient(to right,#303D46,#1EAEDB)"></div>

    <?php include './rating-review-form.php'; ?>

    <?php include_once './footer.php' ?>
<script>
$(document).ready(function(){
    $(".rating-btn-wrapper input[type='checkbox']").change(function(){
        $('#ratingLoginInfoWrapperId').toggleClass('active');
    });

    $('#ratingLoginInfoWrapperCancelId').click(function(){
        $('#ratingLoginInfoWrapperId').toggleClass('active');
    })
});
</script>

</body>
</html>

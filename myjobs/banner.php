<div class="container-fluid" id="seekerPageBannerId">
    
    <div class="row">
        <div class="col-md-10" id="jobColumnId">
            <h2 class="text-center">Apply Job By Categories</h2>
            <div class="job-columns">
                <?php 
                    while($jc = mysqli_fetch_assoc($jobCategories)){?>
                        <a href="job-search.php?id=<?php echo $jc['CategoryId'] ?> && job-title=<?php echo $jc['CatgoryName'] ?>">
                            <?php echo $jc['CatgoryName'] ?>
                        </a>
                <?php        
                    }
                ?>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-10" id="companyId">
            <h2 class="text-center">Apply Job By Companies</h2>
            <div class="company-columns">
                <?php 
                    while($jc = mysqli_fetch_assoc($companies)){?>
                        <div>
                            <a href="company-details.php?company-id=<?php echo $jc['CompanyId']; ?>">
                                <img src="<?php echo $jc['LogoPath'] ?>">
                                <?php echo $jc['CompanyName'] ?>
                            </a>
                        </div>
                <?php        
                    }
                ?>
            </div>
        </div>
    </div>
    </div>
</div>
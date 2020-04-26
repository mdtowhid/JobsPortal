<?php
include_once 'header.php';
if($_SESSION['CompanyId'] == null){
    header("Location: ./log-in.php");
}
$companyId = $_SESSION['CompanyId'];
$status = "";
$gateway = new Gateway();
$jobCategoriesQueryResult = $gateway->getJobCategories();

$company = new Company();
$eligibledSeekers = $company->getEligibledSeekersByCompanyId($companyId);
$jobCateories = $gateway->getJobCategories();
$user = new User();

?>

<div class="col-md-9">
    <div class="row">
        <?php 
            while($seeker = mysqli_fetch_assoc($eligibledSeekers)){
                $seekerDetails = $user->getUserById($seeker['SeekerId']);
                $getJobDetails = $gateway->getPostedJobById($seeker['JobId']);
        ?>
                <div class="col-md-4">
                    
                    <div class="card">
                    <div class="alert alert-primary">
                        <h4><?php echo $getJobDetails['JobTitle'] ?></h4>
                    </div>
                        <div class="card-header">
                            <img style="width: 170px; height: 130px;" src="<?php echo $seekerDetails['ImageUrl']; ?>">
                            <br>
                            <br>
                            <h4 class="text-muted"><?php echo $seekerDetails['FirstName'] . ' ' . $seekerDetails['LastName']; ?></h4>
                        </div>
                        <div class="card-body">
                            <div class="card-text"><?php echo $seekerDetails['Email']?></div>
                            <div class="card-text"><?php echo $seekerDetails['Address']?></div>
                            <div class="card-text"><?php echo $seekerDetails['PhoneNo']?></div>
                        </div>
                    </div>
                </div>
        <?php
            }
        ?>
    </div>
</div>

        </div>
        </div>

        <?php include_once './footer.php' ?>
<script>
    $(document).ready(function(){
        $('#categoryId').change(function(){
            if($(this).val() != "none"){
                var thisCatName = $(this).children(':selected').text();
                window.location.href = "search-seekers.php/job_cat_name='"+thisCatName+"'";
            }
            
        });
    });
</script>
</body>
</html>



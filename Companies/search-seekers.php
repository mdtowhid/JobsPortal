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
$eligibledSeekers = $company->getEligibledSeekersByCompanyId(1);

$jobCateories = $gateway->getJobCategories();

$user = new User();

?>

<div class="col-md-9">

    <table class="table table-bordered table-condensed table-hover table-responsive">
        <caption>Applied Seekers By Job Categories</caption>
        <tr style="width: 100%;">
            <th>Category Name</th>
            <th>Get Applied Seekers by category</th>
        </tr>
        <?php 
            while($jc = mysqli_fetch_assoc($jobCateories)){?>
                <tr>
                    <td><?php echo $jc['CatgoryName'] ?></td>
                    <td>
                        <a href="search-seekers.php?cat-id=<?php echo $jc['CategoryId'] ?>">By <?php echo $jc['CatgoryName'] ?></a>
                    </td>
                </tr>
<?php
            }
        ?>
    </table>
</div>

</div>
</div>

</body>
</html>



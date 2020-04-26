<?php
    include_once 'header.php';

    if($_SESSION['CompanyId'] == null){
        header("Location: ./log-in.php");
    }
    $companyId = $_SESSION['CompanyId'];


    $gateway = new Gateway();
    $jobsByCompanyId = $gateway->getPostedJobsByCompanyId($companyId);
?>
<div class="col-md-9 margin-top20px">
<a href="add-new-job.php" class="btn btn-success">Add New Job</a>
<br>
<br>

<table class="table table-bordered table-condensed table-hover table-responsive">
    <tr>
        <th>Title</th>
        <th>Vacancy</th>
        <th>Salary</th>
        <th>Posted</th>
        <th>Deadline</th>
        <th>Actions</th>
        <th>Applied Seekers</th>
    </tr>

    <?php while($job = mysqli_fetch_assoc($jobsByCompanyId)){?>
        <tr>
            <td><?php echo $job['JobTitle'] ?></td>
            <td><?php echo $job['Vacancy'] ?></td>
            <td><?php echo $job['Salary'] ?></td>
            <td><?php echo $job['PostedDate'] ?></td>
            <td><?php echo $job['DeadLineDate'] ?></td>
            <td>
                <a href="./edit-job-post.php?id=<?php echo $job['JobId'] ?>">Edit</a> | 
                <a href="./post-delete.php?id=<?php echo $job['JobId'] ?>">Delete</a>
            </td>
            <td>
                <a href="./applied-details.php?jobId=<?php echo $job['JobId'] ?>">Details</a>
            </td>
        </tr>
    <?php } ?>

</table>
</div>


    </div>
</div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php include_once './footer.php' ?>
</body>
</html>
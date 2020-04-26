<?php

include_once 'header.php';
    if($_SESSION['CompanyId'] == null){
        header("Location: ./log-in.php");
    }
    $companyId = $_SESSION['CompanyId'];

    $id = $_GET['id'];
    $status = "";
    $company = new Company();
    $gateway = new Gateway();

    $job = $gateway->getPostedJobById($id);

    if(isset($_POST['submit'])){
        $company->deleteJob($id);
    }
?>
        <div class="col-md-9">
            <h5>
                Are you sure you want to delete this Job post?
            </h5>
            <ul>
                <li><h3><?php echo $job['JobTitle'] ?></h3></li>
                <li><?php echo $job['JobContext'] ?></li>
                <li><?php echo $job['JobResponsibility'] ?></li>
                <li><?php echo $job['PostedDate'] ?></li>
                <li><?php echo $job['DeadLineDate'] ?></li>
            </ul>

            <form action="" method="post">
                <input type="submit" name="submit" value="Delete" class="btn btn-danger">
                <a href="./index.php" class="btn btn-success">Go Back</a>
            </form>
    </div>
</div>

</body>
</html>

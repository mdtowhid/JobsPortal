<?php
include_once './header.php';

if($_SESSION['CompanyId'] == null){
    header("Location: ./log-in.php");
}
$companyId = $_SESSION['CompanyId'];


?>
</div>
</div>

<br>
<br>
<br>
<br>

<?php include_once './footer.php' ?>
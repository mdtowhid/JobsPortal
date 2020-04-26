<?php
include_once './header.php';
include_once './file-path.php';

if($_SESSION['JobSeekerId'] == null){
    header("Location: ./log-in.php");
}
$status = "";
$seekerId = $_SESSION['JobSeekerId'];

$gateway = new Gateway();
$jobCategories = $gateway->getJobCategories();
$thisSeekerReview = $gateway->getReviewBySeekerId($seekerId);
$admin = new Admin();
$companies = $admin->getCompanies();
$user = new User();
$jobSeeker = $user->getUserById($seekerId);

?>

<?php include './banner.php' ?>



</body>
</html>


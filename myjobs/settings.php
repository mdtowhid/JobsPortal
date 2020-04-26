<?php
include_once './header.php';
include_once './file-path.php';

if($_SESSION['JobSeekerId'] == null){
    header("Location: ./log-in.php");
}
$seekerId = $_SESSION['JobSeekerId'];

$status = '';
$user = new User();
?>
<div class="container margin-top20px">
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <h4>This is Setting page.</h4>
                <p>Some configurable settings will appear here...</p>
            </div>
        </div>
    </div>
</div>


<?php include_once './footer.php' ?>
<?php
include_once './header.php';


if($_SESSION['AdminId'] == null){
    header("Location: ./login.php");
}
$companyId = $_SESSION['AdminId'];

?>


<div class="right">
    <div class="container" style="width: 95%">
        <div class="row">
            <div class="jumbotron">
                <h1 class="display-4">Welcome in Admin Panel</h1>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur
                 adipiscing elit. Ut vitae sapien felis. Suspendisse potenti.
                  Nunc nec vestibulum enim. Maecenas aliquet ultrices neque vel 
                  elementum. Duis quis gravida massa. Duis et tellus suscipit, 
                  sodales leo vel, eleifend mauris. Interdum et malesuada fames ac 
                  ante ipsum primis in faucibus. Mauris bibendum ornare risus, eu venenatis
                   mauris gravida ac. Donec vestibulum eget erat id dignissim. Integer 
                   posuere ligula vitae dui tincidunt varius. Curabitur 
                   condimentum maximus rutrum. 
                </p>
                
            </div>
        </div>
    </div>
</div>




<?php
include_once './footer.php';
?>
</body>
</html>
</body>
</html>

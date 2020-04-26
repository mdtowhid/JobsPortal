<?php
include_once 'header.php';
$status = "";

$messages = $company->getMessages();

?>


<div class="col-md-9">
    <div class="row">
        <?php 
            while($message = mysqli_fetch_assoc($messages)){?>
               <div class="col-md-12">
                    <div class="card text-center">
                        <div class="card-header"><?php echo $message['MessageTitle'] ?></div>
                        <div class="card-body">
                            <?php echo $message['Message'] ?>
                        </div>
                    </div>
               </div>
        <?php
            }
        ?>
    </div>
</div>

<br>
<br>
<br>
<br>
<br>
<br>
<?php include_once './footer.php';?>
</div>
</div>
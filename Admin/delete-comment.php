<?php
    include_once('./header.php');
    include_once('../Classes/admin.php');
    include_once('../Classes/businessLogic.php');

    $gateway = new Gateway();
    $admin = new Admin();

    $messageId = $_GET['comment-id'];
    $thisMessage = $gateway->getRepliedMessageById($messageId);
    $status = "";
    if(isset($_POST['submit'])){
        $status = $gateway->deleteComment($_POST);
    }
?>


<div class="right">
    <div class="container">
        <div class="bodyTop">
            <h3 class="text-center text-muted">Delete Comment</h3>
        </div>

        <?php 
            if($status != null){?>
                <div class="panel panel-success" style="padding: 20px;">
                    <b class="text-success">
                        <?php echo $status; ?>
                    </b>
                </div>
        <?php
            }
        ?>
        
        <form action="" method="post" class="">

            <input type="text" name="Id" value="<?php echo $thisMessage['Id'] ?>" hidden>

            <b>Are you sure you want to delete this comment?</b>
            <p>
                <?php echo $thisMessage['Message']; ?>
            </p>
            
            
            <div class="form-row">
                <div class="col-md-12">
                    <input type="submit" name="submit" value="Delete" class="btn btn-danger btn-sm">
                </div>
            </div>
        </form>

    </div>
</div>





<?php
include_once './footer.php';
?>
    </div>
    </div>
</body>
</html>

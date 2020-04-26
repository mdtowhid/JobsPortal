<?php
    include_once('./header.php');

    $gateway = new Gateway();

    $messageId = $_GET['comment-id'];
    $thisMessage = $gateway->getRepliedMessageById($messageId);
    $status = "";
    if(isset($_POST['submit'])){
        $status = $gateway->deleteComment($_POST);
    }
?>

<div class="col-md-9">
    <div class="bodyTop">
        <h3 class="text-center text-muted">Edit Comment</h3>
    </div>
    
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
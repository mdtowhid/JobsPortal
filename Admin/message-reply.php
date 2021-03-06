<?php
    include_once('./header.php');
    include_once('../Classes/admin.php');
    include_once('../Classes/businessLogic.php');

    $admin = new Admin();
    $_SESSION['messageUniqueNumber'] = $_GET['message-reply-unique-number']; 
    $messageUniqueNumber = $_SESSION['messageUniqueNumber'];
    $thisMessage = $admin->getMessageByMessageUniqueNumber($messageUniqueNumber);
    $status = "";

    $gateway = new Gateway();
    if(isset($_POST['submit'])){
        $status = $gateway->sentMessage($_POST);
        $thisMessage = $admin->getMessageByMessageUniqueNumber($messageUniqueNumber);
    }

    $repliedMessages = $gateway->getReplirdMessagesByMessageUniqueNumber($messageUniqueNumber);
?>


<div class="right">
    <div class="container">
        <div class="bodyTop">
            <h3 class="text-center text-muted">Replying to <?php echo $thisMessage['CompanyName']; ?></h3>
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

        <div class="" style="border: 1px solid #ddd; padding: 10px;">
            <b class="text-info">Message By: <?php echo $thisMessage['CompanyName']; ?></b>
            <p>
                <?php echo $thisMessage['Message']; ?>
            </p>
        </div>

        <br>

        <div class="comment-wrapper" style="padding: 15px;padding-left: 20px; border: 1px solid #ccc;">
        <?php 
            while($row = mysqli_fetch_assoc($repliedMessages)){
            if($row['MessageReplyType'] == "Admin"){?>
                    <div class="admin-replies">
                        <b>Admin</b>
                        <p><?php echo $row['Message']; ?></p>
                        <div class="comment-action-btn">
                            <a href="edit-comment.php?comment-id=<?php echo $row['Id'];?>" class="btn btn-info btn-sm">Edit</a>

                            <a href="delete-comment.php?comment-id=<?php echo $row['Id'];?>" class="btn btn-danger btn-sm">Delete</a>
                        </div>
                    </div>
            <?php
                    }else{?>
                    <div class="user-replies">
                        <b><?php echo $thisMessage['CompanyName']; ?></b>
                        <p><?php echo $row['Message']; ?></p>
                    </div>
            <?php
                    }
                }
            ?>
        </div>
        
        <form action="" method="post" class="">
            
            <div class="form-row">
                <div class="col-md-12">
                    <input type="text" name="AdminId" class="form-control" value="<?php echo $_SESSION['AdminId'] ?>" hidden>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-12">
                    <input type="text" name="CompanyId" class="form-control" value="<?php echo $thisMessage['CompanyId'] ?>" hidden >
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-12">
                    <input type="text" name="MessageUniqueNumber" class="form-control" value="<?php echo $thisMessage['CompanyRepliesUniqueNumber'] ?>" hidden>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-12">
                    <label for="">Message</label>
                    <textarea name="Message" id="" cols="5" rows="5" class="form-control"></textarea>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-12">
                    <input type="text" name="MessageReplyType" value="Admin" class="form-control" hidden>
                </div>
            </div>
            

            <div class="form-row">
                <div class="col-md-12">
                    <input type="date" name="MessageSentDateTime" value="<?php echo date("Y-m-d") ?>" class="form-control" readonly hidden>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-12">
                    <input type="checkbox" name="ActiveStatus" checked hidden>
                </div>
            </div>
            <br>
            <div class="form-row">
                <div class="col-md-12">
                    <input type="submit" name="submit" value="Reply" class="btn btn-success btn-sm">
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

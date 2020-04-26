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
        $status = $gateway->editComment($_POST);
    }
?>


<div class="right">
    <div class="container">
        <div class="bodyTop">
            <h3 class="text-center text-muted">Edit Comment</h3>
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
                    <textarea name="Message" value="" id="" cols="5" rows="5" class="form-control"><?php echo $thisMessage['Message'] ?></textarea>
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
                    <input type="submit" name="submit" value="Update" class="btn btn-success btn-sm">
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

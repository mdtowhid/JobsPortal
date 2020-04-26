<?php
    include_once('./header.php');

    $gateway = new Gateway();

    $messageId = $_GET['comment-id'];
    $thisMessage = $company->getMessageById($messageId);
    $status = "";
    if(isset($_POST['submit'])){
        $status = $company->editRawCommentById($_POST);
    }
?>


<div class="col-md-9">
        
        <form action="" method="post" class="">

            <input type="text" name="Id" value="<?php echo $thisMessage['Id'] ?>" hidden>
            

            <div class="form-row">
                <div class="col-md-12">
                    <label for=""><b>Message Title</b></label>
                    <input type="text" name="MessageTitle" class="form-control" value="<?php echo $thisMessage['MessageTitle'] ?>">
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-12">
                    <label for=""><b>Message</b></label>
                    <textarea name="Message" value="" id="" cols="5" rows="5" class="form-control"><?php echo $thisMessage['Message'] ?></textarea>
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

<br>
<br>
<br>
<br>
<br>
<br>
<?php include_once './footer.php';?>
</div>
</div>




<?php
include_once './footer.php';
?>
    </div>
    </div>
</body>
</html>

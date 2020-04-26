<?php
include_once 'header.php';
$status = "";

$messages = $company->getMessagesByCompanyId($companyId);

?>


<div class="col-md-9" id="messageBoxId">
        <?php 
            while($message = mysqli_fetch_assoc($messages)){?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header" id="messageCardHeaderId"><?php echo '<b>' . $message['CompanyName']. '<br> Subject: '.'</b>'.' '.$message['MessageTitle'] ?></div>
                            <div class="card-body" id="messageCardBodyId">
                                <div class="raw-message">
                                    <p class=""><?php echo $message['Message'] ?></p>
                                    <a href="edit-main-comment.php?comment-id=<?php echo $message['Id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                </div>

                                <?php
                                    $uniqueMessageCode = $message['CompanyRepliesUniqueNumber'];
                                    $repliedMessages = $gateway->getReplirdMessagesByMessageUniqueNumber($uniqueMessageCode);
                                    $currentRepliedMsgCode = "";
                                    while($reply = mysqli_fetch_assoc($repliedMessages)){?>
                                            <div class="card-text">
                                                <?php 
                                                    $currentRepliedMsgCode = $reply['MessageUniqueNumber'];
                                                    if($reply['MessageReplyType'] == "Admin"){?>
                                                        <div class="admin-replies">
                                                            <b>Admin</b>
                                                            <p><?php echo $reply['Message'] ?></p>
                                                        </div>
                                                <?php
                                                    } else if($reply['MessageReplyType'] == "User"){?>
                                                        <div class="user-replies">
                                                            <b><?php echo $message['CompanyName'] ?></b>
                                                            <p><?php echo $reply['Message'] ?></p>
                                                            <a href="edit-comment.php?comment-id=<?php echo $reply['Id']; ?>" class="btn btn-info btn-sm">Edit</a>
                                                            <a href="delete-comment.php?comment-id=<?php echo $reply['Id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                                                        </div>
                                                    <?php } ?>
                                            </div>
                                    <?php
                                        }
                                    ?>
                                    <br>
                                    <a href="comment-reply.php?comment-id=<?php echo $currentRepliedMsgCode?>" class="btn btn-info btn-sm">Reply</a>
                            </div>
                        </div>
                    </div>
               </div>
            <br>
        <?php
            }
        ?>
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

<script>
$(document).ready(function(){

    $('.showReplyFormBtn').click(function(){
        var y = $(this).find('.hidden_span').text();
        $('#' + y).fadeIn('slow');
    })

    $('.replyCancel').click(()=>{
        $('.reply-form').slideToggle('slow');
        $('#showReplyFormBtnId').show('slow');
    });

    $('#replyBtnId').click(()=>{
        if($('#userReplyId').val().length < 25){
            $('#userReplyErrorId').text('Minimum 25 character is required.');
            return false;
        }
    });

    $('#messageCardBodyId').hide();
    $('#messageCardHeaderId').click(()=>{
        $('#messageCardBodyId').slideToggle(1000);
    });
})
</script>
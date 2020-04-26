<?php
    include_once('./header.php');
    include_once('../Classes/admin.php');

    $admin = new Admin();
    $messages = $admin->getAllMessages();
?>


<div class="right">
    <div class="container">
        <div class="bodyTop">
            <h3 class="text-center text-muted">Companies Messages</h3>
        </div>
        
        <table class="table table-bordered table-hover table-condensed table-striped">
            <tr>
                <th>Company Name</th>
                <th>Message Title</th>
                <th>Message</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>

            <?php 
                while($row = mysqli_fetch_assoc($messages)){?>
                    <div class="row">
                        <div class="col-md-12">
                            <tr>
                                <td><?php echo $row['CompanyName'] ?></td>
                                <td><b><?php echo $row['MessageTitle'] ?></b></td>
                                <td><?php echo $row['Message'] ?></td>
                                <td><?php echo $row['MessageSentDateTime'] ?></td>
                                <td>
                                    <a class="btn btn-success btn-sm" href="message-reply.php?message-reply-unique-number=<?php echo $row['CompanyRepliesUniqueNumber'] ?>">Reply</a>
                                </td>
                            </tr>
                        </div>
                    </div>
            <?php
                }
            ?>
        </table>
        

    </div>
</div>





<?php
include_once './footer.php';
?>
    </div>
    </div>
</body>
</html>

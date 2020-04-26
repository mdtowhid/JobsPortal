<?php
include_once 'header.php';
$status = "";

$thisComany = $gateway->getCompanyDetailsById($companyId);
$uniquNumber = 'C_Id'.'_'.$thisComany['CompanyId'].'_CName_'.$thisComany['CompanyName'] . '_'.random_int(1, 1000);

if(isset($_POST['submit'])){
    $status = $company->connectWithAdmin($_POST);
}
?>


<div class="col-md-9">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <div class="bodyTop">
                    <h3 class="text-center text-muted">Contact With Admin.</h3>
                    <?php
                        if ($status != null) {?>
                            <h5 class="alert alert-success">
                                <?php echo $status; ?>
                            </h5>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>

        <form action="" method="POST" enctype="multipart/form-data" class="">
            <div class="form-row">
                <div class="col-md-6 mb-3">
                <input type="text" name="CompanyId" class="form-control" value="<?php echo $thisComany['CompanyId'] ?>"required hidden>
                </div>

                <div class="col-md-6 mb-3">
                <input type="text" name="CompanyName" class="form-control" value="<?php echo $thisComany['CompanyName'] ?>" required hidden>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-12 mb-3">
                <label><b>Subject</b></label>
                    <input type="text" name="MessageTitle" id="messageTitleId" class="form-control">
                    <div><b class="text-danger" id="messageTitleIdError"></b></div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-12 mb-3">
                <label><b>Leave your massege</b></label>
                    <textarea name="Message" id="messegesId" class="form-control" cols="5" rows="5" required></textarea>
                    <div><b class="text-danger" id="messageErrorId"></b></div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <input type="text" name="CompanyRepliesUniqueNumber" class="form-control" value="<?php echo  $uniquNumber ?>" required hidden>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <input type="date" name="MessageSentDateTime" class="form-control" value="<?php echo date("Y-m-d")?>" hidden/>
                </div>

                <div class="col-md-6 mb-3">
                    <input type="date" name="SeenStatus" class="form-control" value="not seen" hidden/>
                </div>

                <div class="col-md-6 mb-3">
                    <input type="checkbox" name="ActiveStatus" class="checkbox" required checked hidden>
                </div>
            </div>
            

            <input name="submit" id="adminConnectSubmitBtnId" class="btn btn-success" type="submit" value="Submit"/>
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



    <script>
        $(document).ready(function(){
            $('#adminConnectSubmitBtnId').click(()=>{
                if($('#messegesId').val().length < 100){
                    $('#messageErrorId').text("Minimum 100 characters required.");
                    return false;
                }
                return true;
            })
        });
    </script>
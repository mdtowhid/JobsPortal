<?php 

include_once './file-path.php';

$status = 0;
$recStatus = '';
$gateway = new Gateway();
$user = new User();
if(isset($_POST['submit'])){
    $status = $user->recoverAccount($_POST);
}

if(isset($_POST['recover_submit'])){
    $recStatus = $user->updatePassword($_POST);
    $status = 1;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../Assets/bootstrap.min.css">
    <link rel="stylesheet" href="../Assets/styles.css">
    <script src="../Scripts/jquery-3.3.1.min.js"></script>
    <title>Recover Account</title>
</head>
<body class="login-page">
    <div class="container">
        <br>
        <br>
        <button onclick="return window.history.back();" class="btn btn-primary">Back</button>

        <?php 
            if($status == 1){?>
                <div class="row">
                    <form action="" method="post" class="center">
                            <div class="form-row custom-form-row">
                                <input type="text" name="JobSeekerId" value="<?php echo $_SESSION['JobSeekerId'] ?>" class="form-control" required hidden>
                                <input type="text" name="Email" value="<?php echo $_SESSION['Email'] ?>" class="form-control" required hidden>
                                <label>Enter New Password</label>
                                <input type="text" id="recPass" name="Password" min="5" class="form-control" placeholder="Enter new password"required>
                            </div>

                            <div class="form-row custom-form-row" style="margin-left: -5px;">
                                <div class="col-md-10 col-md-offset-2 mb-3">
                                    <input type="submit" name="recover_submit" value="Change password" class="btn btn-primary">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-10 text-center">
                                    <?php 
                                        if($recStatus != null){?>
                                            <div class="alert alert-success ?>">
                                                <?php echo $recStatus; ?>
                                                <br>
                                                <a href="./log-in.php">Goto Log in page</a>
                                            </div>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            <?php 
                }

            else if($status == 0){?>
                <div class="row">
                    <form action="" method="post" class="center">
                        <div class="form-row">
                            <div class="col-md-12 text-center">
                                <h3>Recover Account</h3>
                            </div>
                        </div>

                        <div class="form-row custom-form-row">
                            <div class="col-md-12 mb-3">
                                <label style="width: 100%;">Enter your email
                                    <input type="text" name="Email" class="form-control" placeholder="Email"required>
                                </label>
                            </div>
                        </div>

                        <div class="form-row custom-form-row" style="margin-top: -10px;">
                            <div class="col-md-10 col-md-offset-2 mb-3">
                                <input type="submit" name="submit" value="Find your account" class="btn btn-primary">
                            </div>
                        </div>

                        
                        <div class="form-row custom-form-row">
                            <div class="col-md-10 mb-3">
                                <?php 
                                    if($status != null){
                                        echo '<div class="alert alert-danger">' . $status . '</div>';
                                    }
                                ?>
                            </div>
                        </div>
                    </form>
                </div>
            <?php
                }
            ?>
    </div>

    <script>
        $(document).ready(()=>{
            $("input[name='recover_submit']").click(()=>{
                $recPassVal = $('#recPass').val();
                if($recPassVal.length === 0){
                    alert("Please enter new password.");
                    return false;
                }else if($recPassVal.length < 6){
                    alert("Password must be six character long");
                    return false;
                }else{
                    return confirm("Are you sure you want to change your password?") ? true : false;
                }        
            });
        });
    </script>
</body>
</html>
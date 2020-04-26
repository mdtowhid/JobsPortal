<?php 

include_once '../Classes/admin.php';

$errorStatus = '';
$admin = new Admin();
if(isset($_POST['submit'])){
    $errorStatus = $admin->logInAsAdmin($_POST);
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
    <title>Admin Login</title>
</head>
<body class="login-page">
    <div class="container">
        <br>

        <div class="row">
            <form action="" method="post" class="center">
                <div class="form-row">
                    <div class="col-md-12 text-center">
                        <h3>Login as Admin.</h3>
                        <?php 
                            if($errorStatus != null){?>
                                <div class="alert alert-danger">
                                    <?php echo "<b>'$errorStatus'</b>" ?>
                                </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
                <div class="form-row custom-form-row">
                    <div class="col-md-12 mb-3">
                        <label style="width: 100%;">Email
                            <input type="text" name="Email" class="form-control" placeholder="Email"required>
                        </label>
                    </div>
                </div>

                <div class="form-row custom-form-row" style="margin-top: -10px;">
                    <div class="col-md-12 mb-3">
                        <label style="width: 100%;">Password
                            <input type="password" name="Password" class="form-control" placeholder="Password" required>
                        </label>
                    </div>
                </div>

                <div class="form-row custom-form-row" style="margin-top: -10px;">
                    <div class="col-md-10 col-md-offset-2 mb-3">
                        <input type="submit" name="submit" value="Log In" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
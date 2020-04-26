<?php
    include_once('./header.php');
    include_once('../Classes/admin.php');

    $admin = new Admin();
    $companies = $admin->getCompanies();
?>


<div class="right">
    <div class="container">
        <div class="bodyTop">
            <h3 class="text-center text-muted">Companies</h3>
        </div>
        
        <table class="table table-bordered table-condensed table-hover">  
            <tr class="text-center">
                <th>Company Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Phone Number</th>
                <th>Actions</th>
            </tr>
            <?php 
                while($cmp = mysqli_fetch_assoc($companies)){?>
                <tr>
                    <td><?php echo $cmp['CompanyName']; ?></td>
                    <td><?php echo $cmp['Email'] ?></td>
                    <td><?php echo $cmp['Address'] ?></td>
                    <td><?php echo $cmp['PhoneNumber'] ?></td>
                    <td><a href="company-details.php?companyId=<?php echo $cmp['CompanyId'] ?>">Details</a></td>
                </tr>
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

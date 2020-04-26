<?php
include_once '../Classes/database.php';
include_once '../Classes/businessLogic.php';
class Admin extends DB
{
    public function addAdmin($data)
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            if (strlen($data['Password']) < 5) {
                return "Password must be six character long.";
            }
            if (!filter_var($data['Email'], FILTER_VALIDATE_EMAIL)) {
                return "Invalid email format";
            }

            $date = date("Y-m-d");
            
            $gateway = new Gateway();
            $url = $gateway->uploadImage($_FILES['ImageUrl']);

            $query = "INSERT INTO admins VALUES('', '$data[FirstName]',
            '$data[LastName]', '$data[Email]', '$data[Password]', 
            '$data[PhoneNo]','$data[Gender]', '$url', '$date')";

            return $this->executeQuery($query) ? "Admin Added successfully" : $this->conn->error;
        } else {
            return "Oops! There is a problem while posting your data.";
        }
    }

    public function getAdminById($id){
        $query = "SELECT * FROM admins where AdminId = '$id'";
        return $this->executeQuery($query) ? mysqli_fetch_assoc($this->executeQuery($query)) : $this->conn->error;
    }

    public function getAdmins()
    {
        $query = "SELECT * FROM admins";
        return $this->executeQuery($query) ? $this->executeQuery($query) : $this->conn->error;
    }

    public function updateAdmin($data){

        $gateway = new Gateway();
        $data['ImageUrl'] = $gateway->uploadImage($_FILES['ImageUrl']);

        $query = "UPDATE admins 
         SET
         FirstName='$data[FirstName]',
         LastName='$data[LastName]',
         Email='$data[Email]',
         Password='$data[Password]',
         PhoneNo='$data[PhoneNo]',
         Gender='$data[Gender]',
         ImageUrl='$data[ImageUrl]' 
         WHERE AdminId='$data[AdminId]'";
        
        return $this->executeQuery($query) ? "Admin details updated successfully." : $this->conn->error;
    }

    public function getCompanies(){
        $query = "SELECT * FROM companies";
        return $this->executeQuery($query) ? $this->executeQuery($query) : $this->conn->error;
    }

    public function getJobSeekers(){
        $query = "SELECT * FROM job_seekers";
        return $this->executeQuery($query) ? $this->executeQuery($query) : $this->conn->error;
    }

    public function addJobCategory($data)
    {
        $query = "INSERT INTO job_categories VALUES('', '$data[CatgoryName]')";
        if (strlen($data['CatgoryName']) < 3) {
            return "Category must be greater than three character.";
        } else {
            return $this->executeQuery($query) ? "New job category added successfully." : $this->conn->error;
        }
    }
    
    public function updateJobCategory($data)
    {
        $query = "UPDATE job_categories SET CatgoryName = '$data[CatgoryName]' WHERE CategoryId = '$data[CategoryId]'";
        return $this->executeQuery($query) ? header('Location: add-categories.php') : $this->conn->error;
    }

    public function getUsers(){
        $query = "SELECT * FROM job_seekers";
        return $this->executeQuery($query) ? mysqli_query($this->conn, $query) : $this->conn->error;
    }

    public function updateCompanyById($data){
        $status = 0;
        $status = isset($_POST['IsActive']) ? 1 : 0;
        
        $query = "UPDATE companies SET CompanyName = '$data[CompanyName]', Email = '$data[Email]', Address = '$data[Address]', PhoneNumber='$data[PhoneNumber]', Password='$data[Password]', IsActive = '$status' WHERE CompanyId='$data[CompanyId]'";

        return $this->executeQuery($query) ? header("Location: ./company-details.php?companyId=$data[CompanyId]") : $this->conn->error;
    }

    public function updateUserById($data){
        $status = isset($data['ActiveStatus']) ? 1 : 0;
        $query = "UPDATE job_seekers SET ActiveStatus='$status' WHERE JobSeekerId='$data[JobSeekerId]'";
        $id = $data[JobSeekerId];
        return $this->executeQuery($query) ? header("Location: ./job-seeker-details.php?seekerId=$id") : $this->conn->error;
    }

    public function getAllMessages(){
        $query = "select * from admin_company_messages";
        return $this->executeQuery($query) ? $this->executeQuery($query) : $this->conn->error;
    }

    public function getMessageByMessageUniqueNumber($unqNumber){
        $query = "select * from admin_company_messages where CompanyRepliesUniqueNumber='$unqNumber'";
        return $this->executeQuery($query) ? mysqli_fetch_assoc($this->executeQuery($query)) : $this->conn->error;
    }

    public function executeQuery($query){
        return mysqli_query($this->conn, $query);
    }

    public function logInAsAdmin($data){
        $query = "SELECT * from admins WHERE Email = '$data[Email]' AND Password = '$data[Password]'";
        
        if ($this->executeQuery($query)) {
            $queryRes = $this->executeQuery($query);

            $admin = mysqli_fetch_assoc($queryRes);

            if($admin){
                session_start();
                $_SESSION['AdminId'] = $admin['AdminId'];
                $_SESSION['FirstName'] = $admin['FirstName'];
                $_SESSION['LastName'] = $admin['LastName'];
                $_SESSION['Email'] = $admin['Email'];
                $_SESSION['ImageUrl'] = $admin['ImageUrl'];
                header("Location: ./home.php");
            }else{
                $errorStatus = "Oops! Given information is e";
                return $errorStatus;
            }
        } else {
            echo $this->conn->error;
        }
    }

    public function logOut(){
        session_destroy();
        header("Location: ./login.php");
    }
}

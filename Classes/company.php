<?php
include_once '../Classes/database.php';

class Company extends DB{

    public function uploadImage($data)
    {
        $fileName = $_FILES['ImageUrl']['name'];
        $targetFolder = '../CompanyLogos/';
        $tempName = $_FILES['ImageUrl']['tmp_name'];
        $fileUrl = $targetFolder . $fileName;
        $fileSize = $_FILES['ImageUrl']['size'];
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        $check = getimagesize($tempName);
        if ($check) {
            if (file_exists($fileUrl)) {
                die("This file already exist");
            } else {
                if ($fileSize >= 700000) {
                    die("File is too large to upload");
                } else {
                    if ($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg") {
                        die("File type is not jpg or png or jpeg");
                    } else {
                        if (move_uploaded_file($tempName, $fileUrl)) {
                            return $fileUrl;
                        }
                    }
                }
            }
        }
    }

    public function isExistUser($email){
        $query = "SELECT * FROM companies WHERE Email = '$email'";
        return $this->executeQuery($query) ? mysqli_fetch_assoc($this->executeQuery($query)):$this->conn->error;
    }

    public function recoverAccount($data){
        $thisUser = $this->isExistUser($data['Email']);

        if($thisUser == null){
            return "Sorry we did not found this account";
        }else if($data['Email'] == $thisUser['Email']){
            $_SESSION['CompanyId'] = $thisUser['CompanyId'];
            $_SESSION['Email'] = $thisUser['Email'];
            return 1;
        }
    }

    public function updatePassword($data){
        $query = "UPDATE companies 
                SET 
                Password = '$data[Password]', 
                ConfirmPassword = '$data[Password]' 
                WHERE CompanyId = '$data[CompanyId]'";
        return $this->executeQuery($query) 
        ?
        "Password Changed Successfully."
        : 
        $this->conn->error;
    }

    public function createAccount($data)
    {
        $activeStatus = 1;
        $data['LicensePath'] = "";
        $data['PhoneNumber'] = '+88'.$data['PhoneNumber'];

        if($data['Password'] != $data['ConfirmPassword']){
            return "Password and Confirm Password doese not matched";
        }
        if (filter_var($data['Email'], FILTER_VALIDATE_EMAIL)) {
            //
        }else{
            $_SESSION['ErrorClass'] = "alert alert-danger";
            return "Invalid email format";
        }
        $logoPath = $this->uploadImage($_FILES['ImageUrl']);
        $query = "INSERT INTO companies VALUES('', '$data[CompanyName]', '$data[Email]', '$data[Address]', '$activeStatus', '$data[PhoneNumber]', '$data[Password]', '$data[Password]', '$logoPath', '$data[LicensePath]')";
        return $this->executeQuery($query) ? "Account created successfully." : $this->conn->error;
    }

    public function storeNotificationInfoes($data){

    }

    public function addJob($data){
        $status = 0;
        $jobId = 0;
        $status = isset($_POST['ActiveStatus']) ? 1 : 0;
        $query = "INSERT INTO job_posted_by_companies VALUES('', '$data[JobTitle]', '$data[Vacancy]', '$data[JobContext]', '$data[JobResponsibility]', '$data[EmploymentStatus]', '$data[EducationalReq]', '$data[ExperienceReq]', '$data[AdditionalReq]', '$data[JobLocation]', '$data[Salary]', '$data[OtherBenefit]', '$data[CompanyId]', '$data[CategoryId]', '$data[PostedDate]', '$data[DeadLineDate]', '$status')";
        
        $this->executeQuery($query) ?  $jobId = mysqli_insert_id($this->conn) : $this->conn->error;

        $_SESSION['PostSuccess'] = "New job posted successfully.";
        /////////////////
        $notificationTableQuery = "INSERT INTO new_job_notifications VALUES('', '$data[CompanyId]', '$jobId', '0', 'Not Seen')";
        $this->executeQuery($notificationTableQuery);
        return;
    }

    public function getPostedJobById($id)
    {
        $query = "SELECT * from job_posted_by_companies WHERE JobId = '$id'";
        return $this->executeQuery($query) ? mysqli_fetch_assoc($this->executeQuery($query)) : $this->conn->error;
    }

    public function updatePostedJob($data){
        $status = 0;
        $status = isset($_POST['Status']) ? 1 : 0;

        $query = "UPDATE job_posted_by_companies 
        SET 
        JobTitle = '$data[JobTitle]', 
        Vacancy = '$data[Vacancy]', 
        JobContext = '$data[JobContext]',
        JobResponsibility = '$data[JobResponsibility]', 
        EmploymentStatus = '$data[EmploymentStatus]',
        EducationalReq = '$data[EducationalReq]', 
        ExperienceReq = '$data[ExperienceReq]',
        AdditionalReq = '$data[AdditionalReq]',
        JobLocation = '$data[JobLocation]', 
        Salary = '$data[Salary]', 
        OtherBenefit = '$data[OtherBenefit]',
        CompanyId = '$data[CompanyId]', 
        CategoryId = '$data[CategoryId]', 
        PostedDate = '$data[PostedDate]', 
        DeadLineDate = '$data[DeadLineDate]', 
        ActiveStatus = '$status'
        WHERE JobId = '$data[JobId]'";

        return $this->executeQuery($query) ? "This Job updated successfully." : $this->conn->error;
    }

    public function deleteJob($id){
        $query = "DELETE FROM job_posted_by_companies WHERE JobId = '$id'";
        return $this->executeQuery($query) ? header("Location: index.php") : $this->conn->error;
    }

    public function getSeekersByAppliedJobId($jobId){
        $seekers = array();
        $queryRes = $this->getJob($jobId);
        while($seeker = mysqli_fetch_assoc($queryRes)){
            $seekers[] = $this->getSeekers($seeker['SeekerId']);
        }
        return $seekers;
    }
    
    public function getSeekers($seekerId){
        $query = "SELECT * from job_seekers WHERE JobSeekerId = '$seekerId'";
        return $this->executeQuery($query) ? mysqli_fetch_assoc($this->executeQuery($query)) : $this->conn->error;
    }

    private function getJob($jobId){
        $query = "SELECT * from company_job_seekers WHERE JobId = '$jobId'";
        return $this->executeQuery($query) ? $this->executeQuery($query) : $this->conn->error;
    }

    public function updateEligibleSeeker($data){
        $thisEligibleSeeker = $this->getAppliedOrEligibleSeekerHistoryBySeekerId($data['JobId'], $data['SeekerId']);

        $query = "UPDATE company_job_seekers SET IsEligible = '1', ActiveStatus='1' WHERE JobId = '$data[JobId]' AND CompanyId = '$data[CompanyId]' AND SeekerId = '$thisEligibleSeeker[SeekerId]'";
        
        if($this->executeQuery($query)){
            $thisSeeker = $this->getAppliedOrEligibleSeekerHistoryBySeekerId($thisEligibleSeeker['JobId'], $thisEligibleSeeker['SeekerId']);
            return $thisSeeker;
        }else{
            echo $this->conn->error;
        }
    }

    public function updateEligibledSeeker($data){
        $thisEligibleSeeker = $this->getAppliedOrEligibleSeekerHistoryBySeekerId($data['JobId'], $data['SeekerId']);

        $query = "UPDATE company_job_seekers SET IsEligible = '0', ActiveStatus='0' WHERE JobId = '$data[JobId]' AND SeekerId = '$thisEligibleSeeker[SeekerId]'";
        
        if($this->executeQuery($query)){
            $thisSeeker = $this->getAppliedOrEligibleSeekerHistoryBySeekerId($thisEligibleSeeker['JobId'], $thisEligibleSeeker['SeekerId']);
            return $thisSeeker;
        }else{
            echo $this->conn->error;
        }
    }

    public function getAppliedOrEligibleSeekerHistoryBySeekerId($jobId, $seekerId){
        $query = "SELECT * FROM company_job_seekers WHERE JobId='$jobId' AND SeekerId = '$seekerId'";
        return $this->executeQuery($query) ? mysqli_fetch_assoc($this->executeQuery($query)) : $this->conn->error;
    }

    public function getEligibledSeekersByCompanyId($companyId){
        $query = "SELECT * from company_job_seekers WHERE CompanyId = '$companyId' AND IsEligible='1'";
        return $this->executeQuery($query) ? $this->executeQuery($query) : $this->conn->error;
    }

    public function updateCompany($data){
        $query = "UPDATE companies SET 
        CompanyName = '$data[CompanyName]', 
        Email = '$data[Email]', 
        Address = '$data[Address]', 
        PhoneNumber='$data[PhoneNumber]', 
        Password='$data[Password]', 
        ConfirmPassword='$data[ConfirmPassword]'
        WHERE CompanyId='$data[CompanyId]'";
        return $this->executeQuery($query) ? header("Location: ./my-profile.php") : $this->conn->error;
    }

    public function connectWithAdmin($data){
        $data['ActiveStatus'] = 1;
        $data['SeenStatus'] = "not seen";
        $query = "INSERT INTO admin_company_messages VALUES(
                '',
                '$data[CompanyId]',
                '$data[CompanyName]',
                '$data[MessageTitle]',
                '$data[Message]',
                '$data[CompanyRepliesUniqueNumber]',
                '$data[MessageSentDateTime]',
                '$data[SeenStatus]',
                '$data[ActiveStatus]'
            )";
        return $this->executeQuery($query) ? "Messages sent to the admin." : $this->conn->error;
    }

    public function getMessagesByCompanyId($companyId){
        $query = "Select * from admin_company_messages where CompanyId='$companyId'";
        return $this->executeQuery($query) ? $this->executeQuery($query) : $this->conn->error;
    }

    public function getMessageById($id){
        $query = "Select * from admin_company_messages where Id='$id'";
        return $this->executeQuery($query) ? mysqli_fetch_assoc($this->executeQuery($query)) : $this->conn->error;
    }

    public function editRawCommentById($data){
        $query = "update admin_company_messages set MessageTitle='$data[MessageTitle]', Message='$data[Message]' Where Id='$data[Id]'";
        return $this->executeQuery($query) ? header('Location: ./messages.php') : $this->conn->error;
    }

    public function uploadOrUpdateCompanyLicense($data){
        $fileName = $_FILES['LicensePath']['name'];
        $targetFolder = '../CompanyLogos/License/';
        $tempName = $_FILES['LicensePath']['tmp_name'];
        $fileUrl = $targetFolder . $fileName;
        $fileSize = $_FILES['LicensePath']['size'];
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        if($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg"){
            die("Only JPG or JPEG or PNG file format supported.");
        }else{
            if(file_exists($fileUrl)){
                unlink($fileUrl);
            }
            if(move_uploaded_file($tempName, $fileUrl)){
                return $fileUrl;
            }
        }
        
    }

    public function uploadLicense($data){
        $pathUrl = $this->uploadOrUpdateCompanyLicense($_FILES['LicensePath']);
        $query = "UPDATE companies SET LicensePath = '$pathUrl' WHERE CompanyId = '$data[CompanyId]'";
        return $this->executeQuery($query) ? header('Location: ./my-profile.php') : $this->conn->error;
    }

    public function executeQuery($query){
        return mysqli_query($this->conn, $query);
    }
}
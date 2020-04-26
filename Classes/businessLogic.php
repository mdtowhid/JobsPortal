<?php
$filePath1 = '../Classes/database.php';
$filePath2 = './Classes/database.php';

if(!file_exists($filePath1)){
    include_once './Classes/database.php';
}
if(!file_exists($filePath2)){
    include_once '../../Jobs/Classes/database.php';
}

class Gateway extends DB
{
    
	public function uploadImage($data)
    {
        $fileName = $_FILES['ImageUrl']['name'];
        $targetFolder = '../images/';
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

    public function getJobCategories()
    {
        $query = "SELECT * FROM job_categories";
        return $this->executeQuery($query) ? $this->executeQuery($query) : $this->conn->error;
    }

    public function getJobCategoryById($id)
    {
        $query = "SELECT * FROM job_categories WHERE CategoryId = '$id'";
        return $this->executeQuery($query) ? mysqli_fetch_assoc($this->executeQuery($query)) : $this->conn->error;
    }

    public function searchJobs($searchValue)
    {
        $query = "SELECT * FROM job_posted_by_companies WHERE JobTitle LIKE '%$searchValue%' OR JobLocation LIKE '%$searchValue%'";
        return $this->executeQuery($query) ? $this->executeQuery($query) : $this->conn->error;
    }

    public function getPostedJobsByCategoryId($id)
    {
        $query = "SELECT * from companies join job_posted_by_companies on companies.CompanyId = job_posted_by_companies.companyId AND CategoryId = '$id'";
        return $this->executeQuery($query) ? $this->executeQuery($query) : $this->conn->error;
    }

    public function getCompanies(){
        $query = "SELECT * FROM companies";
        return $this->executeQuery($query) ? $this->executeQuery($query) : $this->conn->error;
    }

    public function getPostedJobsByCompanyId($id)
    {
        $query = "SELECT * from job_posted_by_companies WHERE CompanyId = '$id' ORDER BY PostedDate DESC";
        return $this->executeQuery($query) ? $this->executeQuery($query) : $this->conn->error;
    }

    public function getPostedJobsWithLimit()
    {
        $query = "SELECT * from job_posted_by_companies ORDER by JobId DESC LIMIT 5 ";
        return $this->executeQuery($query) ? $this->executeQuery($query) : $this->conn->error;
    }

    public function getPostedJobById($id)
    {
        $query = "SELECT * from job_posted_by_companies WHERE JobId = '$id'";
        return $this->executeQuery($query) ? mysqli_fetch_assoc($this->executeQuery($query)) : $this->conn->error;
    }

    public function applyJob($data){
        $isEligible = 0;
        $activeStatus = 0;
        $appliedStatus = "Applied";
        $query = "INSERT INTO company_job_seekers VALUES('', '$data[JobId]', '$data[CompanyId]', '$data[SeekerId]', '$data[AppliedDate]',  '$appliedStatus', '$isEligible', '$activeStatus')";
        
        return $this->executeQuery($query) ? "Job Applied." : $this->conn->error;
    }

    public function getAppliedJobBySeekerId($jobId, $seekerId){
        $query = "SELECT * from company_job_seekers WHERE JobId='$jobId' AND SeekerId = '$seekerId'";
        return $this->executeQuery($query) ? mysqli_fetch_assoc($this->executeQuery($query)) : $this->conn->error;
    }

    public function getCompanyDetailsById($id){
        $query = "SELECT * from companies WHERE CompanyId='$id'";
        return $this->executeQuery($query) ? mysqli_fetch_assoc($this->executeQuery($query)) : $this->conn->error;
    }

    public function loginAsJobSeeker($data){
        $query = "SELECT * from job_seekers WHERE Email = '$data[Email]' AND Password = '$data[Password]'";
        if ($this->executeQuery($query)) {
            $seeker = mysqli_fetch_assoc($this->executeQuery($query));
            if($seeker){
                session_start();
                $_SESSION['JobSeekerId'] = $seeker['JobSeekerId'];
                $_SESSION['FirstName'] = $seeker['FirstName'];
                $_SESSION['LastName'] = $seeker['LastName'];
                $_SESSION['Email'] = $seeker['Email'];
                header("Location: ./index.php");
            }else{
                return "Oops! Given information is error.";
            }
        } else {
            echo $this->conn->error;
        }
    }

    public function loginAsEmployeer($data){
        $query = "SELECT * from companies WHERE Email = '$data[Email]' AND Password = '$data[Password]' AND IsActive = true";
        if ($this->executeQuery($query)) {
            $employeer = mysqli_fetch_assoc($this->executeQuery($query));
            if($employeer){
                session_start();
                $_SESSION['CompanyId'] = $employeer['CompanyId'];
                $_SESSION['CompanyName'] = $employeer['CompanyName'];
                $_SESSION['Email'] = $employeer['Email'];
                var_dump($_SESSION['CompanyId']);
                header("Location: ./index.php");
            }else{
                return "Oops! Given information is error.";
            }
        } else {
            echo $this->conn->error;
        }
    }


    public function logOut(){
        session_destroy();
        header("Location: ../index.php");
    }

    public function sentMessage($data){
        $data['ActiveStatus'] = 1;

        if($data['MessageReplyType'] == "Admin"){
            $this->update_admin_company_message_Table($data['MessageUniqueNumber']);
        }

        $query = "INSERT INTO admin_company_replied_messages VALUES('', '$data[AdminId]', '$data[CompanyId]', '$data[MessageUniqueNumber]', '$data[Message]', '$data[MessageReplyType]', '$data[MessageSentDateTime]', '$data[ActiveStatus]')";

        return $this->executeQuery($query) ? "Message sent to the company." : $this->conn->error;
    }

    public function update_admin_company_message_Table($companyRepliesUniqueNumber){
        $query = "update admin_company_messages set SeenStatus = 'seen' where CompanyRepliesUniqueNumber='$companyRepliesUniqueNumber'";
        return $this->executeQuery($query) ? $this->executeQuery($query) : $this->conn->error;
    }

    public function getReplirdMessagesByMessageUniqueNumber($messageUniqueNumber){
        $query = "Select * from admin_company_replied_messages where MessageUniqueNumber='$messageUniqueNumber'";
        return $this->executeQuery($query) ? $this->executeQuery($query) : $this->conn->error;
    }

    public function getRepliedMessageById($msgId){
        $query = "Select * from admin_company_replied_messages where Id='$msgId'";
        return $this->executeQuery($query) ? mysqli_fetch_assoc($this->executeQuery($query)) : $this->conn->error;
    }

    public function editComment($data){
        $query = "Update admin_company_replied_messages SET Message='$data[Message]' Where Id='$data[Id]'";
        return $this->executeQuery($query) ? header("Location: ./messages.php") : $this->conn->error;
    }

    public function deleteComment($data){
        $query = "Delete From admin_company_replied_messages Where Id='$data[Id]'";
        return $this->executeQuery($query) ? header("Location: ./messages.php") : $this->conn->error;
    }

    public function storeReview($data){
        $query = "INSERT INTO reviews  VALUES(
                    '',
                    '$data[ReviewText]',
                    '$data[CompanyId]',
                    '$data[SeekerId]',
                    '$data[ReviewStatus]',
                    '$data[ReviewNumber]',
                    '$data[Reviewed]',
                    '$data[ReviewFor]'
                )";
        return $this->executeQuery($query) ? "Thanks for your review." : $this->conn->error;
    }

    public function updateReview($data){
        $query = "UPDATE reviews 
                    SET ReviewNumber = '$data[ReviewNumber]',
                    ReviewText = '$data[ReviewText]',
                    ReviewStatus = '$data[ReviewStatus]'
                    WHERE Id = '$data[Id]'
                ";
        
        return $this->executeQuery($query) ? header("Location: ./index.php") : $this->conn->error;
    }

    public function getReviews(){
        $query = "SELECT * FROM reviews";
        return $this->executeQuery($query) ? $this->executeQuery($query) : $this->conn->error;
    }

    public function getReviewByCompanyId($id){
        $query = "SELECT * FROM reviews WHERE CompanyId = '$id'";
        return $this->executeQuery($query) ? mysqli_fetch_assoc($this->executeQuery($query)) : $this->conn->error;
    }

    public function getReviewBySeekerId($seekerId){
        $query = "Select * from reviews where SeekerId = '$seekerId'";
        return $this->executeQuery($query) ? mysqli_fetch_assoc($this->executeQuery($query)) : $this->conn->error;
    }

    public function getReviewsByCompanyId($id){
        $query = "SELECT * FROM reviews WHERE CompanyId = '$id'";
        return $this->executeQuery($query) ? $this->executeQuery($query) : $this->conn->error;
    }

    public function getReviewByCompanyIdAndSeekerId($cId, $uId){
        $query = "SELECT * FROM reviews WHERE CompanyId = '$cId' AND SeekerId = '$uId'";
        return $this->executeQuery($query) ? mysqli_fetch_assoc($this->executeQuery($query)) : $this->conn->error;
    }

    public function isReviewedCompany($comId, $seekId){
        $query = "SELECT * FROM reviews WHERE CompanyId = '$comId' AND SeekerId = '$seekId'";
        return $this->executeQuery($query)?mysqli_fetch_assoc($this->executeQuery($query)): $this->conn->error;
    }

    public function maxDataColumn(){
        $query = "SELECT MAX(JobId) AS DataColumn FROM job_posted_by_companies";
        return $this->executeQuery($query) ? mysqli_fetch_assoc($this->executeQuery($query)) : $this->conn->error;
    }

    

    public function getSeekers(){
        $query = "SELECT * FROM job_seekers";
        return $this->executeQuery($query) ? $this->executeQuery($query) : $this->conn->error;
    }

    public function executeQuery($query){
        return mysqli_query($this->conn, $query);
    }

    
}
<?php
$dbPath1 = 'Classes/database.php';

if(!file_exists($dbPath1)){
    include_once '../Classes/database.php';
}
$businessLogicPath1 = 'Classes/businessLogic.php';

if(!file_exists($businessLogicPath1)){
    include_once '../Classes/businessLogic.php';
}else{
    include_once 'Classes/businessLogic.php';
}


class User extends DB{
    
    public function uploadImage($data)
    {
        $fileName = $_FILES['ImageUrl']['name'];
        $targetFolder = './UserImg/';
        if(!file_exists($targetFolder)){
            $targetFolder = '../UserImg/';
        }
        $tempName = $_FILES['ImageUrl']['tmp_name'];
        $fileUrl = $targetFolder . $fileName;
        $fileSize = $_FILES['ImageUrl']['size'];
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        $check = getimagesize($tempName);
        if ($check) {
            if (file_exists($fileUrl)) {
                die("This file already exist.");
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
        $query = "SELECT * FROM job_seekers WHERE Email = '$email'";
        return $this->executeQuery($query) ? mysqli_fetch_assoc($this->executeQuery($query)):$this->conn->error;
    }

    public function recoverAccount($data){
        $thisUser = $this->isExistUser($data['Email']);

        if($thisUser == null){
            return "Sorry we did not found this account";
        }else if($data['Email'] == $thisUser['Email']){
            $_SESSION['JobSeekerId'] = $thisUser['JobSeekerId'];
            $_SESSION['Email'] = $thisUser['Email'];
            return 1;
        }
    }

    public function updatePassword($data){
        $query = "UPDATE job_seekers 
                SET 
                Password = '$data[Password]', 
                ConfirmPassword = '$data[Password]' 
                WHERE JobSeekerId = '$data[JobSeekerId]'";
        return $this->executeQuery($query) 
        ?
        "Password Changed Successfully"
        : 
        $this->conn->error;
    }

    public function isExistNID($nid){
        $query = "SELECT * FROM job_seekers WHERE NIDNumber = '$nid'";
        return $this->executeQuery($query) ? mysqli_fetch_assoc($this->executeQuery($query)):$this->conn->error;
    }

    public function addUser($data)
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            session_start();

            if (strlen($data['Password']) < 5) {
                $_SESSION['ErrorClass'] = "alert alert-danger";
                return "Password must be six character long.";
            }
            if (filter_var($data['Email'], FILTER_VALIDATE_EMAIL)) {
                //
            }else{
                $_SESSION['ErrorClass'] = "alert alert-danger";
                return "Invalid email format";
            }

            $isExistEmail = $this->isExistUser($data['Email']);
            $isExistNID = $this->isExistNID($data['NIDNumber']);

            if($data['Email'] == $isExistEmail['Email']){
                $_SESSION['ErrorClass'] = "alert alert-danger";
                return $data['Email'] . " This email already exist. Taken by another user.";
            }

            if($data['NIDNumber'] == $isExistNID['NIDNumber']){
                $_SESSION['ErrorClass'] = "alert alert-danger";
                return $data['NIDNumber'] . " This NID Number already exist. Taken by another user.";
            }

            $date = date("Y-m-d");

            $url = $this->uploadImage($_FILES['ImageUrl']);
            $data['PhoneNo'] = '+88'.$data['PhoneNo'];

            if($url == "" || strlen($url) <= 0){
                $_SESSION['ErrorClass'] = "alert alert-danger";
                return "Oops! There is a problem while creating your account.";
            }

            $data['ActiveStatus'] = 1;
            $data['CVPath'] = "";

            $query = "INSERT INTO job_seekers VALUES('', 
            '$data[FirstName]', '$data[LastName]', '$data[FatherName]', '$data[MotherName]', '$data[Email]', '$data[Address]', '$data[Password]', '$data[ConfirmPassword]', '$data[PhoneNo]', '$url', '$data[ActiveStatus]', '$date','$data[Gender]', '$data[CVPath]', '$data[NIDNumber]')";

            if (mysqli_query($this->conn, $query)) {
                $_SESSION['ErrorClass'] = "alert alert-info";
                return "Welcome " . $data['FirstName'] . " " . $data['LastName'] . " Your information is added successfully";
            } else {
                echo $this->conn->error;
            }
        } else {
            $_SESSION['ErrorClass'] = "alert alert-danger";
            return "Oops! There is a problem while creating your account.";
        }
    }

    public function uploadCVS($data){
        $fileName = $_FILES['CVPath']['name'];
        $targetFolder = '../CVs/';
        $tempName = $_FILES['CVPath']['tmp_name'];
        $fileUrl = $targetFolder . $fileName;
        $fileSize = $_FILES['CVPath']['size'];
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        if($fileType != 'pdf'){
            die("Only pdf file format supported.");
        }else{
            if(file_exists($fileUrl)){
                unlink($fileUrl);
            }
            if(move_uploaded_file($tempName, $fileUrl)){
                return $fileUrl;
            }
        }
        
    }

    public function uploadNewCVBySeekerId($data){
        $cvPath = $this->uploadCVS($_FILES['CVPath']);
        $query = "UPDATE job_seekers SET CVPath = '$cvPath' WHERE JobSeekerId = '$data[JobSeekerId]'";
        return $this->executeQuery($query) ? "Your new CV uploaded successfully." : $this->conn->error;

    }

    public function updateUser($data){
        $thisUser = $this->getUserById($data['JobSeekerId']);
        $this->unlinkPreviousImageWhileUpdating($thisUser['ImageUrl']);

        $photoPath = $this->uploadImage($_FILES['ImageUrl']);

        $data['ActiveStatus'] = 1;

        $query = "UPDATE job_seekers
                SET 
                FirstName = '$data[FirstName]',
                LastName = '$data[LastName]',
                FatherName = '$data[FatherName]',
                MotherName = '$data[MotherName]',
                Email = '$data[Email]',
                Address = '$data[Address]',
                Password = '$data[Password]',
                ConfirmPassword = '$data[ConfirmPassword]',
                PhoneNo = '$data[PhoneNo]',
                ImageUrl = '$photoPath',
                ActiveStatus = '$data[ActiveStatus]',
                CreationDate = '$data[CreationDate]',
                Gender = '$data[Gender]',
                NIDNumber = '$data[NIDNumber]'
                WHERE JobSeekerId = '$data[JobSeekerId]'

                ";

        return $this->executeQuery($query) ? header("Location: ./index.php") : $this->conn->error;
    }

    public function unlinkPreviousImageWhileUpdating($imageUrl){
        if(!file_exists($imageUrl)){
            unlink($imageUrl);
        }else{
            return;
        }
    }

    public function getEligibledSeekerById($seekerId){
        $query = "SELECT * from company_job_seekers WHERE SeekerId = '$seekerId' AND IsEligible='1'";
        return $this->executeQuery($query) ? $this->executeQuery($query) : $this->error;
    }

    public function getUserById($id){
        $query = "SELECT * FROM job_seekers WHERE JobSeekerId = '$id'";
        return $this->executeQuery($query) ? mysqli_fetch_assoc($this->executeQuery($query)): $this-> conn -> error;
        
    }

    public function addSeekerSkill($data){
        $query = "INSERT INTO seeker_skills VALUES('', '$data[SeekerId]', '$data[SkillText]')";
        return $this->executeQuery($query) ? "" : $this->conn->error;
    }

    public function updateSeekerSkill($data){
        $query = "UPDATE seeker_skills
                    SET
                    SeekerId = '$data[SeekerId]',
                    SkillText = '$data[SkillText]'
                    WHERE Id = '$data[Id]'";
        return $this->executeQuery($query) ? header("Location: ./add-skill.php") : $this->conn->error;
    }

    public function deleteSeekerSkill($id){
        $query = "DELETE FROM seeker_skills WHERE Id = '$id'";
        return $this->executeQuery($query) ? header('Location: ./add-skill.php') : $this->conn->error;
    }

    public function getSeekerSkillsBySeekerId($id){
        $query = "SELECT * FROM seeker_skills WHERE SeekerId = '$id'";
        return $this->executeQuery($query) ? $this->executeQuery($query) : $this->conn->error;
    }

    public function getSeekerSkillById($id){
        $query = "SELECT * FROM seeker_skills WHERE Id = '$id'";
        return $this->executeQuery($query) ? mysqli_fetch_assoc($this->executeQuery($query)) : $this->conn->error;
    }

    public function executeQuery($query){
        return mysqli_query($this->conn, $query);
    }
}
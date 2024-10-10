<?php
error_reporting(E_ALL);

require_once("User.php");

class Employer extends User
{
    public function signup($fname, $email, $password, $compname, $state){
        $sql1 = "SELECT employer_email FROM `employers` WHERE employer_email = ?";
            $stmt1 = $this->dbconn->prepare($sql1);
            $stmt1->execute([$email]);
            $resp = $stmt1->fetch(PDO::FETCH_ASSOC);
            if($resp){
                $_SESSION['errormsg']="Emali Already In Use";
                header("location:../employer.php");
                return false;
                die();
            }else{
                
       try{
        $sql = "INSERT INTO employers(employer_fullName, employer_email, employer_password, employer_companyName, employer_stateId) VALUES(?, ?, ?, ?, ?)";
        $stmt = $this->dbconn->prepare($sql);
        $stmt->execute(array($fname, $email, $password, $compname, $state));
        $result = $this->dbconn->lastInsertId();
        return $result;
       }catch(PDOException $e){
        echo "There is an error in your syntax". $e->getMessage();
       }catch(Exception $e){
        echo "There is an error in your syntax". $e->getMessage();
       }
    }

    }
    public function login($email, $password){
        try{
            $sql = "SELECT * FROM employers WHERE employer_email = ?";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute(array($email));
            $record = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if($record){
                $hashed = $record['employer_password'];
                $check = password_verify($password, $hashed);
                if($check == true){
                    if($record['status'] == "0"){
                        $_SESSION['errormsg'] = 'You have been blocked by admin contact 09078177518 for help';
                       return false;
                    }
                    return $record['employer_id'];
                }else{
                    $_SESSION['errormsg'] = 'invalid Credentials';
                    return false;
                }
            }else{
                $_SESSION['errormsg'] = 'invalid Credentials';
                return false;
            }

        }
        catch(PDOException $e){
            echo "There is an error in your syntax". $e->getMessage();
        }catch(Exception $e){
            echo "There is an error in your syntax". $e->getMessage();
        }
    }
    public function get_user_by_id($id){
        try{
            $sql = "SELECT * FROM employers WHERE employer_id = ?";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute(array($id));
            $record = $stmt->fetch(PDO::FETCH_ASSOC);
            return $record;
        }catch(PDOException $e){
            echo "There is an error in Your syntax". $e->getMessage();
        }catch(Exception $e){
            echo "There is an error in your syntax". $e->getMessage();
        }
    }
    public function post_job($title, $qualification, $employer_id, $dateclosed, $description, $salary, $jobcatid, $type, $state, $lga){
        try{
            $sql = "INSERT INTO job_vacancy(jobVacancy_title, qualification, jobVacancy_employerId, dateClosed, vacancy_description, vacancy_salaryRange, jobCat_id, work_type, states_id, lga) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->dbconn->prepare($sql);
           $stmt->execute(array($title, $qualification, $employer_id, $dateclosed, $description, $salary, $jobcatid, $type, $state, $lga));
           $result = $this->dbconn->lastInsertId();
           return $result;

        }catch(PDOException $e){
            echo "There is an error in your syntax". $e->getMessage();
        }catch(Exception $e){
            echo "There is an error in your syntax". $e->getMessage();
        }
    }
    public function fetch_cat(){
        try{
           $sql = "SELECT * FROM `job_category`";
           $stmt = $this->dbconn->prepare($sql);
           $stmt->execute();
           $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
           return $result;
        }catch(PDOException $e){
            echo "There is an error in Your syntax". $e->getMessage();
        }catch(Exception $e){
            echo "There is an error in your syntax". $e->getMessage();
        }
    }
    public function fetch_vacancy($id){
        try{
            $sql = "SELECT * FROM `job_vacancy` JOIN employers ON jobVacancy_employerId = employer_id WHERE jobVacancy_employerId = ?";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute(array($id));

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo "There is an error in your syntax". $e->getMessage();
        }catch(Exception $e){
            echo "There is an error in your syntax". $e->getMessage();
        }

    }
    public function fetch_vacancies($id){
        try{
            $sql = "SELECT * FROM `job_vacancy` WHERE jobVacancy_employerId = ?";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute(array($id));
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo "There is an error in your syntax". $e->getMessage();
        }catch(Exception $e){
            echo "There is an error in your syntax". $e->getMessage();
        }
    }
    public function get_cat_by_id($id){
        try{
            $sql = "SELECT * FROM `job_category` WHERE jobCat_id = ?";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute(array($id));
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo "There is an error in your syntax". $e->getMessage();
        }catch(Exception $e){
            echo "There is an error in your syntax". $e->getMessage();
        }
    }
    public function fetch_vacancies_by_cat($id){
        try{
            $sql = "SELECT * FROM `job_vacancy` JOIN employers ON jobVacancy_employerId = employer_id JOIN state ON states_id =state_id JOIN lga ON lga = lga_id WHERE jobCat_id = ?";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute(array($id));
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo "There is an error in your syntax". $e->getMessage();
        }catch(Exception $e){
            echo "There is an error in your syntax". $e->getMessage();
        }
    }
    public function fetch_categories(){
        $sql = "SELECT * FROM `job_category`";
        $stmt = $this->dbconn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    }
    public function fetch_vacancies_for_users(){
        try{
            $sql = "SELECT * FROM `job_vacancy` JOIN employers ON jobVacancy_employerId = employer_id JOIN state ON states_id =state_id JOIN lga ON lga = lga_id  ";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
           
            return $result;
        }catch(PDOException $e){
            echo "There is an error in your syntax". $e->getMessage();
        }catch(Exception $e){
            echo "There is an error in your syntax". $e->getMessage();
        }
    }
    public function fetch_vacancies_for_users_by_id($id){
        try{
            $sql = "SELECT * FROM `job_vacancy` JOIN employers ON jobVacancy_employerId = employer_id JOIN state ON states_id =state_id JOIN lga ON lga = lga_id WHERE jobVacancy_id=? ";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute([$id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
           
            return $result;
        }catch(PDOException $e){
            echo "There is an error in your syntax". $e->getMessage();
        }catch(Exception $e){
            echo "There is an error in your syntax". $e->getMessage();
        }
    }
    public function updatejob($title, $qualification, $date, $desc, $range, $type,$id){
        try{
          $sql = "UPDATE `job_vacancy` SET jobVacancy_title = ?, qualification = ?, dateClosed = ?, vacancy_description = ?, vacancy_salaryRange = ?, work_type = ? WHERE `job_vacancy`.`jobVacancy_id` = ?";
          $stmt = $this->dbconn->prepare($sql);
          $result = $stmt->execute(array($title, $qualification, $date, $desc, $range, $type, $id));
          return $result;


        }catch(PDOException $e){
            echo "There is an error in your syntax". $e->getMessage();
        }catch(Exception $e){
            echo "There is an error in your syntax". $e->getMessage();
        }

    }
    public function selectVacancyById($id){
        try{
            $sql = "SELECT * FROM `job_vacancy` JOIN employers ON jobVacancy_employerId = employer_id  WHERE jobVacancy_id = ?";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute([$id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo "There is an error in your syntax". $e->getMessage();
        }catch(Exception $e){
            echo "There is an error in your syntax". $e->getMessage();
        }
    }
    public function fetch_applications($id, $vacId){
        try{
            $sql = "SELECT * FROM `jobseeker_application` JOIN job_vacancy ON application_jobVacancy_id = jobVacancy_id JOIN job_seekers ON application_jobSeeker_id = job_seekers.jobSeeker_id WHERE jobVacancy_employerId = ? AND jobVacancy_id = ? ORDER BY application_rating DESC";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute([$id, $vacId]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo "There is an error in your syntax". $e->getMessage();
        }catch(Exception $e){
            echo "There is an error in your syntax". $e->getMessage();
        }
    }
    public function fetch_applications_by_userid($id){
        try{
            $sql = "SELECT * FROM `jobseeker_application` JOIN job_vacancy ON application_jobVacancy_id = jobVacancy_id JOIN job_seekers ON application_jobSeeker_id = job_seekers.jobSeeker_id WHERE jobSeeker_id = ? ";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute([$id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo "There is an error in your syntax". $e->getMessage();
        }catch(Exception $e){
            echo "There is an error in your syntax". $e->getMessage();
        }
    }
    public function fetch_applications_by_id($id){
        try{
            $sql = "SELECT * FROM `jobseeker_application` JOIN job_vacancy ON application_jobVacancy_id = jobVacancy_id JOIN job_seekers ON application_jobSeeker_id = job_seekers.jobSeeker_id WHERE application_id = ? ";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute([$id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo "There is an error in your syntax". $e->getMessage();
        }catch(Exception $e){
            echo "There is an error in your syntax". $e->getMessage();
        }
    }
    public function update_settings($password, $name, $logo, $id){
        try{
            if(!empty($password)|| !empty($logo)){
            $temp = $logo['tmp_name'];
            $original = $logo['name'];
            $r = explode(".", $original);
            $newname = time().rand().".".$r[1];
            move_uploaded_file($temp, "../../logos/$newname");


            $sql = "UPDATE employers SET employer_password = ?, employer_companyName = ?, employer_companyLogo = ? WHERE employer_id = ?";
            $stmt = $this->dbconn->prepare($sql);
            $resp = $stmt->execute([$password, $name, $newname, $id]);
            return $resp;
            }elseif(empty($password)){
                $temp = $logo['tmp_name'];
            $original = $logo['name'];
            $r = explode(".", $original);
            $newname = time().rand().".".$r[1];
            move_uploaded_file($temp, "../../logos/$newname");


            $sql = "UPDATE employers SET  employer_companyName = ?, employer_companyLogo = ? WHERE employer_id = ?";
            $stmt = $this->dbconn->prepare($sql);
            $resp = $stmt->execute([$name, $newname, $id]);
            return $resp;
            }elseif(empty($logo)){
           

            $sql = "UPDATE employers SET employer_password = ?, employer_companyName = ?,  WHERE employer_id = ?";
            $stmt = $this->dbconn->prepare($sql);
            $resp = $stmt->execute([$password, $name, $id]);
            return $resp;
            }else{
            $sql = "UPDATE employers SET employer_companyName = ? WHERE employer_id = ?";
            $stmt = $this->dbconn->prepare($sql);
            $resp = $stmt->execute([$name, $id]);
            return $resp;
            }
        }catch(PDOException $e){
            echo "There is an error in your syntax". $e->getMessage();
        }catch(Exception $e){
            echo "There is an error in your syntax". $e->getMessage();
        }
    }
    public function fetch_applications_for_users($id){
        try{
            $sql = "SELECT * FROM `jobseeker_application` JOIN job_vacancy ON application_jobVacancy_id = jobVacancy_id JOIN employers ON jobVacancy_employerId = employer_id WHERE application_jobSeeker_id = ?";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);


        }catch(PDOException $e){
            echo "There is an error in your syntax". $e->getMessage();
            
        }catch(Exception $e){
            echo "There is an error in your syntax". $e->getMessage();
        }
    }
    public function change_status($stats, $id){
        try{
            $sql = "UPDATE jobseeker_application SET application_status = ? WHERE application_jobSeeker_id = ?";
            $stmt = $this->dbconn->prepare($sql);
            return $stmt->execute([$stats, $id]);

        }catch(PDOException $e){
            echo "There is an error in your syntax". $e->getMessage();
            
        }catch(Exception $e){
            echo "There is an error in your syntax". $e->getMessage();
        }
    }
    public function insert_req($jobid, $req){
        try{
            $sql = "INSERT INTO requirements(reg_jobId, req_text) VALUES(?, ?)";
            $stmt = $this->dbconn->prepare($sql);
            return $stmt->execute([$jobid,$req]);

        }catch(PDOException $e){
            echo "There is an error in your syntax". $e->getMessage();
            
        }catch(Exception $e){
            echo "There is an error in your syntax". $e->getMessage();
        }
    }
    public function fetch_requirements($jobid){
        try{
            $sql = "SELECT * FROM `requirements` WHERE reg_jobId = ?";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute([$jobid]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo "There is an error in your syntax". $e->getMessage();
            
        }catch(Exception $e){
            echo "There is an error in your syntax". $e->getMessage();
        }
    }
    
}
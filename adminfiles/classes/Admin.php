<?php
    require_once "Db.php";
    class Admin extends Db
    {
        private $dbconn;
        public function __construct()
        {
            $this->dbconn = $this->connect();
        }
        public function login($username, $password){
            
            try{
            $query = "SELECT * FROM admin WHERE admin_username=?";
            $stmt = $this->dbconn->prepare($query);
            $stmt->execute([$username]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            switch ($result) {
                case $result:
                    $hashed = $result['admin_password'];
                    $check = password_verify($password, $hashed);
                    switch($check){
                        case true:
                            $_SESSION['adminonline'] = $result['admin_id'];
                            $sql = 'UPDATE admin SET dateLastLoggedIn = CURRENT_TIMESTAMP WHERE admin_id = ?';
                            $stmt = $this->dbconn->prepare($sql);
                            $stmt->execute([$result['admin_id']]);
                            return 1;
                        break;
                        default:
                            $_SESSION['admin_errormsg']= "Invalid Credentials";
                            return 0;
                        break;
                    }
                    break;
                
                default:
                    $_SESSION['admin_errormsg']= "Invalid Credentials";
                    return 0;
                    break;
            }
            }catch(PDOException $e){
                $_SESSION['admin_errormsg']= $e->getMessage();
                return 0;
            }catch(Exception $e){
                $_SESSION['admin_errormsg']= $e->getMessage();
                return 0;
            }
        }
        public function fetch_users(){
            try{
                $query = 'SELECT * FROM job_seekers JOIN state ON jobSeeker_State_id = state_id';
                $stmt = $this->dbconn->prepare($query);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            }catch(PDOException $e){
                $_SESSION['errormsg']= $e->getMessage();
            }catch(Exception $e){
                $_SESSION['errormsg']= $e->getMessage();
            }
        }
        public function fetch_employers(){
            try{
                $query = 'SELECT * FROM employers JOIN state ON employer_stateId = state_id';
                $stmt = $this->dbconn->prepare($query);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            }catch(PDOException $e){
                $_SESSION['errormsg']= $e->getMessage();
            }catch(Exception $e){
                $_SESSION['errormsg']= $e->getMessage();
            }
        }
        public function fetch_applications(){
            try{
                $sql = 'SELECT * FROM `jobseeker_application` JOIN job_vacancy ON application_jobVacancy_id = jobVacancy_id JOIN job_seekers ON application_jobSeeker_id = job_seekers.jobSeeker_id JOIN employers ON jobVacancy_employerId = employer_id';
                $stmt = $this->dbconn->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            }catch(PDOException $e){
                $_SESSION['errormsg']= $e->getMessage();
            }catch(Exception $e){
                $_SESSION['errormsg']= $e->getMessage();
            }
        }
        public function delete_jobseekers($id){
            $sql = 'DELETE FROM job_seekers WHERE `job_seekers`.`jobSeeker_id` = ?';
            $stmt = $this->dbconn->prepare($sql);
            $resp = $stmt->execute([$id]);
            if($resp){
                return true;

            }else{
                return false;
            }
        }
        public function block_employer($status, $id){
            $sql = 'UPDATE employers SET status = ? WHERE employer_id = ?';
            $stmt = $this->dbconn->prepare($sql);
            $resp = $stmt->execute([$status, $id]);
            if($resp){
                return true;

            }else{
                return false;
            }
        }
        public function delete_application($id){
            $sql = 'DELETE FROM jobseeker_application WHERE `jobseeker_application`.`application_id` = ?';
            $stmt = $this->dbconn->prepare($sql);
            $resp = $stmt->execute([$id]);
            if($resp){
                return true;

            }else{
                return false;
            }
        }
        public function delete_admin($id){
            $sql = "DELETE FROM admin WHERE `admin`.`admin_id` = ?";
            $stmt = $this->dbconn->prepare($sql);
            $resp = $stmt->execute([$id]);
            return $resp;
        }
        public function delete_jobVacancy($id){
            $sql = "DELETE FROM job_vacancy WHERE `job_vacancy`.`jobVacancy_id` = ?";
            $stmt = $this->dbconn->prepare($sql);
            $resp = $stmt->execute([$id]);
            return $resp;
        }
        public function addAdmin($username, $password){
            $sql = 'INSERT INTO admin(admin_username, admin_password) VALUES(?, ?)';
            $stmt = $this->dbconn->prepare($sql);
            $resp = $stmt->execute([$username, $password]);
            return $resp;
        }
        public function fetch_admins(){
            $sql = 'SELECT * FROM admin';
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute();
            $admins = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $admins;

        }
        public function fetch_admins_by_id($id){
            $sql = 'SELECT * FROM admin WHERE admin_id = ?';
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute([$id]);
            $admins = $stmt->fetch(PDO::FETCH_ASSOC);
            return $admins;

        }
        public function update_admin($username, $password, $id){
            $sql = 'UPDATE admin SET admin_username = ?, admin_password = ? WHERE admin_id = ?';
            $stmt = $this->dbconn->prepare($sql);
            $resp = $stmt->execute([$username, $password, $id]);
            return $resp;
        }
                public function logout(){
            session_unset();
            session_destroy();
            header("location:index.php");
            exit();
            
        }
         
        
    }






?>
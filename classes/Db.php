<?php

    require_once('config.php');

    class Db
    {
        private $dbhost = DBHOST;
        private $dbname = DBNAME;
        private $dbuser = DBUSER;
        private $dbpass = DBPASS;

        protected $con;

        protected function connect()
        {
            $dsn = "mysql:host=$this->dbhost;dbname=$this->dbname;";
            $option = [
                PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
            ];

            try {
                $this->con = new PDO($dsn,$this->dbuser, $this->dbpass,$option);
                return $this->con;
            } catch (Exception $e) {
                $e->getMessage();
                return false;
            }
        }
    }

?>
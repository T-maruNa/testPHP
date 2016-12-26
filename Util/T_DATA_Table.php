<?php
    include_once '/DBconnect.php';
    class t_data extends DBconnect{
        private $sql; 
        function  __construct(){
            parent::__construct();
            $this->sql = parse_ini_file(dirname(__DIR__) .  "/Config/T_DATA_SQL.ini", true);
        }
        /**
         * DATE_YYYYMMからデータを取得
         */
        function getT_data($_yyyymm){
            $stmt = $this->pdo->prepare($this->sql['TEST_SQL']);
            $stmt->bindValue(':YYYYMM',$_yyyymm);
            $stmt->execute();
            return $stmt;
        }
    }
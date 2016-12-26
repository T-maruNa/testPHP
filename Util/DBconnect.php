<?php
Class DBconnect{
    protected $pdo;
    function  __construct(){
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','password',
            array(PDO::ATTR_EMULATE_PREPARES => false));
        } catch (PDOException $e) {
            exit('データベース接続失敗。'.$e->getMessage());
        }
    }
}
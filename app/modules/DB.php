<?php 

namespace App\Modules;

class DB {

    public function connect($dbHost, $dbName, $dnUser, $dbPass) {
        try {
            $connection = new \PDO('mysql:host=' . $dbHost . ';dbname=' . $dbName, $dnUser, $dbPass);
        } catch (\PDOException $e) {
            die('Failed to connect on Data Base');
        }
        
        return $connection;
    }

    public function getList($queryStr) {
        GLOBAL $DB;
        $objList = $DB->query($queryStr);
        $arrList = [];
        if ($objList != false) {
            foreach($objList as $element) {
                $arrList[] = $element;
            }
        } else {
            return false;
        }
        return $arrList;
    }

    public function get($queryStr) {
        $connection = $this->connect(DB_NAME, DB_USER, DB_PASSWORD);
        $objData = $connection->query($queryStr);
        $arrData = [];
        
        if ($objData != false) {
            foreach($objData as $data) {
                $arrData = $data;
            }
        } else {
            return false;
        }
        return $arrData;  
    }


}

?>
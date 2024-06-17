<?php
Class Model{
    //the values are deleted on purpose, if you use this code, then you just need to fill them with your own values
    private $serverName = "";
    private $dbUserName = "";
    private $dbPwd = "";
    private $dbName = "";
    protected $conn; 
    
    function __construct(){
        $this->conn = new PDO("mysql:host={$this->serverName};dbname={$this->dbName}", $this->dbUserName, $this->dbPwd, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }
    
    function Read($column = "*",$table, $condition='', $params =[]){
        $query = "select {$column} from {$table} {$condition}" ;
        $stmt = $this->conn->prepare($query);
        $stmt->execute($params);
        return $stmt;
    }
    //insert into
   function Create($table,$column,$values, $params=[]){
        $stmt = $this->conn->prepare("INSERT INTO {$table} ({$column})
        VALUES ({$values})");
        $stmt->execute($params);
    }
    //update existing row in db
    function Update($table,$setpart,$condition,$params=[]){
        $query = "UPDATE {$table} SET {$setpart} {$condition}";
        $stmt = $this->conn->prepare($query);
        $stmt->execute($params);
    }
    //delete(delete row to 1 in users db)
    function DeleteUser($table,$condition,$params=[]){
        // $umodel->DeleteUser([$input]);
        $stmt = $this->conn->prepare("UPDATE {$table} SET deleted='1' {$condition}");
        $stmt->execute($params);
    }
    // actual delete
    function DeletePwdReset($table,$condition,$params=[]){
        $stmt = $this->conn->prepare("DELETE FROM {$table} {$condition}");     
        $stmt->execute($params);
    }
}
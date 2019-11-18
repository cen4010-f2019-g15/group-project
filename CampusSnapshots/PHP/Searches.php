<?php
class Searches
{
    private static $conn;
    private function sanitize(&$data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
    }
    function __construct($conn){
        self::$conn = $conn;
        //add security here
    }
    
    function getProfile($ID){
        
        $login = self::$conn->prepare("SELECT UserName, Type, Active
 FROM Person WHERE UID = ?");
        $login->bindParam(1, $ID);
        
        $login->execute();
        $login->setFetchMode(PDO::FETCH_ASSOC);
        $result = $login->fetchAll();
        
        return $result;
    }
    function getPosts($IDType, $ID){
        
        $login = self::$conn->prepare("SELECT Person.UserName, Made, 
        PostText, RID, EID FROM Posts INNER JOIN UID ON Person.UID = Posts.UID WHERE ? = ?");
        $login->bindParam(1, $IDType);
        $login->bindParam(2, $ID);
        
        
        $login->execute();
        $login->setFetchMode(PDO::FETCH_ASSOC);
        $result = $login->fetchAll();
        
        return $result;
    }
    function getEvents($IDType = "EID", $ID = "EID"){
        $login = self::$conn->prepare("SELECT Person.UserName,
        Name, StartTime, EndTime, Description FROM Events INNER JOIN UID ON Events.UID = Person.UID WHERE ? = ?");
        $login->bindParam(1, $IDType);
        $login->bindParam(2, $ID);
        
        
        $login->execute();
        $login->setFetchMode(PDO::FETCH_ASSOC);
        $result = $login->fetchAll();
        
        return $result;
    }
    function getProblems($IDType = "RID", $ID = "RID"){
        
        $login = self::$conn->prepare("SELECT Person.UserName, Type, Name
        Reported, Status, Description FROM Reports INNER JOIN UID ON Reports.UID = Person.UID WHERE ? = ? ");
        $login->bindParam(1, $IDType);
        $login->bindParam(2, $ID);
        
        $login->execute();
        $login->setFetchMode(PDO::FETCH_ASSOC);
        $result = $login->fetchAll();
        
        return $result;
    }
    private function flatten(){
        $toJSON = array();
        foreach($result as $k => $v){
            $key = $v['UserName'];//holdout one
            unset($v['UserName']);
            $toJSON[$key] = $v;
        }
    }
}
?>
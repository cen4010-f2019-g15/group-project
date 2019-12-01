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
        
        $login = self::$conn->prepare("SELECT Person.UserName, PoID, Made, 
        PostText, RID, EID 
        FROM Posts INNER JOIN Person ON Person.UID = Posts.UID WHERE ? = ?");
        $login->bindParam(1, $IDType);
        $login->bindParam(2, $ID);
        
        
        $login->execute();
        $login->setFetchMode(PDO::FETCH_ASSOC);
        $result = $login->fetchAll();
        
        return $result;
    }
    function getEvents($IDType = "EID", $ID = "EID"){
        $login = self::$conn->prepare("SELECT Person.UserName, EID, Name,
        Image, StartDate, EndDate, Description 
        FROM Events INNER JOIN Person ON Events.UID = Person.UID WHERE ? = ?");
        
        $login->bindParam(1, $IDType);
        $login->bindParam(2, $ID);
        
        
        $login->execute();
        $login->setFetchMode(PDO::FETCH_ASSOC);
        $result = $login->fetchAll();
        
        return $result;
    }
    function getProblems($IDType = "RID", $ID = "RID"){
        
        $login = self::$conn->prepare("SELECT Person.UserName, RID, 
        Name, Image, Reported, Reports.Type, Status, Location, Description 
        FROM Reports INNER JOIN Person ON Reports.UID = Person.UID WHERE ? = ? ");
        $login->bindParam(1, $IDType);
        $login->bindParam(2, $ID);
        
        $login->execute();
        $login->setFetchMode(PDO::FETCH_ASSOC);
        $result = $login->fetchAll();
        
        return $result;
    
    }
}
?>
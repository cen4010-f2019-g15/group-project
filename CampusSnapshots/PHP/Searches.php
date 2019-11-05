<?php
class Searches
{
    private function sanitize(&$data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
    }
    function __construct(){}
    
    function getProfile($profile){
        $conn = connect();
        
        $login = $conn->prepare("SELECT Type, Acitve, Profile_XML
 FROM Person where UserName = ?");
        $login->bindParam(1, $profile);
        
        $login->execute();
        $login->setFetchMode(PDO::FETCH_ASSOC);
        $result = $login->fetchAll();
        
        return $result;
    }
    
}
?>
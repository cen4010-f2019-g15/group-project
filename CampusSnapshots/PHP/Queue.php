<?php 
require 'connection.php';
require 'Searches.php';

$s = new Searches(connect());

$Posts = $s->getPosts();
$IDType = null;
if($_POST["Type"] == 'reports'){
    $Queue = $s->getProblems();
    $IDType = "RID";
}
else if($_POST["Type"] == 'events'){
    $Queue = $s->getEvents();
    $IDType = "EID";
}
foreach($Queue as $k => $v)//[0] => {array (k,v)}
{
    $v["Posts"] = array();
    foreach($Posts as $kb => $vb)
    {
        if($v[$IDType] == $vb[$IDType])
            push_array($v["Posts"], $kb);
    }
}

echo json_encode($Queue);

?>
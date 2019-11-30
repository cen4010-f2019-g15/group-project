<?php 
require 'connection.php';

$s = new Searches(connect());

$Reports = $s->getProblems();

foreach($Events as $k => $v)//[0] => {array (k,v)}
{
    $Posts = $s->getPosts('RID', $v["RID"]);
    $v['Posts'] = $Posts;
    if($_SESSION['admin'] === FALSE || ISSET($_SESSION['admin']))
        unset($v["RID"]);
}
echo json_encode($Reports);

?>
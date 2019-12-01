<?php 
require 'connection.php';

$s = new Searches(connect());

$Reports = $s->getProblems();

foreach($Reports as $k => $v)//[0] => {array (k,v)}
{
    $Posts = $s->getPosts('RID', $v["RID"]);
    $v['Posts'] = $Posts;
}
echo json_encode($Reports);

?>
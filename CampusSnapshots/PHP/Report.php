<?php 
require 'connection.php';
require 'Searches.php';

$s = new Searches(connect());
$IDType = "RID";
$Reports = $s->getProblems();
$Posts = $s->getPosts();
var_dump($Posts);
foreach($Reports as $k => $v)//[0] => {array (k,v)}
{
    $Posts = $s->getPosts($IDType, $v["RID"]);
    $v['Posts'] = $Posts;
    var_dump($v["RID"]);
    var_dump($Posts);
}
echo json_encode($Reports);

?>
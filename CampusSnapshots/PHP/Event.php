<?php
require 'connection.php';
require 'Searches.php';
$s = new Searches(connect());
$Events = $s->getEvents();

foreach($Events as $k => $v)//[0] => {array (k,v)}
{
    $Posts = $s->getPosts('EID', $v["EID"]);
    $v['Posts'] = $Posts;
    unset($v["EID"]);
}
echo json_encode($Events);
?>
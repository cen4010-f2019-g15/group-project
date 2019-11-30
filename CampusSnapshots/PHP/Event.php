<?php
$s = new Searches(connect());
$Events = $s->getEvents();

foreach($Events as $k => $v)//[0] => {array (k,v)}
{
    $Posts = $s->getPosts('EID', $v["EID"]);
    $v['Posts'] = $Posts;
    if ($_SESSION['admin'] === FALSE || ISSET($_SESSION['admin']) )
        unset($v["EID"]);
}
echo json_encode($Events);
?>
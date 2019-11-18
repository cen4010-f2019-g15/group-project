<?php 
require 'connection.php';

$s = new Searches(connect());

$reports->getProblems();
$posts = $s->getPosts();
$post_events = $s->prepare("SELECT ?, ?, ?, ?, ?, ? FROM Reports INNER JOIN Posts ON ? = ?");

$post_events->bindParam(1,$reports["Name"]);
$post_events->bindParam(2,$reports["Image"]);
$post_events->bindParam(3,$reports["Reported"]);
$post_events->bindParam(4,$reports["Type"]);
$post_events->bindParam(5,$reports["Description"]);
$post_events->bindParam(6,$reports["Status"]);
$post_events->bindParam(7,$reports["UID"]);
$post_events->bindParam(8,$posts["UID"]);

$post_events->execute();
$post_events->setFetchMode(PDO::FETCH_ASSOC);
$post_events_joined = $post_events->fetch();

$tblcount = $post_events_joined->prepare('SELECT COUNT(*) FROM ?');
$tblcount->bindParam(1,$post_events_joined);
$tblcount->execute();

if ($tblcount->fetchColumn() > 0) {
	echo 'true';
	//print_r ($post_events_joined); 
}
else {
	echo 'false';
}

?>

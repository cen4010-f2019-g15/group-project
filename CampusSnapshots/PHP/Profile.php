<?php
include 'Searches.php';

$conn = connect();
$s = new Searches();
$s->sanitize($_POST['user']);

$report = $s->getProfile($_SESSION['user']);

if($report['Type'] == 'admin')
{
    $store = array('currentProf' => $report, 'Reports' => $s->getProblems());
    echo json_encode($store);
}
else{
    $store = array('currentProf' => $report, 'Reports' => $s->getProblems('UID', $_SESSION['UID']),
        'Events' => $s->getEvents('UID', $_SESSION['UID'])
    );
    echo json_encode($store);
}
?>
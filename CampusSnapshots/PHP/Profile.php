<?php
include 'Searches.php';


session_start();

$conn = connect();
$s = new Searches($conn);

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
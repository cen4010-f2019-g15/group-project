<?php
if(isset($_SESSION['user'])){
    session_unset($_SESSION['user']);
    session_destroy();
}
?>
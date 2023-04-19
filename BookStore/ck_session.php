<?php
session_start();

function isSessionAction(){
    if(isset($_SESSION['userSession'])){
        return true;
    }else{
        return false;
    }
}

?>
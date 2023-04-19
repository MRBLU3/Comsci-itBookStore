<?php

    require_once 'conn.php';

    function display_data(){
        global $conn;
        $query = "select * from orderdb";
        $result = mysqli_query($conn,$query);
        return $result;
    }


?>
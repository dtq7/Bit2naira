<?php

    if(!isset($_GET['email']) || !isset($_GET['token'])){
        header('Location: register.php');
        exit();
    }else{
        require_once('./phpIncludes/openConnection.php');

        $eml = $con->real_escape_string($_GET['email']);
        $tok= $con->real_escape_string($_GET['token']);

        $sql = $con->query("SELECT id FROM Users WHERE Email='$eml' AND token='$tok' AND isEmailConfirmed=0");
        if($sql->num_rows > 0){
            $con->query("UPDATE Users SET isEmailConfirmed=1, token='' WHERE Email='$eml'");
            header('Location: index.php');
            exit();
        }



    }


?>
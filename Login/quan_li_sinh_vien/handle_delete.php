<?php
        $stt =$_GET['stt'];

        
        var_dump($stt);
        require_once 'connect.php';
        $sql="DELETE FROM student WHERE id = '$stt' " ;
        dir($sql);
        mysqli_query($db,$sql);
        header('location:index.php');
        mysqli_close($db);

        
        // dir($data);
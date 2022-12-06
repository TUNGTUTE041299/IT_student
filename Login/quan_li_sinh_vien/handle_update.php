<?php
         $check_type=$_POST["type"]=='0'|| $_POST["type"]=='1';
         $check_course= $_POST["course"]=='0'||  $_POST["course"]=='1'|| $_POST["course"]=='2';
         $check_form =empty($_POST["id"])||empty($_POST["name"])||empty($_POST["country"])||( !$check_type)||empty($_POST['date'])||(!$check_course)||empty($_POST["contact"]);
        if ($check_form){
                header('location:form_update.php');

        }else{
               header('location:index.php');
        }
        $s_stt= $_POST["stt"];
        $s_id = filter_input(INPUT_POST,"id",FILTER_VALIDATE_INT);
        $s_name = $_POST["name"];
        $s_country = $_POST["country"];
        $s_type=filter_input(INPUT_POST,"type",FILTER_VALIDATE_INT);
        $s_date=$_POST["date"];
        $s_course=filter_input(INPUT_POST,"course",FILTER_VALIDATE_INT);
        $s_contact=$_POST["contact"];
         var_dump($s_id,$s_name,$s_type,$s_date,$s_course,$s_contact);
        
        require_once 'connect.php';
        $sql = "UPDATE student SET id=$s_id,name='$s_name',country='$s_country',type=$s_type,date='$s_date',course=$s_course,contact='$s_contact' WHERE id=$s_stt ";
        dir($sql);
        mysqli_query($db,$sql);
        

        mysqli_close($db);


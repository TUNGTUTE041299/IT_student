<?php   
                 $s_id = filter_input(INPUT_POST,"id",FILTER_VALIDATE_INT);
                 $s_name = $_POST["name"];
                 $s_country=$_POST["country"];
                 $s_type=filter_input(INPUT_POST,"type",FILTER_VALIDATE_INT);
                 $s_date=$_POST["date"];
                 $s_course=filter_input(INPUT_POST,"course",FILTER_VALIDATE_INT);
                 $s_contact=$_POST["contact"];
                  var_dump($s_id,$s_name,$s_type,$s_date, $s_country,$s_course,$s_contact);
          $check_type=$_POST["type"]=="0" ||  $_POST["type"]=="1";        
          $check_form =empty($_POST["id"])||empty($_POST["name"])||empty($_POST["country"])|| !$check_type ||empty($_POST["date"])||empty($_POST["contact"]);
          var_dump($check_type,$check_form);
         if ($check_form){
                header('location:form.html');
               
         }else{
                require_once 'connect.php';
                $sql = "INSERT INTO student(id,name,country,type,date,course,contact)VALUES($s_id,'$s_name','$s_country',$s_type,'$s_date',$s_course,'$s_contact')";
                dir($sql);
                mysqli_query($db,$sql);
                header('location:index.php');
        }
       
        
        // require_once 'connect.php';
        //  $sql = "INSERT INTO student(id,name,country,type,date,course,contact)VALUES($s_id,'$s_name','$s_country',$s_type,'$s_date',$s_course,'$s_contact')";
        //  dir($sql);
        // mysqli_query($db,$sql);
        
        
        
        mysqli_close($db);
        // header('location:index.php');                                                                                                                                                                                      

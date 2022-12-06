<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <link rel="stylesheet" href="./style2.css">
    <title>Document</title>
</head>
<?php 
    session_start();
    if (!isset($_SESSION['name'])) {
        header('location:../index.php');
    }
?>

<body style="max-width: 1200px;">

    <div id="header">
        <img src="../img/logo.svg" alt="">
    </div>
    <!-- text_run -->
    <div class="typewriter-effect">
        <div class="text" id="typewriter-text"></div>
    </div>

    <h1>学生情報</h1>
    <a href="form.html">学生追加</a>
    <br>
    <?php
        $search = '';
        $course=array();
        if (isset($_GET['search'])) {
            $search=$_GET['search'];
        }
        if(isset($_GET['course'])) {
            $course=$_GET['course'];
            //  var_dump( $course);
            $course1="";
            $course2="";
            if (count($course)==1){
            $query="SELECT * FROM student WHERE (id LIKE '%$search%' OR name  LIKE '%$search%') AND (course='$course[0]' )  ORDER BY id ASC";

            }
            if (count($course)==2){
            $query="SELECT * FROM student WHERE (id LIKE '%$search%' OR name  LIKE '%$search%') AND (course=' $course[0]' OR course='$course[1]')  ORDER BY id ASC";

            }
            if (count($course)==3){
            $query="SELECT * FROM student WHERE (id LIKE '%$search%' OR name  LIKE '%$search%') AND (course=' $course[0]' OR course='$course[1]' OR course='$course[2]')  ORDER BY id ASC";

            }
        }else{
            $query="SELECT * FROM student WHERE id LIKE '%$search%' OR name  LIKE '%$search%' ORDER BY id ASC";
        }
        // dir( $query);
        // $date =  date("Y/m/d");
        // // echo $date;
        require_once 'connect.php';
        // dir($query);
        $result= mysqli_query($db,$query);
        mysqli_close($db);
   ?>
    
    <table>
            <form>

                    <input type="search" name="search" placeholder="Search"
                    value="<?php echo $search;?>"
                    >

                    <input type="checkbox" name="course[]" value="0"> IT </input>
                    <input type="checkbox" name="course[]" value="1"> Hottel</input>
                    <input type="checkbox" name="course[]" value="2"> Business</input>
            </form>
            <!-- <form action="">

                <button name="course" value="0"> IT </button>
                <button name="course" value="1"> Hottel</button>
                <button name="course" value="2"> Business</button>

            </form>     -->
            <tr>
                <th>学生番号</th>
                <th style="width:150px">名前</th>
                <th>年齢</th>
                <th>コース</th>
                <!-- <th>年齢</th> -->
            </tr>
            <?php
            foreach ($result as$value) {?>
                 <tr>
                    <td><?php echo 'k'.$value['id'] ?></td>
                    <td ><?php echo $value['name'] ?></td>

                    <td>
                        <?php
                        $birthday = $value['date']; 
                        $diff = date_diff(date_create(), date_create($birthday)); 
                        $age = $diff->format('%Y');

                        echo $age.'歳';
                        
                        
                        ?>
                    </td>
    
                    <td> 
                    <?php 
                        if ($value['course']==0) {
                            echo 'IT';
                        }
                        if ($value['course']==1) {
                            echo 'Hottel';
                        }
                        if ($value['course']==2) {
                            echo 'Business';
                        }   
                        ?>    
                    </td>
                  
                    <td>
                        <a href="detail.php?stt=<?php echo $value['id']?>">detail</a>
                    </td>
                <?php 
                if ($_SESSION['name']=='Admin') {?>
                      <td>
                        <a href="form_update.php?stt=<?php echo $value['id']?>">update</a>
                    </td>                   
                    <td>
                        <a href="handle_delete.php?stt=<?php echo $value['id']?>">delete</a>
                    </td>      
                <?php } ?>
              
                </tr>
            <?php } ?>    
    </table>
    <a href="../handle_logout.php">LOG_OUT</i></a>
</body>
     <script src="./js_style2.js"></script>                   
</html>
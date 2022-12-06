<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="http://127.0.0.1/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="http://127.0.0.1/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../fontawesome-free-6.1.1-web/css/all.css">
    <link href="https://fonts.googleapis.com/earlyaccess/nicomoji.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">

    
    <style>
        a{
            color: #fff;
        }
        .photo{
            display: flex;
            justify-content: center;
            position: relative;
            
        }                
        .photo img{
        width: 170px;
        height: 170px;
        border: 4px solid rgb(129, 125, 125);
        border-radius: 50% 50%; 
        }
        .update_img{
            display: inline-block;
            font-size: 23px;
            padding: 10px 30px;
            position: absolute;
            top: 137px;
            left: 54%;
        }
        .form_update_img{
            display: none;
            position: absolute;
            top: 106px;
            left: 57%;
        }
    </style>
    <title>Document</title>
</head>
<body>
<?php
        $stt = $_GET['stt'];
        // var_dump($stt);
        require_once 'connect.php';
        $query="Select * from student where id = $stt" ;
        $result= mysqli_query($db,$query);
        $value = mysqli_fetch_array($result);
        // echo "$data[id]";
        // dir($data);
    ?>
<div class="photo">
            <img src="" alt="">  
            <a class="update_img" href=""><i class="fa-solid fa-image"></i></a>      
</div>
<div class="form_update_img">
        <form action="" method="post">
            <input type="file">
            <input type="submit" value="upload">
        </form>

</div>

<table>
            <tr>
                <th>学生番号</th>
                <td><?php echo 'k'.$value['id'] ?></td>
            </tr>
            <tr>
                <th style="width:150px">名前</th>
                <td ><?php echo $value['name'] ?></td>
            </tr>
            <tr>
                <th>国</th>
                <td ><?php echo $value['country'] ?></td>
            </tr>
            <tr>
                 <th>性別</th>
                 <td>
                        <?php 
                        if ($value['name']==0) {
                            echo '男';
                        }else {
                            echo '女';
                        }
                        ?>    
                    </td>
            </tr>
            <tr>
                <th>誕生日</th>
                <td>
                        <?php echo $value['date'] ?>
                </td>
            </tr>
            <tr>
                <th>コース</th>
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
            </tr>
            <tr>
                    <th>連絡アドレス</th>      
                    <td>
                        <a href="<?php echo $value['contact']?>"><?php echo $value['contact']?></a>
                    </td>
            </tr>
    </table>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <!-- <link rel="stylesheet" href="style.css"> -->

</head>
<body>
    <?php
        $stt = $_GET['stt'];
        var_dump($stt);
        require_once 'connect.php';
        $query="Select * from student where id = $stt" ;
        $result= mysqli_query($db,$query);
        $data = mysqli_fetch_array($result);
        // echo "$data[id]";
        // dir($data);
    ?>
    <main>
        <h1>学生情報 Form Update</h1>
        <form action="handle_update.php" method="post">
            <input type="hidden" name="stt" value="<?php echo $stt ?>">
            <label for="id">学生番号</label>
            <input type="text" id="id" name="id" placeholder="K217035" value="<?php echo "$data[id]" ?>">
            <br>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="LETHANHTUNG" value="<?php echo "$data[name]" ?>">
            <br>
            <div class="connext" > 
                <label for="country">母国</label> 
                <?php $option = array("VIETNAM", "JAPAN", "CHINA","Uzbekistan","BANGLADES","NEPAL","MYANMAR","other");?>     
                <select name="country" id="country"?>">
                    <!-- <option>VIETNAM</option>
                    <option>JAPAN</option>
                    <option>CHINA</option>
                    <option>Uzbekistan</option>
                    <option>BANGLADES</option>
                    <option>NEPAL</option>
                    <option>MYANMAR</option>
                    <option>other</option> -->
                    <?php foreach ($option as $value) {?>
                        <option <?php if ($value==$data["country"]) {
                            echo "selected";
                        }?>>
                        
                        <?php echo $value?>
                        
                        </option>
            
                    <?php } ?>

                </select>      
            </div>
            <div class="connext">
                <span>性別:</span>
                <label>
                    <input type="radio" name="type" value="0"
                        <?php
                            if ($data['type']==0) {
                                echo 'checked';
                            }
                        ?>
                    >
                        男性
                </label>
                <label>
                    <input type="radio" name="type" value="1"
                        <?php
                            if ($data['type']==1) {
                                echo 'checked';
                            }
                        ?>
                    >
                        女性
                </label>
            </div>
            <div class="connext">
                <span>誕生日</span>
                <label>
                    <input type="date" name="date" value="<?php echo $data['date']?>">
    
                </label>
    
            </div>    
            <br>
            <div class="connext" > 
                <label for="course">コース</label>      
                <select name="course" id="course" value="<?php echo $data['course'] ?>" >
                    <option value="0">IT</option>
                    <option value="1">Hottel</option>
                    <option value="2">Business</option>
                </select>      
            </div>
            <br>
            <div class="connext" > 
                <label for="contact">連絡アドレス</label>  
                <input type="text" name=contact placeholder="電話番号,Facebook"  value="<?php echo $data['contact'] ?>" >    
            </div>
             

            <input type="submit" value="Update">
        
        </form>

    </main>
   
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="style.css">
</head>
<body>
   <main>
      <div class="login">
         <img src="./img/logo.svg" alt="logo">
         <form action="handle_login.php" method="Post">
            <input type="text"  name="name" id="name"  placeholder="Name" >
            <span id="erro" style="color:Tomato;"> <?php if (isset($_GET['erro'])) {
               echo ($_GET['erro']);
            } ?> </span>
            <br>
            <input type="password" id="pass" name="pass" placeholder="Password" autocomplete="off">
            <br>
            <input type="submit" value="Log In" autocomplete="off">
         </form>
         <a href="">Forgot password?</a>
      </div>
   </main>
</body>
</html>
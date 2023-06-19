<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Welcome To marW</h1>
    <fieldset>
    <legend><h4>crier votre compte sur marW</h4></legend>
    <form action="" method="post">
        fullname : <br>
        <input type="text" name="fullname" id="input" placeholder="write your fullname here"><br>
        <?php
        error_reporting(0);
        $fullname=$_POST['fullname'];
        $reg=preg_match('/[a-zA-Z]{3,}$/',$fullname);
        if(isset($_POST['submit'])){
            if(!empty($fullname)){
                if(!$reg){
                    echo '<div class="alert">fullname is not valid</div>';
                }
            }
            else{
                echo '<div class="alert">fullname is important to write it !</div>';
            }
        }
        
        ?><br>
        email : <br>
        <input type="email" name="email" id="input" placeholder="write your email here"><br>
        <?php
        error_reporting(0);
        $email=$_POST['email'];
        $reg2=preg_match('/[a-zA-Z@#$%^&*]{3,}\@gmail\.([a-zA-Z]{2,3}$)/',$email);
        if(isset($_POST['submit'])){
            if(!empty($email)){
                if(!$reg2){
                    echo '<div class="alert">email is not valid</div>';
                }
            }
            else{
                echo '<div class="alert">email is important to write it !</div>';
            }
        }
        
        ?><br>
        password : <br>
        <input type="password" name="password" id="input" placeholder="write your password here"><br>
        <?php
        error_reporting(0);
        $password=$_POST['password'];
        if(isset($_POST['submit'])){
            if(empty($password)){

                echo '<div class="alert">password is important to write it !</div>';
            }
        }
        
        ?><br>
        photo : <br>
        <input type="file" name="photo" id=""><br><br>
        <input type="submit" name="submit" class="button" value="create account">Or
        <button type="button" class="button"><a href="login.php">Login</a></button>
        <?php
        if(isset($_POST['submit'])){
            if($reg && $reg2 && !empty($_POST['password'])){
                include 'connection.php';
                session_start();
                $inserer=$users->prepare('INSERT INTO users(login1,email1,password1,photo) VALUES(?,?,?,?)');
                $inserer->execute([$_POST['fullname'],$_POST['email'],$_POST['password'],$_POST['photo']]);
                $_SESSION['login']=$_POST['fullname'];
                $_SESSION['email']=$_POST['email'];
                $_SESSION['password']=$_POST['password'];
                $_SESSION['photo']=$_POST['photo'];
                header('Location:montant.php');
            }
        }
        
        
        ?>
    </form>
    </fieldset>
</body>
</html>

<?php
include "database.php";
if (isset($_POST['log'])) {
    if (empty(trim($_POST['email']))or empty(trim($_POST['pass']))) {
        echo "Les champs sont obligatoires";
    }else{
            $email=htmlspecialchars($_POST['email']);
            $pass=htmlspecialchars($_POST['pass']);
        }
    $query="SELECT* FROM user WHERE email=:email;";
    
      $stmt=$pdo->prepare($query);
      $stmt->bindValue(':email',$email);
      $stmt->execute();
      $user=$stmt->fetch(PDO::FETCH_ASSOC);
      if(isset($user)){
        if (password_verify($pass, $user['password'])) {
            session_start();
            $_SESSION["user"]= $user;
            header("location:pdt_cat.php");
        }else{
            echo "Mot de passe incorrect";
        }
     
    }else{
        echo "Utilisateur existe pas !";
    }
    
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn</title>
</head>
<body>
    <form action="" method="post">
    <div>
            <label for="email">Email</label>
        </div>
        <div>
            <input type="email" id="email" name="email">
        </div>
        <div>
            <label for="pass">Password</label>
        </div>
        <div>
            <input type="password" id="pass" name="pass">
        </div>
        <div>
            <input type="submit" value="LogIn" name="log">
        </div>
        <div>
            <button><a href="singUp.php">SignUp</a></button>
        </div>
    </form>
</body>
</html>
<?php
include "database.php";
if (isset($_POST['log'])) {
    if (empty(trim($_POST['name']))or empty(trim($_POST['pass']))) {
        echo "Les champs sont obligatoires";
    }else{
            $name=htmlspecialchars($_POST['name']);
            $pass=htmlspecialchars($_POST['pass']);
        }
    $query="SELECT* FROM user WHERE username=:username;";
    
      $stmt=$pdo->prepare($query);
      $stmt->bindValue(':username',$name);
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
    <link rel="stylesheet" href="fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="login.css">
    <title>LogIn</title>
</head>
<nav>
    <div>
       <button><a href="singUp.php">S'ENREGISTRER</a></button>
    </div>
</nav>
<body>
    <form action="" method="post">
        <div class="logo">
        </div>
            <i class="fa-solid fa-user user" ></i>
        
        <h1>LOG IN</h1>
        <div class="content">
          <div class="rond">
          <i class="fa-solid fa-user"></i>
              <input type="text" id="name" name="name" placeholder="Username">
          </div>
              
         <div class="rond">
         <i class="fa-solid fa-lock"></i>
              <input type="password" id="pass" name="pass" placeholder="Password">
         </div>
        </div>
        <input type="submit" value="SE CONNECTER" name="log" class="login">
    </form>
</body>
</html>

<?php
include "database.php";
// include "traite.php";
// session_start();
function uploadImage(){
    $lien_img="download/";
    $lier_img=$lien_img.basename($_FILES["images"]["name"]);
    if (move_uploaded_file($_FILES["images"]["tmp_name"],$lier_img)) {
        return $lier_img ;
    }else{
        echo "echoué";
        return null;
    }
} 
if (isset($_POST['sing'])) {
    if (empty(trim($_POST['nom']))or empty(trim($_POST['email']))or empty(trim($_POST['pass']))) {
        echo "Les champs sont obligatoires";
    }else{
            $nom=htmlspecialchars($_POST['nom']);
            $email=htmlspecialchars($_POST['email']);
            $pass=password_hash(htmlspecialchars($_POST['pass']),PASSWORD_BCRYPT);
            $img="";
            if(isset($_FILES['images']['name'])){
                $img=uploadImage();
            }
        }

  $query="INSERT INTO user (username,email,password,photo) VALUES (:username,:email,:password,:photo);";
  $tab=[
    'username' =>$nom,
    'email' =>$email,
    'password' =>$pass,
    'photo' => $img,
  ];
  $stmt=$pdo->prepare($query);
  $stmt->execute($tab);
  header("location:logIn.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="signup.css">
    <title>SingUP</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="logo"></div>
        <i class="fa-solid fa-camera camera"></i>
        <h1>Créer un compte</h1>
        <div class="rond">
            <i class="fa-solid fa-user"></i>
            <input type="text" id="name" name="nom" placeholder="Username">
        </div>
        <div class="rond">
            <i class="fa-solid fa-envelope"></i>
            <input type="email" id="email" name="email" placeholder="Email">
        </div>
        <div class="rond">
            <i class="fa-solid fa-lock"></i>
            <input type="password" id="pass" name="pass" placeholder="Password">
        </div>
        <div class="rond">
            <!-- <i class="fa-solid fa-camera"> -->
            <input type="file" id="photo" name="images">
        </div>
        <div>
            <input type="submit" value="SingUp" name="sing" class="signup">
        </div>
    </form>
</body>
</html>
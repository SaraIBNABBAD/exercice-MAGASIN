<?php
class Produit{
    public $nom;
    public $prix;
    public $quantite;
    public $descript;
    public $img;
    function __construct(){
      $this->nom=$_POST["nomPDT"];
      $this->prix=$_POST["prix"];
      $this->quantite=$_POST["qte"];
      $this->$descript=$_POST["desc"];
      $this->img=($_FILES["fileToUpload"]["name"]);
    }
   
   public function getInfo(){
    echo "<h2> nom: ". $this->nom. " Pris: ".$this->prix. "</h2> <strong> quantité: ".$this->quantite, "</strong>  <br> <img src='".$this->img."' />";
   }
 }
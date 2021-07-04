<?php
function pdo_connect_mysql() {
  $user='root';
  $pass="";
    
  try {
    $dbh = new PDO('mysql:host=localhost;dbname=bibliotheque', $user, $pass);
    echo "connexion établie" . "<br/>";
    return $dbh;
        
               
  }catch (PDOException $e) {
    print "Erreur, vous avez etait deconnecté !: " . $e->getMessage() . "<br/>";
    return false;
    }
}
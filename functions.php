
<?php
/**
 * function permettant de printer la template de header
 */
function template_header($title) {
    echo <<<EOT
    <!DOCTYPE html>
    <html>
      <head>
        <meta charset="utf-8">
        <title>Bibliothèque</title>
        <link href="style.css" rel="stylesheet" type="text/css">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
      </head>
      <body>
      <h1>Bibliothèque</h1>
        <nav class="navtop">
          <div>
            
            <button type="button" class="btn btn-outline-primary btn-sm"><a href="index.php">Home</a></button>
            <button type="button" class="btn btn-outline-primary btn-sm"><a href="rayon.php">Rayon</a></button>
            <button type="button" class="btn btn-outline-primary btn-sm"><a href="catalogue.php">Catalogue</a></button>
            <button type="button" class="btn btn-outline-primary btn-sm"><a href="empreint.php">Empreint</a></button>
            <button type="button" class="btn btn-outline-primary btn-sm"><a href="adherent.php">Adherents</a></button>
            <a href="inscription.php" class="create-contact">Créer un membre</a>
            
          </div>
        </nav>
    EOT;
  }
  
  
  /**
   * function permettant de printer la template de footer
   */
  function template_footer() {
    $year = date("Y");
    echo <<<EOT
          <footer>
            <p>©$year by HelloWorld!</p>
          </footer>
        </body>
    </html>
    EOT;
  }

// create data
function addAd(){
  $connect = pdo_connect_mysql();
  $sql = "INSERT INTO adherent 
  VALUES ( ?,?,?)";


  if(!empty($_POST["submit"])) {
    
    $pdo_statement=$connect->prepare($sql);
    $result = $pdo_statement->execute( array( 
     $_POST['Nom'],
     $_POST['Prenom'],
     $_POST['nbLivreEmprunte']
    ) );
    if($result) {
      header('location:index.php');
    }
  }

  return($result);
}

function addR(){
  $connect = pdo_connect_mysql();
  $sql = "INSERT INTO rayon
  VALUES (?,?)";


  if(!empty($_POST["submit"])) {
    
    $pdo_statement=$connect->prepare($sql);
    $result = $pdo_statement->execute( array( 
     $_POST['Nom'],
     $_POST['Reference'],
  
    ) );
    if($result) {
      header('location:index.php');
    }
  }

  return($result);

}
function addE(){
  $connect = pdo_connect_mysql();
  $sql = "INSERT INTO empreint
  VALUES (?,?,?,?,?)";


  if(!empty($_POST["submit"])) {
    
    $pdo_statement=$connect->prepare($sql);
    $result = $pdo_statement->execute( array( 
     $_POST['idLivre'],
     $_POST['idAdherent'],
     $_POST['dateEmpreint'],
     $_POST['DRetourMax'],
     $_POST['DRetour']
    ) );
    if($result) {
      header('location:index.php');
    }
  }

  return($result);
}
function addL(){
  $connect = pdo_connect_mysql();
  $sql = "INSERT INTO livre
  VALUES (?,?,?,?,?)";


  if(!empty($_POST["submit"])) {
    
    $pdo_statement=$connect->prepare($sql);
    $result = $pdo_statement->execute( array( 
     $_POST['Titre'],
     $_POST['Auteur'],
     $_POST['Disponible'],
     $_POST['idRayon']
    ) );
    if($result) {
      header('location:index.php');
    }
  }

  return($result);

}

//delete data
function delAd(){
  $msg =  "confirmer la supprésion";
  $sql= "DELETE from adherent where id= ?"];
  $pdo_statement=pdo_connect_mysql()->prepare($sql);
  $pdo_statement->execute();
  return $result;
  header('location:index.php');
}
function delR(){
  $msg =  "confirmer la supprésion";
  $sql= "DELETE from Rayon where id= ?"];
  $pdo_statement=pdo_connect_mysql()->prepare($sql);
  $pdo_statement->execute();
  return $result;
  header('location:index.php');
}
}
function delE(){
  $msg =  "confirmer la supprésion";
  $sql= "DELETE from empreint where id= ?"];
  $pdo_statement=pdo_connect_mysql()->prepare($sql);
  $pdo_statement->execute();
  return $result;
  header('location:index.php');
}

}
function delL(){
  $msg =  "confirmer la supprésion";
  $sql= "DELETE from livre where id= ?"];
  $pdo_statement=pdo_connect_mysql()->prepare($sql);
  $pdo_statement->execute();
  return $result;
  header('location:index.php');
}

}

// update data 
function updtAd(){
  $connect = pdo_connect_mysql();
$sql = "SELECT * FROM adherent where id=?" ;
//check la bd
if(!empty($_POST)) {
	$id=$_GET["id"]
	$pdo_statement=$connect->prepare("UPDATE adheret set 
	  Nom =?,
	 Prenom=?, 
	 nbLivreEmprunte=?
	 where id= $id ");
	$result = $pdo_statement->execute( array( 
	 $_POST['Nom'],
	 $_POST['Prenom'],
	 $_POST['nbLivreEmprunte']));
   
   return $result;
	if($result) {
		header('location:index.php');
	}
}


//afiiche les valeurs de chaques champs
$pdo_statement =$connect->prepare($sql);
$pdo_statement->execute([$_GET['id']]);
$result = $pdo_statement->fetch(PDO ::FETCH_ASSOC);



}
function updtR(){
  $connect = pdo_connect_mysql();
  $sql = "SELECT * FROM rayon where id=?" ;
  //check la bd
  if(!empty($_POST)) {
    $id =$_GET["id"]
    $pdo_statement=$connect->prepare("UPDATE rayon set 
     Nom =?,
     reference=?
     where id=" $id );
    $result = $pdo_statement->execute( array( 
      $_POST['Nom'],
     $_POST['reference'],
     ) );
     return $result;
    if($result) {
      header('location:index.php');
    }
  }
  
  
  //afiiche les valeurs de chaques champs
  $pdo_statement =$connect->prepare($sql);
  $pdo_statement->execute([$_GET['id']]);
  $result = $pdo_statement->fetch(PDO ::FETCH_ASSOC);
  
  
}
function updtE(){
  $connect = pdo_connect_mysql();
  $sql = "SELECT * FROM empreint where id=?" ;
  //check la bd
  if(!empty($_POST)) {
    $id =$_GET["id"]
    $pdo_statement=$connect->prepare("UPDATE empreint set 
     idLivre =?,
     idAdherent=?, 
     dateRetour=?,
     DateRetourMax=?,
     DateRetour=?
     where id= $id");
    $result = $pdo_statement->execute( array( 
     $_POST['idLivre'],
     $_POST['idAdherent'],
     $_POST['dateRetour'],
     $_POST['DateRetourMax'],
     $_POST['DateRetour'] ) );
     return $result;
    if($result) {
      header('location:index.php');
    }
  }
  
  
  //afiiche les valeurs de chaques champs
  $pdo_statement =$connect->prepare($sql);
  $pdo_statement->execute([$_GET['id']]);
  $result = $pdo_statement->fetch(PDO ::FETCH_ASSOC);
  
  
}
function updtL(){
  $connect = pdo_connect_mysql();
  $sql = "SELECT * FROM livre where id=?" ;
  //check la bd
  if(!empty($_POST)) {
    $id =$_GET["id"]
    $pdo_statement=$connect->prepare("UPDATE livre set 
     Titre =?,
     Auteur=?, 
     Disponible=?,
     idRayon=?
     where id= $id");
    $result = $pdo_statement->execute( array( 
      $_POST['Titre'],
     $_POST['Auteur'],
     $_POST['Disponible'],
     $_POST['idRayon'] ) );
    if($result) {
      header('location:index.php');
    }
  }
  
  
  //afiiche les valeurs de chaques champs
  $pdo_statement =$connect->prepare($sql);
  $pdo_statement->execute([$_GET['id']]);
  $result = $pdo_statement->fetch(PDO ::FETCH_ASSOC);
  
  
}

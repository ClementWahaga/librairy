<?php 
    require_once 'db.php'; // connexion à la bdd via la db.php
    $bdd =  pdo_connect_mysql() ;
    // check des  variables si elle existent et qu'elles ne sont pas vides
    if(!empty($_POST['Nom']) && !empty($_POST['Prenom']) && !empty($_POST['NbLivreEmprunte']))
    {
        // Patch XSS
        $Nom = htmlspecialchars($_POST['Nom']);
        $Prenom = htmlspecialchars($_POST['Prenom']);
        $NbLivreEmprunte = htmlspecialchars($_POST['NbLivreEmprunte']);
       

        // On vérifie si l'utilisateur existe
        $check = $bdd->prepare('SELECT Nom, Prenom, NbLivreEmprunte FROM adherent WHERE Prenom = ?');
        $check->execute(array($Prenom));
        $data = $check->fetch();
        $row = $check->rowCount();

        $Prenom = strtolower($Prenom); // Prenom transformé en minuscule


        // Si la requete renvoie un 0 alors il n ya spas de user 
        if($row == 0){ 
            if(strlen($Nom) <= 100){ // On check que la longueur du Nom <= 100
                if(strlen($Prenom) <= 100){ // On check que la longueur du mail <= 100
                    if(($ $NbLivreEmrunt)<= 5){ // Si le nbs de livre est superieure a 5 il ne pourrar pas emprunté

                            // On insère dans la base de données
                            $insert = $bdd->prepare('INSERT INTO adherent(Nom, Prenom, NbLivreEmprunte) VALUES(?, ?, ?)');
                            $insert->execute(array(
                                'Nom' => $Nom,
                                'Prenom' => $Prenom,
                                'NbLivreEmprunte' => $NbLivreEmprunte

                            ));
                            // On redirige avec le message de succès
                            header('Location:inscription.php?reg_err=success');
                            die();
                        
                    }else{ header('Location: inscription.php?reg_err=Prenom'); die();}
                }else{ header('Location: inscription.php?reg_err=Prenom_length'); die();}
            }else{ header('Location: inscription.php?reg_err=Nom_length'); die();}
        }else{ header('Location: inscription.php?reg_err=already'); die();}
    }
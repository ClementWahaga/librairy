<?php
require 'functions.php';
require 'db.php';
$connect = pdo_connect_mysql();
$pdo_statement =$connect->prepare("SELECT a.id,
a.Nom,
a.Prenom,
a.NbLivreEmprunte,
e.idLivre,
l.idRayon
FROM adherent as a 
right join empreint as e on e.idLivre
right join livre as l on l.idRayon
ORDER BY id ");
$pdo_statement->execute();
$result = $pdo_statement->fetchAll();
?>

<?php echo template_header('Read'); ?>


<div class="content read">
	<h2>Recapitulatif</h2>
	
	<table>
        <thead>
            <tr>
                <td>#</td>
                <td>Nom</td>
                <td>Prénom</td>
                <td>#Livre</td>
                <td>nombre de livre empreinté</td>   
                <td>#rayon</td>            
            </tr>
        </thead>
        <tbody id="table-body">
	<?php
	if(!empty($result)) { 
		foreach($result as $row) {
	?>
	  <tr class="table-row">
		<td><?php echo $row["id"]; ?></td>
		<td><?php echo $row["Nom"]; ?></td>
		<td><?php echo $row["Prenom"]; ?></td>
    <td><?php echo $row["idLivre"]; ?></td>
    <td><?php echo $row["NbLivreEmprunte"]; ?></td>
    <td><?php echo $row["idRayon"]; ?></td>
		<td class="actions">
      <a href="update.php?id=<?php echo $row['id']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
      <a href="delete.php?id=<?php echo $row['id']?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
    </td>
	  </tr>
    <?php
		}
	}
	?>
  
  </tbody>
    </table>
</div>




















<?php echo template_footer(); ?>
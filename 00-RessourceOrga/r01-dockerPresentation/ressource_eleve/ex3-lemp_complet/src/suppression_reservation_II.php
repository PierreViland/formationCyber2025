<!DOCTYPE html>
<html>
	<!-- Exemple de page php-->
    <head>
        <title>Suppression de la reservation</title>
        <meta charset="utf-8" />
    </head>
    <body>
        <?php 
		echo 'Suppression de la réservation : ' .htmlspecialchars($_POST['id_resa']);
		?>
		<p>
				
		<?php
			
			
		try
		{					
			$bdd = new PDO('mysql:host=mysql;port=3306;dbname=hotel_reservation;charset=utf8', 'root', 'root');
			$nb  = $bdd->query('DELETE FROM client_res WHERE ID='.$_POST['id_resa']);
		}
		catch (Exception $e)
		{
			echo 'ID n\'ont valide';
			die('Erreur : ' . $e->getMessage());
		}
		
				
		?>
		</p>
		
		<ul >
			<li > <a href="formulaire_hotel_bdd_II.php">Ajouter nouvelle réservation</a> </li >
			<li > <a href="visualiser_reservation_hotel_bdd_II.php">Visualiser réservation</a> </li >
		</ul >
		
		<a href="../page2.html">
		
    </body>
</html>
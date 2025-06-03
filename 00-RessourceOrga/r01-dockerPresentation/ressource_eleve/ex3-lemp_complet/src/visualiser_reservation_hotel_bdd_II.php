<!DOCTYPE html>
<html>
	<!-- Exemple de page php-->
    <head>
        <title>Visulisation des réservations</title>
        <meta charset="utf-8" />
    </head>
    <body>
        <h2>Jointure Interne DOCKER++</h2>
		

		<p>				
		<?php		
		try
		{
			//Se connecter à la base de données
			$bdd = new PDO('mysql:host=mysql;port=3306;dbname=hotel_reservation;charset=utf8', 'root', 'root');			
			//Requete à une base de données. Les résultats sont récupérés sous la forme d'un tableau

			$rep = $bdd->query('SELECT client_res.ID, client_res.nom_client, client_res.prenom_client, chambre.prix_chambre
								FROM client_res
								INNER JOIN chambre
								ON chambre.ID_chambre = client_res.ID_chambre');		
			
			Echo 'ID ---- NOM - Prénom - Prix<br><br>';
			
			//Affichage des résultats
			while ($reponse_bdd = $rep->fetch())
			{		
				echo $reponse_bdd['ID'] .' ---- ' .
						$reponse_bdd['nom_client'] . ' - ' .
						$reponse_bdd['prenom_client'] . ' - ' .
						$reponse_bdd['prix_chambre']. '<br>';  
			}
			$rep->closeCursor();					
		}
		catch (Exception $e)
		{
			echo 'Erreur';
			die('Erreur : ' . $e->getMessage());
		}	
		?>
		</p>
		
		<h2>Jointure Externe (Right)</h2>
		<p>				
		<?php		
		try
		{
			//Se connecter à la base de données
			$bdd = new PDO('mysql:host=mysql;port=3306;dbname=hotel_reservation;charset=utf8', 'root', 'root');			
			//Requete à une base de données. Les résultats sont récupérés sous la forme d'un tableau

			$rep = $bdd->query('SELECT client_res.ID, client_res.nom_client, client_res.prenom_client, chambre.prix_chambre
								FROM client_res
								RIGHT JOIN chambre
								ON chambre.ID_chambre = client_res.ID_chambre');		
			
			Echo 'ID ---- NOM - Prénom - Prix<br><br>';
			
			//Affichage des résultats
			while ($reponse_bdd = $rep->fetch())
			{		
				echo $reponse_bdd['ID'] .' ---- ' .
						$reponse_bdd['nom_client'] . ' - ' .
						$reponse_bdd['prenom_client'] . ' - ' .
						$reponse_bdd['prix_chambre']. '<br>';  
			}
			$rep->closeCursor();					
		}
		catch (Exception $e)
		{
			echo 'Erreur';
			die('Erreur : ' . $e->getMessage());
		}	
		?>
		</p>
		
		<h2>Jointure Externe (Left)</h2>
		<p>				
		<?php		
		try
		{
			//Se connecter à la base de données
			$bdd = new PDO('mysql:host=mysql;port=3306;dbname=hotel_reservation;charset=utf8', 'root', 'root');			
			//Requete à une base de données. Les résultats sont récupérés sous la forme d'un tableau

			$rep = $bdd->query('SELECT client_res.ID, client_res.nom_client, client_res.prenom_client, chambre.prix_chambre
								FROM client_res
								LEFT JOIN chambre
								ON chambre.ID_chambre = client_res.ID_chambre');		
			
			Echo 'ID ---- NOM - Prénom - Prix<br><br>';
			
			//Affichage des résultats
			while ($reponse_bdd = $rep->fetch())
			{		
				echo $reponse_bdd['ID'] .' ---- ' .
						$reponse_bdd['nom_client'] . ' - ' .
						$reponse_bdd['prenom_client'] . ' - ' .
						$reponse_bdd['prix_chambre']. '<br>';  
			}
			$rep->closeCursor();					
		}
		catch (Exception $e)
		{
			echo 'Erreur';
			die('Erreur : ' . $e->getMessage());
		}	
		?>
		</p>
		
		
		<!-- Formulaire Gestion suppression -->
		<p>
		<form method="post" action="suppression_reservation_II.php" >
		<p>
		ID a suprimer: <input type="text" name="id_resa" /input> </p> 
		</p>			
		<p> 
		<input type="submit" name="validation_suppression" value="Supprimer réservation" />
		</form>
		
		
		<ul >
			<li > <a href="formulaire_hotel_bdd_II.php">Ajouter nouvelle réservation</a> </li >
			<li > <a href="visualiser_reservation_hotel_bdd_II.php">Visualiser réservation</a> </li >
		</ul >
		
		<a href="../page2.html">
		
    </body>
</html>
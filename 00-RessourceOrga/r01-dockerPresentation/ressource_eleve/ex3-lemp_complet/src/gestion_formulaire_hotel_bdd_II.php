<!DOCTYPE html>
<html>
	<!-- Exemple de page php-->
    <head>
        <title>Resume de la reservation</title>
        <meta charset="utf-8" />
    </head>
    <body>
        <h2>Résumé de la réservation en ligne de <?php 
		echo htmlspecialchars($_POST['prenom']) . ' ' . htmlspecialchars($_POST['nom']);
		?></h2>
		<p>
				
		<?php
				
		if( ctype_digit($_POST['nb_nuit']) == true ) 		{
			echo 'Vous dormirez dans la  chambre '. $_POST['selection_chambre'] . ' pour ' . $_POST['nb_nuit'] .' nuit(s) <br>';
			echo 'Arrivée le ' . $_POST['jour_arrivee'] .'/' .$_POST['mois_arrivee'] . '/' . $_POST['annee_arrivee'] . '<br><br>';	
			
			
			try
			{
				
				$date_arrivee = $_POST['annee_arrivee'] .'-'.$_POST['mois_arrivee'] . '-' . $_POST['jour_arrivee'];
				
				//Se connecter à la base de données
				$bdd = new PDO('mysql:host=mysql;port=3306;dbname=hotel_reservation;port=3306;charset=utf8', 'root', 'root');
				//Insertion de données
				$nb  = $bdd->query('INSERT INTO client_res (ID, nom_client, prenom_client, ID_chambre, date_arrivee, nb_nuit) VALUES (NULL, \''.$_POST['nom'] .'\', 
				\''.$_POST['prenom'].'\', 
				\''.$_POST['selection_chambre'].'\', 
				\''.$date_arrivee.'\',
				\''.$_POST['nb_nuit'].'\'
				)');
				
				//Autre manière de faire pour insérer des données dasn un bdd.
				//Beaucop mieux mais plus compliqué
				//Préparation
				// $req = $bdd->prepare('INSERT INTO client_res (ID, nom_client, prenom_client, ID_chambre, date_arrivee, nb_nuit) VALUES(:ID, :nom, :prenom, :chambre, :date_arrivee, :nb_nuit)');
				// //Suivie d'execution
				// $req->execute(array(
					// 'ID'=> NULL,
					// 'nom' => $_POST['nom'],
					// 'prenom' => $_POST['prenom'], 
					// 'chambre' => $_POST['selection_chambre'],
					// 'date_arrivee' =>$date_arrivee,
					// 'nb_nuit' => $_POST['nb_nuit']
					// ));
					// echo 'Ecriture dans la base de données';
				
			}
			catch (Exception $e)
			{
				echo 'Erreur';
				die('Erreur : ' . $e->getMessage());
			}
		}
		else 
		{			
			echo 'Le nombre de nuits n\'est pas valide <br>' ;
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
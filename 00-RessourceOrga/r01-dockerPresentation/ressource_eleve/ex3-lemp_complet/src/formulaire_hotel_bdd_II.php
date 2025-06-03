<!DOCTYPE html>
<html>
	<!-- Exemple de page php-->
    <head>
        <title>Réservation hotel avec Docker</title>
        <meta charset="utf-8" />
    </head>
    <body>
    
	<h2> Réservation en ligne ---DOCKER----</h2>
	
	<!-- Debut du formulaire -->
	<form method="post" action="gestion_formulaire_hotel_bdd_II.php" >
	
		<p>Prénom : <input type="text" name="prenom" /input> </p> 
		<p>Nom : <input type="text" name="nom" /input> </p>		
		<p>Selection de la chambre
		<select name="selection_chambre">
		<option value=1>Chambre 1</option>
		<option value=2>Chambre 2</option>
		<option value=3>Chambre 3</option>
		<option value=4>Chambre 4</option>		
		</select>
		</p>
		
		<p>Selection de la date d'arrivée: 
		
		Jour :
		<select name="jour_arrivee"> 		
		<?php		
		for($compt = 1; $compt <= 31 ; $compt++)
		{
			echo '<option value='. $compt . '>' . $compt .'</option>';
			
		}?>
		</select>
		Mois :
		<select name="mois_arrivee"> 		
		<?php		
		for($compt = 1; $compt <= 12 ; $compt++)
		{
			echo '<option value='. $compt . '>' . $compt .'</option>';
			
		}?>
		</select>
		Annee :
		<select name="annee_arrivee"> 		
		<?php		
		for($compt = 2022; $compt <= 2024 ; $compt++)
		{
			echo '<option value='. $compt . '>' . $compt .'</option>';
			
		}?>
		</select>
		</p>
		
		<p>
		Nombre de nuits : <input type="text" name="nb_nuit" /input> </p> 
		</p>
			
		
		<p> 
		<input type="submit" name="valider " value="Valider reservation" />
		</form>
		</p>
	
	
		<p>		
		<li > <a href="visualiser_reservation_hotel_bdd_II.php">Visualisation toutes les réservations</a> </li >
		</p>
	
    </body>
</html>
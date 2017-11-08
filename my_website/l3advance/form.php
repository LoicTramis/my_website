<?php
    $file_name = basename(__FILE__);
    $folder_name = basename(__DIR__);
    
    require_once '../include/header.inc.php';
?>
	<body>
		<section>
			<h1>JavaScript</h1>			
			<article>
				<h2>Formulaire</h2>
				<fieldset>
					<legend>Vos informations</legend>
					<form action="./" method="post">
    					<label for="name">Nom : </label>
    					<input type="text" id="name">
    					
    					<label for="lastname">Prenom : </label>
    					<input type="text" id="lastname">
    					
    					<label for="email">e-mail : </label>
    					<input type="text" id="email">
					
					</form>
				</fieldset>
				
				<fieldset>
					<legend>Avez-vous une voiture ?</legend>
					<form action="./form.php" method="get">
    					<input type="radio" name="vehicle" value="car" id="car" onchange="has_car()" checked>
						<label for="car">Oui</label>
    					
    					<input type="radio" name="vehicle" value="nocar" id="nocar" onchange="has_car()">
    					<label for="nocar">Non</label>
    					
    					<p id="car-comment"></p>    					
					</form>
				</fieldset>
				
				<fieldset id="forcar">
					<legend>Choississez le modele</legend>
					<form action="./form.php" method="get">
						<select name="brand">
							<option>Renault</option>
							<option>Peugeot</option>
							<option>Citroen</option>
							<option>Dacia</option>
						</select>
    					
    					<p id="modele-comment"></p>  
    					<input type="submit" value="Envoyer">  	  					
					</form>
				</fieldset>
				
    				<fieldset id="trains" style="display: none">
    					<legend>Voyage en train</legend>
    					<form action="./form.php" method="get">
    						<label for="station-a">Gare de depart</label>
    						<select name="departure" id="station-a" onchange="change_arrival_option();">
    							<option value="depart">Depart</option>
    						</select>
    						<p id="noob"></p>
    						
    						<label for="station-b">Gare d'arrivee</label>
        					<select name="arrival" id="station-b" disabled="disabled" onchange="change_departure_option();">
        						<option>Arrivee</option>
    						</select>
        					 
        					<input type="submit" value="Envoyer">  					
    					</form>
    				</fieldset>				
			</article>
			
			<article>
				<h2>Reponse PHP</h2>
				<?php 
				    if (isset($_GET['brand'])) {
				        echo "La marque est ".$_GET['brand'];
				    }
				    
				    if (isset($_GET['departure']) && isset($_GET['arrival'])) {
				        echo "  Gare de depart : ".$_GET['departure']."\n
                                Gare d'arrivee : ".$_GET['arrival'];
				    }
				?>
			</article>
		</section>
	</body>
</html>
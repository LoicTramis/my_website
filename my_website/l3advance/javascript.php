<?php
    $file_name = basename(__FILE__);
    $folder_name = basename(__DIR__);
    
    require_once '../include/header.inc.php';
?>
<div class="center">
    <section style="left: 0%;
                    transform: none;
                    width: 85%;">
    	<h2>JavaScript</h2>
    	
    	<article>
    		<h3>"Fausse" page Web</h3>
    		<p onmouseover="console.log('La souris est passe sur la paragraphe 1')" id="para">Paragraphe 1</p>
        	<p onmouseover="change_color()" id="para">Paragraphe 2</p>
        	<p onclick="document.getElementById('para').innerHTML = 'oui oui'" id="para">Paragraphe 3</p>
    	</article>	
    	
    	<article>
    		<h3>Gestionnaire d'&eacute;v&egrave;nement</h3>
        	<button class="button-js-l3" onclick="push()" id="bou">Appuyer !</button>
    	</article>
    
    	<article>
    		<h3>Formulaire</h3>
    		<fieldset class="l3form">
    			<legend>Vos informations</legend>
    			<form action="./javascript.php" method="post">
    				<label for="name">Nom : </label>
    				<input type="text" id="name">
    				
    				<label for="lastname">Prenom : </label>
    				<input type="text" id="lastname">
    				
    				<label for="email">e-mail : </label>
    				<input type="text" id="email">
    			
    			</form>
    		</fieldset>
    		
    		<fieldset class="l3form">
    			<legend>Avez-vous une voiture ?</legend>
    			<form action="./javascript.php" method="get">
    				<input type="radio" name="vehicle" value="car" id="car" onchange="has_car()" checked>
    				<label for="car">Oui</label>
    				
    				<input type="radio" name="vehicle" value="nocar" id="nocar" onchange="has_car()">
    				<label for="nocar">Non</label>
    				
    				<p id="car-comment"></p>    					
    			</form>
    		</fieldset>
    		
    		<fieldset class="l3form" id="forcar">
    			<legend>Choississez le modele</legend>
    			<form action="./javascript.php" method="get">
    				<select name="brand">
    					<option>Renault</option>
    					<option>Peugeot</option>
    					<option>Citroen</option>
    					<option>Dacia</option>
    				</select>
    				
    				<input type="submit" value="Envoyer">  	  					
    			</form>
    		</fieldset>
    		
    		<fieldset class="l3form" id="trains" style="display: none">
    			<legend>Voyage en train</legend>
    			<form action="./javascript.php" method="get">
    				<label for="station-a">Gare de d&eacute;part</label>
    				<select name="departure" id="station-a" onchange="change_arrival_option();">
    					<option>Depart</option>
    				</select>
    				<p id="noob"></p>
    				
    				<label for="station-b">Gare d'arriv&eacute;e</label>
    				<select name="arrival" id="station-b" disabled="disabled" onchange="change_departure_option();">
    					<option>Arrivee</option>
    				</select>
    				 
    				<input type="submit" value="Envoyer">  					
    			</form>
    		</fieldset>				
    	</article>	
    			
    	<article>
    		<h3>Reponse PHP</h3>
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
    	
    	<article>
    		<h3>Navigation</h3>
			<button class="button-js-l3" onclick="history.back()">Pr&eacute;c&eacute;dent</button>
			<button class="button-js-l3" onclick="history.forward()">Suivant</button>
    	</article>
    	
    	<article>
    		<h3>Timer</h3>
    		<p id="down">Il vous reste <strong id="timer">1min</strong> pour remplir le formulaire.</p>
    		
    		<fieldset class="l3form" id="timerForm">
    			<legend>Temps limit&eacute; !</legend>
    			<form action="./javascript.php" method="get">
        			<label for="planet">Une plan&egrave;te</label>
        			<input type="text" id="planet" name="telluric">
        			
        			<label for="star">Quel &eacute;toile ?</label>
        			<select id="star" name="solar">
        				<option>Naine blanche</option>
        				<option>G&eacute;ante rouge</option>
        				<option>Naine brune</option>
        			</select>
        			
        			<label for="solid">
        				<input type="radio" name="state" value="solide" id="solid">
        				Solide
        			</label>
        			
        			<label for="liquid">
        				<input type="radio" name="state" value="liquide" id="liquid">
        				Liquide
    				</label>
        			
        			<label for="gaz">
        				<input type="radio" name="state" value="gazeux" id="gaz">
        				Gaz
    				</label>
        			
        			<label for="plasm">
        				<input type="radio" name="state" value="plasma" id="plasm">
        				Plasma
    				</label>
        			
        			<input type="submit" value="Il est encore temps !" id="submitted">
        			</form>
    		</fieldset>
    		
    		<?php 
    		  if (isset($_GET['telluric']) && isset($_GET['solar']) && isset($_GET['state'])) {
    		      echo "<p>".$_GET['telluric']." n'est pas une ".$_GET['solar']." sous forme ".$_GET['state'].".</p>";
    		  }
    		?>
    	</article>
    	
    	<article>
    		<h3>Changement de style</h3>
    		<button class="button-js-l3" id="bg_color" value="white" onclick="change_local_style()">D&eacute;grad&eacute;</button>
    		<button class="button-js-l3" id="button_form" value="large" onclick="change_extern_style()">Classe CSS (Centr&eacute;)</button>
    	</article>
    </section>
    
    <script type="text/javascript">
    	function change_color() {
    		document.getElementById('para').style.color = 'red';
    	}
    
    	function change_size(taille) {
    		document.getElementById('para').style.fontSize = taille;
    	}
    
    	function push() {
    		document.getElementById('bou').innerHTML = "A&iuml;e !";
    	}
    	
    </script>
    <?php
        require_once '../include/l3aside.inc.php';
?>
</div>
<?php
    require_once '../include/footer.inc.php';
?>
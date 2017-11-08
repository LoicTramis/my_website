 <?php
    $file_name = basename(__FILE__);
    $folder_name = basename(__DIR__);

	require_once '../include/header.inc.php';

	require_once '../include/util.inc.php';
	require_once '../include/secure.inc.php';
?>
<section style="background: linear-gradient(#9966ff, #ecb3ff); color: white;">
	<h2><?php echo (isset($_SESSION['login']) && $_SESSION['login'] == "Entropy" ? "Profil administrateur" : "Profil");?></h2>
	<article>
		<?php
		  // the user/admin is logged in
		  if (isset($_SESSION['login']) || is_connected()) {
		?>
    		<h3>Vos donn&eacute;es</h3>
    		<div style="margin-top: 50px; text-align: center;">
    			<p>Param&egrave;tres</p>
    			<a class="button-account" href="./profile.php"><i class="fa fa-user"></i>Profil</a>
    			<a class="button-account" href="./history.php"><i class="fa fa-clock-o "></i>Historique</a>
    			<a class="button-account" href="#"><i class="fa fa-bar-chart "></i>Statistique</a>
    			<a class="button-account" href="./technical.php"><i class="fa fa-info-circle"></i>Avanc&eacute;</a>
    			<a class="button-account" href="./phpinfo.php"><i class="fa fa-info"></i>PHP Info</a>
    		</div>
		<?php
    		// form for signing up
    		} else {
 		?>
 			<div id="connect">
				<h3>Connexion</h3>
				<form method="post" action="./index.php">
						<fieldset class="signin">
						<legend >Connexion</legend>
    						<label for="login" > Identifiant : </label>
    						<input name ="login" type="text" id ="login">

    						<label for="password_signin">Mot de passe : </label>
    						<input name ="password" type ="password" id ="password_signin">

							<p class="switch">Pas encore de compte ? <span>Inscrivez-vous</span></p>

							<div class="reset-button">
								<input type="reset" value="Annuler">
							</div>
							<div class="signin-button">
								<input type="submit" value="Se connecter">
							</div>
    					</fieldset>
    				</form>
				</div>

				<div class="hidden" id="register">
					<h3>Cr&eacute;er un compte</h3>
					<form method="post" action="./index.php">
						<fieldset class="signup">
    						<legend>Inscription</legend>

        						<label for="lastname" >Nom : </label>
        						<input name ="lastname" type="text" id ="lastname" placeholder="Entrer votre nom" required>

        						<label for="firstname">Pr&eacute;nom : </label>
        						<input name ="firstname" type="text" id ="firstname" placeholder="Entrer votre pr&eacute;nom" required>

        						<label for="username" > Identifiant : </label>
        						<input name ="username" type="text" id ="username" placeholder="Entrer votre surnom" required>

        						<label for="email" > E-mail : </label>
        						<input name ="email" type="email" id ="email" placeholder="Entrer votre e-mail" required>

        						<label for="password">Mot de passe : </label>
        						<input name ="password" type ="password" id ="password" placeholder="Entrer votre mot de passe" required>

								<p class="switch">D&eacute;j&agrave; un compte ? <span>Connectez-vous</span></p>

								<div class="reset-button">
									<input type="reset" value="Annuler">
								</div>
								<div class="signin-button">
    								<input type="submit" value="S'incrire">
								</div>
    						</fieldset>
    					</form>
					</div>
			<?php
 			}

 			if (isset($_POST['lastname']) && isset($_POST['firstname'])	&& isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
 			    if (is_same_user($_POST['username'], $_POST['email'])) {
    	 			$lastname = $_POST['lastname'];
    	 			$firstname = $_POST['firstname'];
    	 			$username = $_POST['username'];
    	 			$email = $_POST['email'];
    	 			$password = $_POST['password'];

    	 			store_secure_data($lastname, $firstname, $username, $email, $password);

	 			    echo "<p id=\"state-succes\">Inscription r&eacute;ussi avec succ&egrave;s !</p>";
 			        echo "<p class=\"hidden\" id=\"state-fail\">Compte d&eacute;j&agrave existant !</p>";
 			    } else {
          	 	    echo "<p class=\"hidden\" id=\"state-succes\">Inscription r&eacute;ussi avec succ&egrave;s !</p>";
 			        echo "<p id=\"state-fail\">Compte d&eacute;j&agrave existant !</p>";
 			    }
 			}

		?>
	<script>
		function myFunction() {
		    var x = document.getElementById('register');
		    var y = document.getElementById('connect');

		    var success = document.getElementById('state-succes');
		    var fail = document.getElementById('state-fail');
		    var message = true;

		    if (y.style.display === 'none') {
		        y.style.display = 'inherit';
		        x.style.display = 'none';
            message = false;
		    } else {
		        y.style.display = 'none';
		        x.style.display = 'inherit';
            message = false;
		    }

        // Hide the message once the user click elsewhere
        if (!message) {
          success.style.display = 'none';
          fail.style.display = 'none'
        }
		}

		$(document).ready(function() {
			$(".switch > span").on("click", function() {
				$(this).after(myFunction());
			});
		});
	</script>
	</article>
</section>
<?php
	require_once '../include/footer.inc.php';
?>

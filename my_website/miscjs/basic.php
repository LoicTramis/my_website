<?php
    $file_name = basename(__FILE__);
    $folder_name = basename(__DIR__);
    require_once '../include/header.inc.php';
?>
<section>
  <h2>Premier script JavaScript</h2>
	<article>
        <h3>Alertes</h3>
        <div class="button-js-container">
	        <button class="button-js" onclick="alert('Hello World!');" title="Affiche du texte">Hello World!</button>
            <button class="button-js" onclick="sum()" title="Additionne 4 et 6">Somme de 2 nombres</button>
        	<button class="button-js" onclick="get_type()" title="Vrai">Type de variables</button>
        	<button class="button-js" onclick="get_name()" title="Votre nom">Entrez votre pseudo</button>
        	<button class="button-js" onclick="convert()" title="Additionne 2 nombres">Additionner 2 nombres</button>
        </div>
        <script>
    		function sum() {
                var a = 4;
                var b = 6;
                var sum = a + b;

                alert(sum);
             }

             function get_type() {
               var a = true;

               alert(typeof a);
             }

             function get_name() {
               var username = prompt('Quel est votre pseudonyme ?');

               alert("Bienvenue " + username + " !");
             }

             function convert() {
               var a = prompt("Premier nombre");
               var b = prompt("Deuxi\u00e8me nombre");
               var sum = parseInt(a) + parseInt(b);

               alert("La somme de " + a + " et " + b + " est " + sum);
             }
        </script>
	</article>
	<article>
		<h3>Conditions</h3>
		<div class="button-js-container">
			<button class="button-js" onclick="get_age()" title="Fonction prompt">&Acirc;ge l&eacute;gal</button>
			<button class="button-js" onclick="get_confirmation()" title="Fonction confirm">Autorisation</button>
			<button class="button-js" onclick="choose()" title="Fonction parseInt">S&eacute;lection</button>
			<button class="button-js" onclick="is_legal()" title="Fonction confirm dans un ternaire">Majorit&eacute;</button>
			<button class="button-js" onclick="display_age_group()">Tranche d'&acirc;ge</button>
		</div>

        <script>
             function get_age() {
               var age = prompt('Quel est votre \u00e2ge');

               if (age > 0 && age < 18) {
                 alert('Vous \u00eates mineur.');
               } else if (age >= 18) {
                 alert('Vous \u00eates majeur.');
               } else {
                 alert('Entrez un \u00e2ge valide.');
               }
             }

             function get_confirmation() {
               if (confirm("Autorisez-vous le site \u00e0 lire vos donn\u00e9es personnelles")) {
                alert('Vous avez autoris\u00e9.');
              } else {
                alert('Vous avez refus\u00e9.');
              }
             }
             function choose() {
               var choice = parseInt(prompt('Choisissez un film Avengers entre 1 et 4'));

               switch (choice) {
                 case 1:
                  alert('Marvel\'s The Avengers est sorti en 2012.');
                 break;
                 case 2:
                  alert('Avengers: Age of Ulton est sorti en 2015.');
                 break;
                 case 3:
                  alert('Avengers: Infinity War sortira en 2018.');
                 break;
                 case 4:
                  alert('Avengers 4 est pr\u00e9vu pour 2019.');
                 break;
                 default:
                  alert('Aucun autre film Avengers est pr\u00e9vu pour le moment.');
                 break;
               }
             }

             function is_legal() {
               alert("Votre cat\u00e9gorie : " + (confirm("\u00cates-vous majeur ?") ? "+18" : "-18"));
             }

             function display_age_group() {
               var age = parseInt(prompt('Quel est votre \u00e2ge ?'));

               if (age <= 0) {
                 alert('Oh vraiment... Pas tr\u00e8s cr\u00e9dible. :P');
               } else if (age >= 1 && age <= 17) {
                 alert('Vous n\'\u00eates pas encore majeur.');
               } else if (age >= 18 && age <= 49) {
                 alert('Vous \u00eates majeur mais pas encore s\u00e9nior.');
               } else if (age >= 50 && age <= 59) {
                 alert('Vous \u00eates s\u00e9nior mais pas encore retrait\u00e9.');
               } else if (age >= 60 && age <= 120) {
                 alert('Vous \u00eates retrait\u00e9, profitez de votre temps libre.');
               } else if (age > 120) {
                 alert(age + ' ans ? C\'est possible !?')
               } else {
                 alert('\u00c2ge non valide.');
               }
             }
    	</script>
	</article>

	<article>
		<h3>Boucles</h3>
		<div class="button-js-container">
			<button class="button-js" onclick="display_10()" title="10 alertes">Boucle WHILE</button>
			<button class="button-js" onclick="enter_names()" title="Entrez des noms">Boucle DO WHILE</button>
			<button class="button-js" onclick="sum_10()" title="Somme de 1 &agrave; 100">Boucle FOR</button>
			<button class="button-js" onclick="generate_code()" title="Liste HTML">Code HTML</button>

		</div>
		<script>
			function display_10() {
			  var index = 1;

              alert("Affiche 10 alertes.")

                while (index <= 10) {
                  alert(index);
                  index++;
                }
        			}

              function enter_names() {
                var validation;
                do {
                  validation = prompt("Saisissez autant de nom de super-h\u00e9ros. (Annuler pour sortir)");
                } while (validation);
              }

              function sum_10() {
                var sum = 0;

                for (var index = 1; index <= 100; index++) {
                  sum += index;
                }
                alert("Somme des 100 premiers chiffres : " + sum);
              }

              function generate_code() {
                var html_code = "<li>\n";
                var field;

                while (field = prompt("Saisissez les \u00e9l\u00e9ments de la liste :")) {
                  html_code += "\t<ul>" + field + "</ul>\n";
                }

                if (html_code == "<li>\n") {
                  html_code = "Liste vide !";
                } else {
                  html_code = "La liste HTML : \n" + html_code + "</li>";
                }

                alert(html_code);
              }
		</script>
	</article>

	<article>
		<h3>Jeu</h3>
		<div class="button-js-container">
			<button class="button-js" onclick="more_or_less()" title="Devinez le nombre">Plus ou moins</button>
		</div>

		<script>
      function nb_aleatoire(min, max) {
        var nb = min + (max-min+1)*Math.random();

        return Math.floor(nb);
      }

      function more_or_less() {
        var random = nb_aleatoire(1, 100);
        var number = 0;
        var time = 1;

        number = prompt("Trouvez le nombre entre 1 et 100 :");

        while (number != random && number) {
          if (parseInt(number)) {
            if (number < random) {
              number = prompt("Derni\u00e8re saisie : " + number + ". Tentative : " + time + ".\nTrop petit.");
              time++;
            } else {
              number = prompt("Derni\u00e8re saisie : " + number + ". Tentative : " + time + ".\nTrop grand.");
              time++;
            }
            if (!number) {
              alert("Vous avez abandonn\u00e9s au bout de " + time + " fois. :(");
              break;
            }
          } else {
            number = prompt("Ce n'est pas un nombre ! R\u00e9essayez !");
          }
        }

        if (number == random) {
          alert("F\u00e9licitations ! Vous avez gagn\u00e9s en " + time + " fois !");
        }
      }
		</script>
	</article>

	<article>
		<h3>Tableaux</h3>
		<div class="button-js-container">
			<button class="button-js" onclick="get_tab_value()">Valeur d'un tableau</button>
			<button class="button-js" onclick="get_tab_length()">Longueur d'un tableau</button>
			<button class="button-js" onclick="sort_tab()">Trier un tableau</button>
			<button class="button-js" onclick="display_tab()">Afficher un tableau</button>
			<button class="button-js" onclick="display_2d_tab()">Tableau 2D</button>
		</div>

    	<script>
    		function get_tab_value() {
          var avengers = new Array("Thor","Hulk","Iron Man","Black Panther");
          avengers[4] = "Vision";

          alert("Le 4\u00e8me avengers est " + avengers[3]);
        }

        function get_tab_length() {
          var black_order = new Array("Thanos", "Corvus Glaive", "Proxima Midnight", "Ebony Maw", "Cull Obsidian");

          alert("La longueur du tableau : " + black_order.length);
        }

        function sort_tab() {
          var infinity_stones = new Array("Reality Stone", "Power Stone", "Mind Stone", "Space Stone", "Time Stone", "Soul Stone");

          alert("Tableau tri\u00e9 : " + infinity_stones.sort());
        }

        function display_tab() {
          var cosmic_entities = new Array("Entropy", "Eternity", "Infinity", "Death", "Oblivion", "Living Tribunal");
          var content = "Les entit\u00e9s cosmiques :\n";

          for(var indice in cosmic_entities) {
            content += indice + " - " + cosmic_entities[indice] + "\n";
          }

          alert(content);
        }

        function display_2d_tab() {
          var content = "Le tableau 2D :\n";
          var times_table = new Array();
          var x, y;

          for (var index = 0; index < 10; index++) {
            times_table[index] = new Array();
          }

          for (var i = 0; i < 10; i++) {
            for (var j = 0; j < 10; j++) {
              times_table[i][j] = i * j;
            }
          }
          x = prompt("Choisissez la position (x):");
          y = prompt("Choisissez la position (y):");

          alert(x + " multipli\u00e9 par " + y + " est \u00e9gal \u00e0 " + times_table[x][y]);
        }
    	</script>
	</article>

	<article>
		<h3>Fonction avec arguments</h3>
		<div class="button-js-container">
			<button class="button-js" onclick="add_numbers()" title="5 + 17">Additionner</button>
			<button class="button-js" onclick="alert(add(5, 17, 23))" title="5 + 17 + 23">Additionne 3 nombres</button>
			<button class="button-js" onclick="alert(add(5, 17, 23, 46, 57))" title="5 + 17 + 23 + 46 + 57">Additionne 5 nombres</button>
		</div>
	</article>

	<script>
		function add() {
		  var sum = 0;
      var numbers = add.arguments;

      for (var index = 0; index < numbers.length; index++) {
        sum += numbers[index];
      }

      return sum;
		}

    function add_numbers() {
      var numbers = new Array();
      var number = true;
      var index = 0;

      while (number) {
        number = parseInt(prompt("Addition autant de nombres que vous voulez."))
        if (number) {
          numbers[index] = number;
          index++;
        }
      }

      alert("La somme est " + add.apply(this, numbers));  // allow array in function parameter
    }
	</script>
</section>

<?php
    require_once '../include/footer.inc.php';
?>

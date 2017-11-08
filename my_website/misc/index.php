<?php
    $file_name = basename(__FILE__);
    $folder_name = basename(__DIR__);

    require_once '../include/header.inc.php';
?>
        <section style="background: linear-gradient(#55a6f6, #ecb3ff); color: white;">
        	<h2>Hors Programme</h2>
        	<article>
        		<h3>En d&eacute;veloppement</h3>
        		<div style="margin-top: 50px; text-align: center;">
        			<p>Langages Web</p>
        			<a class="button-misc" href="../miscjs/index.php"><i class="fa fa-slideshare"></i>Javascript</a>
            		<a class="button-misc" href="history.php"><i class="fa fa-google"></i>Angular JS</a>
            		<a class="button-misc" href="visitor.php"><i class="fa fa-leaf"></i>Node JS</a>
        		</div>
        		<div style="margin-top: 50px; text-align: center;">
        			<p>Calendrier, Historique &amp; M&eacute;t&eacute;o</p>
        			<a class="button-misc" href="calendar.php"><i class="fa fa-calendar"></i>Calendrier</a>
            		<a class="button-misc" href="history.php"><i class="fa fa-history"></i>Historique</a>
            		<a class="button-misc" href="visitor.php"><i class="fa fa-users"></i>Visiteurs</a>
            		<a class="button-misc" href="weather.php"><i class="fa fa-sun-o"></i>M&eacute;t&eacute;o</a>
        		</div>	
        	</article>
		</section>
<?php
	require_once '../include/footer.inc.php';
?>
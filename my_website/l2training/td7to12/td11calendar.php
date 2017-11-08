<?php
	$file_name = basename(__FILE__);
	require_once '../include/header.inc.php';
	require_once '../include/calendar_fonctions.inc.php';
?>
	<section style="width: 1000px; background-color: white;">
		<h2 class="hidden">Kurzgesagt Calendar</h2>
		<article>
			<h3 class="hidden">12,000 years ago</h3>
			<p>Around 12,000 years ago the world's first temple was built. It consists of multiple installations with
			monumental stone pillars, each weighing up to 40 tons.</p>
			<p>It is not known how a hunter-gatherer society managed to move and erect them without sophisticated tools.</p>
			
		</article>
		
		<article class="leftpart">
			<h3 class="hidden">Years &amp; months</h3>
			<?php 
				asideCalendar();
			?>
		</article>
		
		<article class="rightpart">
			<h3 class="hidden">Calendrier</h3>
			<?php
				calendar();
			?>
		
		</article>
	</section>
<?php
	require_once '../include/footer.inc.php';
?>

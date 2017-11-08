<?php
	$file_name = basename(__FILE__);
	$folder_name = basename(__DIR__);
	
	require_once '../include/header.inc.php';
	require_once '../include/calendar_fonctions.inc.php';
	
	$month = CURRENT_MONTH;
	$year = CURRENT_YEAR;
?>
	<section style="
				background-color: white;
				left: 50%;
				margin: 0;
				margin-top: 50px;
				position: relative;
				top: 50%;
				transform: translate(-50%);
				width: 1000px;
				">
		<h2 class="hidden">Kurzgesagt Calendar</h2>
		<article>
			<h3 class="hidden">12,000 years ago</h3>
			<div class="lefttext">
				<p>Around 12,000 years ago the world's first temple was built. It consists of multiple installations with
				monumental stone pillars, each weighing up to 40 tons.</p>
			</div>
			<div class="righttext">
				<p>It is not known how a hunter-gatherer society managed to move and erect them without sophisticated tools.</p>
			</div>
			
			<div class="yearbar">
				<form id="form" name="form" method="post" target="formfill" action="calendar.php" >
					<span class="before">Year 0</span>
					<span class="after">Year 12,000</span>
			        <input 	id="month"
			        		class="input-range"
			        		type="range"
			        		value="<?php echo $month; ?>"
			        		min="1"
			        		max="12"
			        		oninput="showhide(this.value)"
			        		onchange="showhide(this.value)">
			  	    <span style="position: absolute;">
			  	    	Year	<span class="previous-value"><?php echo $month - 1; ?></span>
			  	    	-		 <span id="myValue" class="range-value"><?php echo $month; ?></span>
			  	    </span>
				</form>
			</div>
			<button onclick="today()">Today</button>
			<?php 
				for ($index = 1; $index <= 12; $index++) {
					echo "	<div id=\"$index\" style=\"display: none;\">
								<div class=\"leftpart\">";
					asideCalendar($index, $year);
					echo "		</div>\n
								<div class=\"rightpart\">";
					calendar($index, $year);
					echo "		</div>
							</div>\n";
				}
			?>

			<script type="text/javascript">			
				/* --- jQuery --- */
				var range = $('.input-range'); // jQuery object
				var previous = $('.previous-value'); // jQuery object
				var value = $('.range-value'); // jQuery object

				var myRange = document.querySelector('.input-range');
				var myValue = document.querySelector('.range-value');
				var myUnits = ',000';
				var off = myRange.offsetWidth / (parseInt(myRange.max) - parseInt(myRange.min));
				var px =  ((myRange.valueAsNumber - parseInt(myRange.min)) * off) - (myValue.offsetParent.offsetWidth);
				
				
				previous.html(range.attr('value') - 1 + ",000"); // get the value of '.input-range' in the first '.previous-value' element
				value.html(range.attr('value') + ",000"); // get the value of '.input-range' in the first '.rage-range' element
				
				myValue.parentElement.style.left = px + 'px';
				myValue.parentElement.style.top = '180px';
				myValue.innerHTML = myRange.value + ' ' + myUnits;
				    
				// Attach an event handler function on the input element.
				range.on('input', function() {
					value.html(this.value + ",000"); // display the value of the first '.range-value'
					previous.html(this.value); // display the value of the first '.previous-value'
					if (this.value == 1) {
						$('.previous-value').html(parseInt($('.previous-value').html()) - 1); // decrement the value of '.previous-value'						
					} else {
						$('.previous-value').html(parseInt($('.previous-value').html()) - 1  + ",000"); // decrement the value of '.previous-value'
					}
					
					let px = (((myRange.valueAsNumber - parseInt(myRange.min)) * off) - (myValue.offsetWidth));
			    	myValue.parentElement.style.left = px + 'px';
				});
				
				/* --- JavaScript --- */
				var date = new Date();
				var current_month = date.getMonth() + 1;
				var input_month = document.getElementById("month");
				var current_calendar = document.getElementById(<?php echo $month;?>);

				
				if (current_month == input_month.value) {
					current_calendar.style.display = 'block';
				}
				/**
				 * Display one month.
				 */
				function showhide(value){
			        var i;
			        for (i = 1; i <= 12; i++) {
						if(value == i){
			        		document.getElementById(value).style.display = "block";
			        	} else {
			        		document.getElementById(i).style.display = "none";
			        	}
			        }
				}

				/**
				 * Display the current month
				 */
				function today() {
					document.getElementById("month").value = <?php echo $month;?>;
					showhide(<?php echo $month;?>);
				}
			</script>
		</article>
	</section>
<?php
	require_once '../include/footer.inc.php';
?>
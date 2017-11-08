<?php
	require_once '../../../jpgraph/src/jpgraph.php';
	require_once '../../../jpgraph/src/jpgraph_bar.php';
	
	
	require_once '../include/fonctions.inc.php';
	
	$fruit_names = get_vitamin_c_fruit_names(TRUE);
	$fruit_values = get_vitamin_c_fruit_names(FALSE);
	$total_fruits = count($fruit_names);
	
	$max_length_word = get_max_word($fruit_names);
	
	$datay = $fruit_values;
	
	// Size of graph
	$width = get_max_value($fruit_values);
	$height = $total_fruits* 28 + 4;
	
	// Set the basic parameters of the graph
	$graph = new Graph($width,$height);
	$graph->SetScale('textlin');
	
	$top = 40;
	$bottom = 5; // So we can see the line
	$left = $max_length_word * 6; // dynamic adjust
	$right = 5;
	$graph->Set90AndMargin($left,$right,$top,$bottom);
	
	// Nice shadow
	$graph->SetShadow();
	
	// Setup labels
	$graph->xaxis->SetTickLabels($fruit_names);
	
	// Label align for X-axis
	$graph->xaxis->SetLabelAlign('right','center','right');
	
	// Label align for Y-axis
	$graph->yaxis->SetLabelAlign('center','bottom');
	
	// Titles
	$graph->title->Set('Teneur en vitamine C (mg/100g)');
	
	$bar_plot = new BarPlot($datay);
	$graph->Add($bar_plot);
	
	$colors = array();
	$fill_colors = array();
	
	// get the fill and stroke colors
	for ($index = 0; $index < $total_fruits; $index++) {
		array_push($colors, utf8_decode(get_fruit_color($fruit_names[$index], TRUE, FALSE)));
		array_push($fill_colors, utf8_decode(get_fruit_color($fruit_names[$index], FALSE, FALSE)));
	}	
	// Setup the bar plots
	$bar_plot->value->Show(); // display the value on the right of the bar plot
	$bar_plot->value->SetFormat("%d"); // decimal format
	$bar_plot->SetColor($colors); // the stroke color
	$bar_plot->SetFillColor($fill_colors); // the fill color
// 	$bplot->SetFillGradient('#FFAAAA:0.7', '#FFAAAA:1.2', GRAD_HOR);
	$bar_plot->SetWidth(0.7);
	
	$graph->Stroke();
?>
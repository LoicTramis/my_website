<?php
	require_once '../include/fonctions.inc.php';
	require_once '../jpgraph/src/jpgraph.php';
	require_once '../jpgraph/src/jpgraph_bar.php';
	
	// Numerical sort
	if (isset($_GET["sort"]) && $_GET["sort"] == "TRUE") {
		$eta_per_academy = display_all_academies($_GET["sort"]);
	// Alphabetical sort
	} else {
		$eta_per_academy = display_all_academies(FALSE);
	}
	$datax= array();
	$datay= array();
	
	foreach ($eta_per_academy as $key => $value) {
		array_push($datay, $value);
		array_push($datax, $key);
	}
	
	// Size of graph
	$width = max($eta_per_academy) * 2;
	$height = count($eta_per_academy) * 40;
	
	// Create the graph. These two calls are always required
	$graph = new Graph($width,$height,'auto');
	$graph->SetScale('textlin');
	$graph->graph_theme = null;
	$graph->SetFrame(false);
	
	$graph->img->SetMargin(10,10,10,10);
// 	$graph->legend->SetFont(FF_ARIAL,FS_NORMAL, 10);
	
	// Adjust the margin a bit to make more room for titles
	$top = 60;
	$bottom = 30;
	$left = 200;
	$right = 30;
	$graph->Set90AndMargin($left,$right,$top,$bottom);
	$graph->xgrid->Show(true,true);
	// Add a drop shadow
	$graph->SetShadow();
	
	$graph->yaxis->SetTickPositions(array(0, 100, 200, 300, 400, 500));
	
	// Setup labels
	$graph->xaxis->SetTickLabels($datax);
	// Label align for X-axis
	$graph->xaxis->SetLabelAlign('right','center');
	$graph->xaxis->SetLabelMargin(15);
	
	// Label align for Y-axis
	$graph->yaxis->SetLabelAlign('center','bottom');
	// Some extra margin looks nicer
	$graph->xaxis->SetLabelMargin(10);
	
	
	// Create a bar pot
	$bplot = new BarPlot($datay);
	$graph->Add($bplot);
	
	$bplot->SetWidth(20);
	// Adjust colors
	$bplot->SetFillColor(array('#db7070','#dba670','#dbdb70','#a6db70','#70db70','#70dba6','#70dbc1','#70c1db','#708bdb','#8b70db','#c170db','#db70c1','#db709b'));
	$bplot->SetColor(array('#fb5050','#fba650','#fbfb50','#a6fb50','#50fb50','#50fba6','#50fbfb','#50a6fb','#5050fb','#a650fb','#fb50fb','#fb50a6','#fb507b'));
	// Values of bar graph
	$bplot->value->Show();
	//$bplot->value->SetFont(FF_ARIAL,FS_BOLD,12);
	$bplot->value->SetColor("black","darkred");
	$bplot->value->SetFormat('%d ');
	
	// Setup the titles
	$graph->title->Set("Nombre d'�tablissement par acad�mie");
	// Display the graph
	$graph->Stroke();
?>
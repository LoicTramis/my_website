<?php
include '../jpgraph/src/jpgraph.php';
include '../jpgraph/src/jpgraph_pie.php';

/**
 * 
 * @param String $criterion the name of the file
 * @param number $val - the value of one element
 * @param number $total - the value of all elements
 * @param String $category - the 
 */
function pie_plot($criterion, $val, $total, $category){
	$data= array($val, $total);
	// Création du graph Pie. Ce dernier peut être mise en cache  avec PieGraph(300,300,"SomCacheFileName")
	$graph = new PieGraph(400, 300);
	$graph->SetShadow();
	
	// Application d'un titre au camembert
	$graph->title->Set("Etablissements d'enseignement supérieur en France");
	$graph->title->SetFont(FF_FONT1, FS_BOLD);
	
	// Création du graphe
	$p1 = new PiePlot($data);
	$p1->SetLegends(array("Autres" ,$criterion));
	$graph->Add($p1);
	@unlink("image.png");
	
	// .. Création effective du fichier
	switch ($category) {
		case "region":
			$img = "../img/graph/region/".utf8_decode($criterion).".png";
			break;
		case "academy":
			$img = "../img/graph/academy/".utf8_decode($criterion).".png";
			break;
		case "city":
			$img = "../img/graph/city/".utf8_decode($criterion).".png";
			break;
		case "type":
			$img = "../img/graph/type/".utf8_decode($criterion).".png";
			break;
		default:
			$img = "../img/graph/".utf8_decode($criterion).".png";;
		break;
	}	
	if (!file_exists($img)) {
		$graph->Stroke($img);
	}
}
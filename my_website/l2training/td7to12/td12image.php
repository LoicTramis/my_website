<?php

	require_once '../include/fonctions.inc.php';
	
	$fruit_names = get_vitamin_c_fruit_names(TRUE);
	$fruit_values = get_vitamin_c_fruit_names(FALSE);
	$total_fruits = count($fruit_names);
	
	$width = get_max_value($fruit_values) * 1.2;
	$height = $total_fruits* 28 + 4;
	$max_length_word = get_max_word($fruit_names);
	
	$image = imagecreate($width, $height);
	$background_color = imagecolorallocate($image, 255, 255, 255);
	$black = imagecolorallocate($image, 80, 80, 80);
	
	// Vertical line
	imageline($image, $max_length_word * 8, 0, $max_length_word * 8, ($total_fruits * 26) + 4, $black);
	// Horizontal line
	imageline($image, $max_length_word * 8, ($total_fruits* 26) + 4, $width - $max_length_word, ($total_fruits* 26) + 4, $black);
	// Subtitle
	imagestring($image, 3, $width / 2, $total_fruits * 27, "Teneur en vitamine C (mg/100g)", $black);
	
	for ($index = 0; $index < $total_fruits; $index++) {
		$amount = ceil(get_vitamin_c_amount_by_fruit($fruit_names[$index]));
		$colors_fill = get_fruit_color(utf8_decode($fruit_names[$index]),TRUE, TRUE);
		$colors_stroke = get_fruit_color(utf8_decode($fruit_names[$index]),FALSE, TRUE);
		
		$color_stroke = imagecolorallocate($image, $colors_stroke[0], $colors_stroke[1], $colors_stroke[2]);
		$color_fill = imagecolorallocate($image, $colors_fill[0], $colors_fill[1], $colors_fill[2]);
		imagestring($image, 4, 5, ($index * 26) + 7, utf8_decode($fruit_names[$index]), $black);
		imagestring($image, 4, ($max_length_word * 8) + $amount + 10, ($index * 26) + 8, $amount, $black);
		
		imagerectangle($image, $max_length_word * 8 + 6, $index * 26 + 4, ($max_length_word * 8 + 6) + $amount,  $index * 26 + 4 + 20, $color_stroke);
		imagefilledrectangle($image, $max_length_word * 8 + 7, $index * 26 + 5, ($max_length_word * 8 + 5) + $amount,  $index * 26 + 3 + 20, $color_fill);		
	}
	
	header('Content-type: image/png'); // Tell the browser we want to display a PNG image
	
	imagecolortransparent($image, $background_color);
	imagepng($image);
	imagepng($image, "../img/vitamin_c_graph.png"); // Can we do that?
	imagedestroy($image);
?>
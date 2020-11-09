<?php
	header ("Content-type: image/jpeg"); // L'image que l'on va créer est un jpeg
	// On charge d'abord les images
	$source = imagecreatefrompng("Dossier/copyrightlogo.png"); // Le logo est la source
	$destination = imagecreatefromjpeg($_GET['image']); // La photo est la destination


	// Les fonctions imagesx et imagesy renvoient la largeur et la hauteur d'une image
	$largeur_source = imagesx($source);
	$hauteur_source = imagesy($source);
	$largeur_destination = imagesx($destination);
	$hauteur_destination = imagesy($destination);
	$largeur_format= $largeur_destination *0.3;
	$hauteur_format = $hauteur_destination * 0.2;

	$format = imagecreatetruecolor($largeur_format,$hauteur_format); //10% de la taille de l'image de destination

	// on format l'image à la bonne taille
	imagecopyresampled($format, $source, 0, 0, 0, 0, $largeur_format, $hauteur_format, $largeur_source, $hauteur_source);
	//imagejpeg($format);


	// On veut placer le logo en bas à droite, on calcule les coordonnées où on doit placer le logo sur la photo
	$destination_x = $largeur_destination - $largeur_format;
	$destination_y =  $hauteur_destination - $hauteur_format;
	// On met le logo (source) dans l'image de destination (la photo)
	imagecopymerge($destination, $format, $destination_x, $destination_y, 0, 0, $largeur_format, $hauteur_format, 60);

	// On affiche l'image de destination qui a été fusionnée avec le logo
	imagejpeg($destination);
	//imagejpeg($format, "miniVercors.jpg");
?>
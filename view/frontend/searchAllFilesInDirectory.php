<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css"/>
        <title>MonSiteWeb</title>
        <script type="text/javascript" src="fonctions.js"></script>
    </head>

	<div id="galerie">
    	<ul id="galerie_mini">
<?php
	//Get big and small images for the image gallery in a repository. Display small images and one big image and the title.
  	$nombreImages = 0;
	if ($handle = opendir('public/displayPictures/Images') AND $handleMini = opendir('public/displayPictures/miniImages')) {
		while(false !== $entry = readdir($handle)) 
		{
			$entryMini = str_replace('.resized.jpg', 'mini.resized.jpg', $entry);
			$entryTab[] = $entry;
	        if ($entry != "." && $entry != ".." && strpos($entry,'.jpg')!=false) 
	        {
	        	echo '<li>
      				<a href="public/displayPictures/Images/' . $entry . '" title='. str_replace('.resized.jpg','',$entry).'><img src="public/displayPictures/miniImages/'. $entryMini . '" alt='. str_replace('.resized.jpg','',$entry).'/></a></li>';
	        }
	    }
	    closedir($handle);
	}
	echo'
			</ul>

  	<dl id="photo">
    	<dt>' .str_replace('.resized.jpg','',$entryTab[0]). '</dt>
    	<dd><img id="big_pict" src="public/displayPictures/Images/'. $entryTab[0] .'" alt="Photo 1 en taille normale" /></dd>
  	</dl>
	</div>
	'
?>

</html>
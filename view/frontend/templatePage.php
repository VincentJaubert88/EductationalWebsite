<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="public/css/style.css" />
    <title><?= $title ?></title>
    <script type="text/javascript" src="public/js/fonctions.js"></script>
</head>

<body>
<header>
<div id="grid-wrapper">
	<h1>
		<figure>
			<img src="public/images/responsive-1166833_640.png" class=flottant width="100" height="120px"/>
		</figure>
		<?= $title ?>
	</h1>
</div>
</header>


<div id="bloc_page">
	<nav>
		<ul>
			<li><a href="index.php" title="Accueil")>Accueil<img src="public/images/house-309113_640.png" class=flottantNav width="25" height="30px"/></li>
			<li><a href="view/frontend/MonCV.php" title="Mon CV" target="_blank">CV</a></li>
			<li><a href="https://www.linkedin.com/in/vincent-jaubert-6625303a/" target="_blank">MyLinkedin</a></li>
	        <li><a href="index.php?action=guestBook"  title="Livre d'or">Livre d'or</a></li>
	    </ul>
	</nav><br/>

			<?= $content ?>

	</div>
<footer>
<div id="grid-wrapper">
	<h4>Contact:</h4>
	<p>
		Prénom: Vincent<br/>
		Nom: Jaubert
	</p> 
	Mail: <a href="mailto:jaubert_v@live.fr">jaubert_v@live.fr</a><br />
	<br/>

</div>
</footer>
</body>

</html>
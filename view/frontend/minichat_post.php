<?php
	
	echo $_POST['Nom'] . ' ' . $_POST['Message'];

	$bdd = new PDO('mysql:host=localhost;dbname=myWebSite;charset=utf8','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));


	//$bdd->exec('INSERT INTO LivreDOr(Nom,Message) VALUES(\'Vincent\', \'Le site marche\')');

	$req = $bdd->prepare('INSERT INTO guestBook(Name, Message, dateMessage) VALUES(:Name, :Message, NOW())');
	$req->execute(array(
		'Name'=>$_POST['Name'],
		'Message'=>$_POST['Message']
	));

	/*
	$req = $bdd->prepare('SELECT * FROM jeux_video WHERE :possesseur=:possesseur AND prix<:prixmax ORDER BY prix DESC');
	$req->execute(array('possesseur' => $_GET['possesseur'], 'prixmax' => $_GET['prixmax']));
	// , 'nombrearticlemax' => $_GET['nombrearticlemax'] LIMIT 0,:nombrearticlemax'$reponse = $bdd->query('SELECT * FROM jeux_video WHERE possesseur=\'Patrick\' AND prix<20 ORDER BY prix DESC LIMIT 0,3');

	// On affiche chaque entrée une à une
	while ($donnees = $req->fetch())
	{
	?>
	    <p>
	    <strong>Jeu</strong> : <?php echo $donnees['nom']; ?><br />
	    Le possesseur de ce jeu est : <?php echo $donnees['possesseur']; ?>, et il le vend à <?php echo $donnees['prix']; ?> euros !<br />
	    Ce jeu fonctionne sur <?php echo $donnees['console']; ?> et on peut y jouer à <?php echo $donnees['nbre_joueurs_max']; ?> au maximum<br />
	    <?php echo $donnees['possesseur']; ?> a laissé ces commentaires sur <?php echo $donnees['nom']; ?> : <em><?php echo $donnees['commentaires']; ?></em>
	   </p>
	<?php
	}

	$req->closeCursor(); // Termine le traitement de la requête
	
	$nom = 'WarcraftIII';
	$possesseur = 'Vincent';
	$console = 'PC';
	$prix = 15;
	$nbre_joueurs_max = 8;
	$commentaires = 'Un classique de la stratégie';

	$reqSend = $bdd->prepare('INSERT INTO jeux_video(nom, possesseur, console, prix, nbre_joueurs_max, commentaires) VALUES(:nom, :possesseur, :console, :prix, :nbre_joueurs_max, :commentaires)');
	//$bdd->exec('INSERT INTO jeux_video(nom, possesseur, console, prix, nbre_joueurs_max, commentaires) VALUES(\'Battlefield 1942\', \'Patrick\', \'PC\', 45, 50, \'2nde guerre mondiale\')');
	$reqSend->execute(array(
		'nom'=>$nom,
		'possesseur' => $possesseur,
		'console' => $console,
		'prix' => $prix,
		'nbre_joueurs_max' => $nbre_joueurs_max,
		'commentaires' => $commentaires));
	*/	


	header('Location: index.php');
?>
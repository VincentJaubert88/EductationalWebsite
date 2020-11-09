<?php $title = 'Livre d\'Or' ?>

<?php ob_start(); ?>
<h2> Les 5 derniers messages </h2>
<table>
	<?php
		echo '<tr><td><h3>Nom</h3></td><td><h3>Date</h3></td><td><h3>Message</h3></td></tr>';

		while($donnees = $req->fetch())
		{
			echo '<tr><td>' . $donnees['Name'] . '</td> . <td>' . $donnees['dateMessageFr'] . '</td><td>' .  $donnees['Message'] . '</td></tr>';
		}
	?>
</table>

<h2>Votre message</h2>
<form method="post" name="minichat_post" action="view/frontend/minichat_post.php">
		<p>
			<input type="text" name = "Nom" id="Name" maxLength = "255" placeholder="Nom"> </br>
			<input type="text" name = "Message" id="Message" maxLength = "255" placeholder="Message"> </br>
			<input type="submit" value="Envoyer"/>
		</p>
</form>
<?php $content = ob_get_clean(); ?>

<?= require('view/frontend/templatePage.php'); ?>
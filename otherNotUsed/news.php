<?php

require('model.php');

if(isset($_GET['postId']))
{
	$post = getPostNews($_GET['postId']);
	$comments = getComments($_GET['postId']);
	require('newsView.pĥp');
}
else
{
	echo 'Erreur: Aucun identifiant de billet envoyé';
}

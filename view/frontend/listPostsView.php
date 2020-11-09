<?php $title = 'Site de Vincent Jaubert'; ?>

<?php ob_start(); ?>

<div id="conteneur2">
   	<div class="element2">
    	<h2>Introduction</h2>
    	<p> 
    		Bonjour à tous et bienvenu sur mon site,<br/>
            Je m'appelle Vincent Jaubert, je suis ingénieur et passionné d'informatique. Au cours de mon parcours professionnel, j'ai eu l'occation de travailler sur des IHM, sur des bases de données SQL et des applications de backend industrielles complexes. J'adore les nouvelles technologies et très curieux des moyens de télécommunication en tout genre. Mon rêve serait de travailler dans le web ou la cybersécurité. Pour cela j'ai énormément travailler mes compétences sur des sites de formation comme openclassroomm (web) et tryhackme.com (cyber). <br/>
            En vous souhaitant une bonne visite du site.<br/>
            Vincent Jaubert, propriétaire et développeur du site.
        </p>
    		<p class="mobile">
    			Vous êtes sur la version mobile du site
    		</p>
    	</p>
    </div>
</div>
<br/>

<h2>News</h2>
<?php

while($response = $posts->fetch())
{
?>
<h3>
	<?= htmlspecialchars($response['title']) ?>
	<?= 'le ' . htmlspecialchars($response['dateMessageFr']) ?>
</h3>
<p>
	<?= htmlspecialchars($response['content']) ?> <br/>
	
	<a href= "index.php?action=post&amp;postId=<?php echo htmlspecialchars(strval($response['id'])); ?>"> Commentaires</a> 
</p>
<?php
}
$posts->closeCursor();
?>

<?php
	echo '<h2> Gallerie d\'images </h2>';
	include("view/frontend/searchAllFilesInDirectory.php");
?>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/templatePage.php'); ?>
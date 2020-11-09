<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css"/>
        <title>MonSiteWeb</title>
        <script type="text/javascript" src="fonctions.js"></script>
    </head>
    <body>
    	<div id="bloc_page">
<!-- -->
			<?php include("header.php"); ?>

			<?php include("menu.php"); ?>
            <?php

            if(isset($_POST['pseudo']) AND isset($_POST['passwd']) AND isset($_POST['passwdVerif']) AND isset($_POST['email']))
            {
                try
                {
                    $bdd = new PDO('mysql:host=localhost;dbname=myWebSite;charset=utf8','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                }
                catch(exception $e)
                {
                    die('Erreur : ' . $e->getMessage());
                }
                $reponse = $bdd->prepare('SELECT * FROM membres');
                $reponse->execute();

                $pseudo = htmlspecialchars($_POST['pseudo']);
                $passwd = password_hash($_POST['passwd'], PASSWORD_DEFAULT);
                $passwdVerif = password_hash($_POST['passwdVerif'], PASSWORD_DEFAULT);
                $email = htmlspecialchars($_POST['email']);
                $groupe_id = 1;

                echo $_POST['passwd'] . " " . $_POST['passwdVerif'];

                while ($donnees = $reponse->fetch())
                {
                    if($donnees['pseudo'] == $pseudo)
                    {
                        $erreur = 1;
                        $msgErreur = "Pseudo déjà existant";
                        break;
                    }
                    else if($donnees['email'] == $email)
                    {
                        $erreur = 1;
                        $msgErreur = "Email déjà existant";
                        break;
                    }
                    else if($passwdVerif != $passwd)
                    {
                        $erreur = 1;
                        $msgErreur = "La vérification du mot de passe est différente du mot de passe";
                        break;
                    }
                }
                if($erreur==0)
                {
                    $requete = $bdd->prepare('INSERT INTO membres(pseudo, passwd, email, date_inscription, groupe_id) VALUES(:pseudo, :passwd, :email, NOW()),:groupe_id');
                    $requete->execute(array(
                        'pseudo'=>$pseudo,
                        'passwd'=>$passwd,
                        'email'=>$email,
                        'groupe_id'=>$groupe_id));
                }
            }
            else
                echo "Veuillez entrer votre pseudo";
            ?>

            <h2>Inscription au site</h2>
            <form name ="f" method="post" action="inscription.php" onsubmit = "return verifierTout()" >
                <p>
                    <fieldset>
                        <label for="pseudo">Pseudo </label>
                        <input type="text" name="pseudo" id="pseudo" required onBlur =verifierPseudo(this) /></br>
                        <label for="password">Mot de passe</label>
                        <input type="password" name="passwd" id="passwd" required onBlur =verifierMotDePasse(this)/></br>
                        <label for="passwdVerif">Vérification du mot de passe:</label>
                        <input type="password" name="passwdVerif" id="passwdVerif" required onBlur =verifierMotDePasse(this)/></br>
                        <label for="email">Email</label>
                        <input type="email" name="email" required onBlur = verifierEmail(this) /></br></br>
                        <!-- autre type: tel, number (min= max= step=), url, range, color, date, search, checkbox (checked), radio (une valeur parmi plusieurs), select  (liste déroulante) -->
                        <!--option : autofocus-->
                        <input type="submit" value="Envoyer"/>
                    </fieldset>
                </p>
            </form>

            <?php 
                if(isset($erreur) AND $erreur != 0)
                    echo '<p class="error">' . $msgErreur . '</p>' 
            ?>

            <?php include("footer.php"); ?>

            </body>
</html>
<?php
//This is the router
require('controller/frontend.php');
try
{
    if (isset($_GET['action'])) 
    {
        if ($_GET['action'] == 'listPosts') 
        {
            listPosts();
        }
        elseif ($_GET['action'] == 'post') 
        {
            if (isset($_GET['postId']) && $_GET['postId'] > 0) 
            {
                post();
            }
            else 
            {
                throw new Exception('Erreur : aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['postId']) && $_GET['postId'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment']))
                {
                    addComment($_GET['postId'], $_POST['author'], $_POST['comment']);
                }
                else 
                {
                    throw new Exception('Erreur : tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Erreur : aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'guestBook')
        {
            guestBook();
        }
    }
    else {
        listPosts();
    }  
}
catch(Exception $e)
{
    $error = $e->getMessage();

    require('view/frontend/errorView.php');
}
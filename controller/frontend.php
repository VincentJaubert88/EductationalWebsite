<?php
//Get classes
require_once('model/frontend/PostManager.php');
require_once('model/frontend/CommentManager.php');


function listPosts()
{
	$postManager = new \site\model\PostManager();
	$posts = $postManager->getPostsNews();

	require('view/frontend/listPostsView.php');
}

function post()
{
	$postManager = new \site\model\PostManager();
	$commentManager = new \site\model\CommentManager();

	if(isset($_GET['postId']))
	{
		$post = $postManager->getPostnews($_GET['postId']);
		$comments = $commentManager->getComments($_GET['postId']);
		require('view/frontend/postView.pĥp');
	}
	else
	{
		throw new Exception('Erreur: Aucun identifiant de billet envoyé');
	}
}

function guestBook()
{
	$postManager = new \site\model\PostManager();
	$req = $PostManager->getPostsGuestBook();

	require('view/frontend/guestBookView.php');
}

function addComment($postId, $author, $comment)
{
    $commentManager = new \site\model\CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&postId=' . $postId);
    }
}
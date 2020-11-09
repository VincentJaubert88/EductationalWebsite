<?php

namespace site\model;

require_once("model/frontend/Manager.php");

class PostManager extends Manager
{
	public function getPostsGuestBook()
	{
		$bdd = $this->dbConnect();

		$req = $bdd->prepare('SELECT Name, Message, DATE_FORMAT(dateMessage, "%d/%m/%Y %Hh%imin%ss") AS dateMessageFr FROM guestBook ORDER BY dateMessage DESC LIMIT 0,5');
		$req->execute();

		return $req;
	}
	public function getPostsNews()
	{
		$bdd = $this->dbConnect();

		$req = $bdd->prepare('SELECT id, title, content, DATE_FORMAT(dateMessage, "%d/%m/%Y \à %Hh%imin%ss") AS dateMessageFr FROM news ORDER BY dateMessage DESC');
		$req->execute();

		return $req;
	}

	public function getPostNews($postId)
	{
		$bdd = $this->dbConnect();

		$req = $bdd->prepare('SELECT id, title, content, DATE_FORMAT(dateMessage, "%d/%m/%Y \à %Hh%imin%ss") AS dateMessageFr FROM news where id = ?');
		$req->execute(array($postId));
		$post = $req->fetch();

		return $post;
	}

}
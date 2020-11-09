<?php

namespace site\model;

require_once('model/frontend/Manager.php');

class CommentManager extends Manager
{
	public function getComments($postId)
	{
		$bdd = $this->dbConnect();

		$req = $bdd->prepare('SELECT id, postId, author, comment, dateComment, DATE_FORMAT(dateComment, "%d/%m/%Y %Hh%imin%ss") AS dateMessageFr FROM comments where postId = ?');
		$req->execute(array($postId));

		return $req;
	}

	public function postComment($postId, $author, $comment)
	{
	    $db = $this->dbConnect();
	    $comments = $db->prepare('INSERT INTO comments(postId, author, comment, dateComment) VALUES(?, ?, ?, NOW())');
	    $affectedLines = $comments->execute(array($postId, $author, $comment));

	    return $affectedLines;
	}
}
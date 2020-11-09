<?php
	
	require('model.php');

	$req = getPostsGuestBook();

	require('guestBookView.php');
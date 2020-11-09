<?php
	// get php CV from Vincent Jaubert
	header('Content-Type: application/pdf');

	header('Content-Disposition: attachment; filename="CV/CV_Vincent_JAUBERT_Informatique_CyberSécurité_versionHtm_copy.pdf"');

	readfile('CV/CV_Vincent_JAUBERT_Informatique_CyberSécurité_versionHtm.pdf');

?>
<?php



Autoloader::directories(array(
	path('bundle').'scribe/classes',
));


Autoloader::map(array(
	'Scribe_User' 		=> path('bundle').'scribe/models/scribe_user.php',
	'Scribe_Content' 	=> path('bundle').'scribe/models/scribe_content.php',
));

<?php
	// ***** Database Connection ***** //

	// LOCAL DATABASE
	define ("DB_NAME", "schema");
	define ("DB_HOST", "localhost");
	define ("DB_USER", "root");
	define ("DB_PASSWD", "root");

	//Establish a database connection 
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWD, DB_NAME);
	if (!$conn){
		die('Could not Connect: ' . mysqli_connect_error());
	}

	// ***** Global Vars ***** //
	define ("SITEROOT","http://localhost:8888/schemas/");
	define ("APP_TITLE","JK Studiolab | Schemas"); // title of the app
	define ("ADMIN_NAME","admin");
	define ("ADMIN_PASSWD","");
	?>
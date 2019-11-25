<?php 
function createTables(){
	include('../config.php');
	// Create Organizations Table
	$organizations = "CREATE TABLE Organization(
		id INT(11) AUTO_INCREMENT PRIMARY KEY,
		actionableFeedbackPolicy TEXT,
		address VARCHAR(250),
		aggregateRating INT(11),
		company VARCHAR(150),
		alumni TEXT,
		areaServed TEXT,
		award VARCHAR(250),
		brand INT(11),
		contactPoint INT(11),
		correctionsPolicy VARCHAR(250),
		#correctionsPolicy INT(11),
		department INT(11),
		dissolutionDate DATETIME,
		diversityPolicy VARCHAR(250),
		#diversityPolicy INT(11),
		diversityStaffingReport VARCHAR(250),
		#diversityStaffingReport INT(11),
		duns VARCHAR(150),
		email VARCHAR(150),
		employee INT(11),
		ethicsPolicy VARCHAR(250),
		#ethicsPolicy INT(11),
		event  INT(11),
		faxNumber VARCHAR(150),
		founder INT(11),
		foundedDate DATETIME,
		foundingLocation INT(11),
		funder INT(11),
		globalLocationNumber INT(13),
		hasCredential TEXT,
		hasOfferCatalog TEXT,
		hasPOS TEXT,
		hasProductReturnPolicy VARCHAR(250),
		#hasProductReturnPolicy INT(11),
		isicV4 VARCHAR(100),
		knowsAbout TEXT,
		knowsLanguage TEXT,
		


		power SET('0','1'),
		recordCreated DATETIME,
		timestamp TIMESTAMP
		)";
	$conn->query($users);

	mysqli_close($conn);
	header('Location:../admin/');
}

// ****** DEBUG Table Setup ******* //
/*
if(mysqli_query($conn, $questions)){
		echo "Questions table created.";
	}
	else{
		echo "Error creating Questions table: " . mysqli_error($conn);
	}
*/
?>
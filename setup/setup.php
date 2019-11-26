<?php 
function createTables(){
	include('../config.php');
	// Create Thing Table
	// Ref: https://schema.org/Thing
	$thing = "CREATE TABLE Thing(
		id INT(11) AUTO_INCREMENT PRIMARY KEY,
		
				)";
	$conn->query($thing);
	// Create Organization Table
	// Ref: https://schema.org/Organization
	$organization = "CREATE TABLE Organization(
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
		funder TEXT,
		globalLocationNumber INT(13),
		hasCredential TEXT,
		hasOfferCatalog TEXT,
		hasPOS TEXT,
		hasProductReturnPolicy VARCHAR(250),
		#hasProductReturnPolicy INT(11),
		isicV4 VARCHAR(100),
		knowsAbout TEXT,
		knowsLanguage TEXT,
		legalName VARCHAR(250),
		leiCode VARCHAR(250),
		location TEXT,
		logo VARCHAR(250),
		makesOffer TEXT,
		member TEXT,
		memberOf TEXT,
		naics VARCHAR(250),
		numberOfEmployees INT(11),
		ownershipFundingInfo VARCHAR(250),
		#ownershipFundingInfo INT(11),
		publishingPrinciples VARCHAR(250),
		#publishingPrinciples INT(11),
		seeks TEXT,
		slogan VARCHAR(250),
		sponsor TEXT,
		subOrganization TEXT,
		taxID VARCHAR(250),
		telephone VARCHAR(30),
		unnamedSourcesPolicy VARCHAR(250),
		#unnamedSourcesPolicy INT(11),
		vatID VARCHAR(250),
		power SET('0','1'),
		recordCreated DATETIME,
		recordModified DATETIME,
		timestamp TIMESTAMP
		)";
	$conn->query($organization);

	// Create Person Table
	// Ref: https://schema.org/Person
	$person = "CREATE TABLE Person(
		id INT(11) AUTO_INCREMENT PRIMARY KEY,
		additionalName VARCHAR(250),
		address VARCHAR(250),
		affiliation TEXT,
		alumniOf TEXT,
		award VARCHAR(250),
		birthDate DATETIME,
		birthPlace INT(11),
		brand TEXT,
		callSign VARCHAR(250),
		children TEXT,
		colleague TEXT,
		contactPoint INT(11),
		deathDate DATETIME,
		deathPlace INT(11),
		duns VARCHAR(150),
		email VARCHAR(150),
		familyName VARCHAR(250),
		faxNumber VARCHAR(30),
		follows TEXT,
		funder TEXT,
		gender SET('M','F'),
		givenName VARCHAR(250),
		globalLocationNumber INT(13),
		hasCredential TEXT,
		hasOccupation INT(13),
		hasOfferCatalog TEXT,
		hasPOS TEXT,
		height INT(11),
		homeLocation INT(11),
		honorificPrefix VARCHAR(100),
		honorificSuffix VARCHAR(100),
		isicV4 VARCHAR(100),
		jobTitle VARCHAR(250),
		knows TEXT,
		knowsAbout TEXT,
		knowsLanguage TEXT,
		makesOffer TEXT,
		memberOf TEXT,
		naics VARCHAR(250),
		nationality TEXT,
		netWorth INT(11),
		owns TEXT,
		parent TEXT,
		performerIn TEXT,
		publishingPrinciples VARCHAR(250),
		#publishingPrinciples INT(11),
		relatedTo TEXT,
		seeks TEXT,
		sibling TEXT,
		sponsor TEXT,
		taxID VARCHAR(250),
		telephone VARCHAR(30),
		vatID VARCHAR(250),
		weight INT(11),
		workLocation INT(11),
		worksFor INT(11),
		power SET('0','1'),
		recordCreated DATETIME,
		recordModified DATETIME,
		timestamp TIMESTAMP
		)";
	$conn->query($person);
}

// ****** DEBUG Table Setup ******* //
/*

*/
createTables();
mysqli_close($conn);
#header('Location:../admin/');
?>
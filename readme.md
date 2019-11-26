# Create MySQL tables 
Documentation for creating MySQL tables that correspond to * [Schema.org][schema] structure

## MYSQL

### Best Practices:
* Name Tables with leading capital (e.g. 'Tables' not 'tables')
	* This helps distinguish between Table names and Column (Cell) names
* Column names should be Camelcase for this project, in order to remain consistenet with Schema.org field name conventions
* Tables should be created for each unique schema
* Do not clone, replicate or duplicate fields across tables. Instead use the reference ID from the table record where the field is defined.

### Table Creation:

#### Thing
Every thing is a thing.  
By creating a thing, that thing then has all the opportunity and potential to become anything.  
So the main identifier of any*thing* in this database, is the Thing.id

When a new entity of any type is created, the Thing.id must generated and create a new record in Thing table as well as every other table in the database, where the id for that table matches the Thing.id

Specific notes & information relating to the development of the Thing schema

* **image** is a text url, *alternatively* this can be a numeric id (INT) from the "Image" table/schema (e.g. Image.id)
* **potentialAction** is an array of ids from the "Action" table/schema (e.g. action.id)
* **sameAs** set to a VARCHAR (accepts url). QUESTION: Could this be an array? i.e. Does the sameAs schema accept multiple records?
* **subjectOf** is an array of ids from the "CreativeWork" table/schema (e.g. CreativeWork.id)

#### Organization
Specific notes & information relating to the development of the Organization schema
* **alumni** is an array of ids from the "Person" table/schema (e.g. Person.id)
* **areaServed** is an array of ids from the "Place" table/schema (e.g. Place.id)
* **brand** is a numeric id (INT) from the "Organization" table/schema (e.g. Organization.id) (Self-referencing)
* **correctionsPolicy** is a text url, *alternatively* this can be a numeric id (INT) from the "CreativeWorks" table/schema (e.g. CreativeWork.id)
* **department** is a numeric id (INT) from the "Organization" table/schema (e.g. Organization.id) (Self-referencing)
	* Each department is it's own "Organization". They will need to have a parent organization (parentOrganization) assigned.
* **diversityPolicy** is a text url, *alternatively* this can be a numeric id (INT) from the "CreativeWorks" table/schema (e.g. CreativeWork.id)
* **diversityStaffingReport** is a text url, *alternatively* this can be a numeric id (INT) from the "CreativeWorks" table/schema (e.g. CreativeWork.id)
* **duns** [Dun & Bradstreet DUNS number][duns]
* **employee** is an array of ids from the "Person" table/schema (e.g. Person.id)
* **ethicsPolicy** is a text url, *alternatively* this can be a numeric id (INT) from the "CreativeWorks" table/schema (e.g. CreativeWork.id)
* **event** is an array of ids from the "Event" table/schema (e.g. event.id)
* **founder** is a numeric id from the "Person" table/schema (e.g. Person.id)
* **foundingLocation** is a numeric id from the "Place" table/schema (e.g. Place.id)
* **funder** is an arrays of ids from the following table/schemas:
	* "Thing" (prefix *thing_*)
	* "Person" (prefix *person_*)
	* "Organization" (prefix *organization_*)
* **globalLocationNumber** [Global Location Number (GLN)][gln]
* **hasCredential** is an array of ids from the "EducationalOrganizationalCredential" table/schema (e.g. EducationalOrganizationalCredential.id)
* **hasOfferCatalog** is an array of ids from the "OfferCatalog" table/schema (e.g. OfferCatalog.id)
* **hasPOS** is an array of ids from the "Place" table/schema (e.g. Place.id)
* **hasProductReturnPolicy** is a text url, *alternatively* this can be a numeric id (INT) from the "CreativeWorks" table/schema (e.g. CreativeWork.id)
* **knowsAbout** is an arrays of ids from the following table/schemas:
	* "Thing" (prefix *thing_*)
	* "Person" (prefix *person_*)
	* "Organization" (prefix *organization_*)
	* "Event" (prefix *event_*)
* **knowsLanguage** is an array of ids from the "Language" table/schema (e.g. Language.id)
* **location** is an array of ids from the "Place" table/schema (e.g. Place.id)
* **logo** is a text url, *alternatively* this can be a numeric id (INT) from the "Image" table/schema (e.g. Image.id)
* **makesOffer** is an array of ids from the "Offer" table/schema (e.g. Offer.id)
* **member** is an array of ids from the "Person" table/schema (e.g. Person.id)
* **memberOf** is an array of ids from the "Organization" table/schema (e.g. Organization.id) (Self-referencing)
* **ownershipFundingInfo** is a text url, *alternatively* this can be a numeric id (INT) from the "CreativeWorks" table/schema (e.g. CreativeWork.id)
* **owns** is an array of ids from the "Organization" table/schema (e.g. Organization.id) (Self-referencing)
* **parentOrganization** is a numeric id (INT) from the "Organization" table/schema (e.g. Organization.id) (Self-referencing)
* **publishingPrinciples** is a text url, *alternatively* this can be a numeric id (INT) from the "CreativeWorks" table/schema (e.g. CreativeWork.id)
* **seeks** is an array of ids from the "Demand" table/schema (e.g. Demand.id)
* **sponsor** is an arrays of ids from the following table/schemas:
	* "Thing" (prefix *thing_*)
	* "Person" (prefix *person_*)
	* "Organization" (prefix *organization_*)
* **subOrganization** is an array of ids from the "Organization" table/schema (e.g. Organization.id) (Self-referencing)
* **unnamedSourcesPolicy** is a text url, *alternatively* this can be a numeric id (INT) from the "CreativeWorks" table/schema (e.g. CreativeWork.id)

#### Person
Specific notes & information relating to the development of the Person schema
* **affiliation** is an array of ids from the "Organization" table/schema (e.g. Organization.id)
* **alumniOf** is an array of ids from the "Organization" table/schema (e.g. Organization.id)
* **birthPlace** is a numeric id (INT) from the "Place" table/schema (e.g. Place.id)
* **brand** is an array of ids from the "Organization" table/schema (e.g. Organization.id)
* **children** is an array of ids from the "Person" table/schema (e.g. Person.id) (Self-referencing)
* **colleague** is an array of ids from the "Person" table/schema (e.g. Person.id) (Self-referencing)
* **deathPlace** is a numeric id (INT) from the "Place" table/schema (e.g. Place.id)
* **duns** [Dun & Bradstreet DUNS number][duns]
* **firstName** N/A - Instead use **givenName**
* **follows** is an array of ids from the "Person" table/schema (e.g. Person.id) (Self-referencing)
* **funder** is an arrays of ids from the following table/schemas:
	* "Thing" (prefix *thing_*)
	* "Person" (prefix *person_*)
	* "Organization" (prefix *organization_*)
* **gender** is a SET with currently two options, M (Male) or F (Female)
* **globalLocationNumber** [Global Location Number (GLN)][gln]
* **hasCredential** is an array of ids from the "EducationalOrganizationalCredential" table/schema (e.g. EducationalOrganizationalCredential.id)
* **hasOccupation** is a numeric id (INT) from the "Occupation" table/schema (e.g. Occupation.id)
* **hasOfferCatalog** is an array of ids from the "OfferCatalog" table/schema (e.g. OfferCatalog.id)
* **hasPOS** is an array of ids from the "Place" table/schema (e.g. Place.id)
* **height** is a numeric id (INT) from the "QuantitativeValue" table/schema (e.g. QuantitativeValue.id)
* **homeLocation** is a numeric id (INT) from the "Place" table/schema (e.g. Place.id)
* **jobTitle** is text, *alternatively* this can be a numeric id (INT) from the "DefinedTerm" table/schema (e.g. DefinedTerm.id)
* **knows** is an array of ids from the "Person" table/schema (e.g. Person.id) (Self-referencing)
* **knowsAbout** is an arrays of ids from the following table/schemas:
	* "Thing" (prefix *thing_*)
	* "Person" (prefix *person_*)
	* "Organization" (prefix *organization_*)
	* "Event" (prefix *event_*)
* **knowsLanguage** is an array of ids from the "Language" table/schema (e.g. Language.id)
* **lastName** N/A - Instead use **familyName**
* **makesOffer** is an array of ids from the "Offer" table/schema (e.g. Offer.id)
* **memberOf** is an array of ids from the "Organization" table/schema (e.g. Organization.id)
* **middleName** N/A - Instead use **additionalName**
* **nationality** is an array of ids from the "Country" table/schema (e.g. Country.id)
* **netWorth** is an array of ids from the "MonetaryAmount" table/schema (e.g. MonetaryAmount.id)
* **owns** is an array of ids from the "Product" table/schema (e.g. Product.id)
* **parent** is an array of ids from the "Person" table/schema (e.g. Person.id) (Self-referencing)
* **performerIn** is an array of ids from the "Event" table/schema (e.g. Event.id) 
* **publishingPrinciples** is a text url, *alternatively* this can be a numeric id (INT) from the "CreativeWorks" table/schema (e.g. CreativeWork.id)
* **relatedTo** is an array of ids from the "Person" table/schema (e.g. Person.id) (Self-referencing)
* **seeks** is an array of ids from the "Demand" table/schema (e.g. Demand.id)
* **sibling** is an array of ids from the "Person" table/schema (e.g. Person.id) (Self-referencing)
* **sponsor** is an arrays of ids from the following table/schemas:
	* "Thing" (prefix *thing_*)
	* "Person" (prefix *person_*)
	* "Organization" (prefix *organization_*)
* **spouse** is a numerice id (INT) from the "Person" table/schema (e.g. Person.id) (Self-referencing)
* **weight** is a numeric id (INT) from the "QuantitativeValue" table/schema (e.g. QuantitativeValue.id)
* **workLocation** is a numeric id (INT) from the "Place" table/schema (e.g. Place.id)
* **worksFor** is a numeric id (INT) from the "Organization" table/schema (e.g. Organization.id)

#### Place
Specific notes & information relating to the development of the Place schema
* **additionalProperty** is an array of ids from the "Property/Value" table/schema (e.g. PropertyValue.id)
* **amenityFeature** is an array of ids from the "LocationFeatureSpecification" table/schema (e.g. LocationFeatureSpecification.id)
* **containedInPlace** is a numeric id (INT) from the "Place" table/schema (e.g. Place.id) (Self-referencing)
* **containsPlace** is an array of ids from the "Place" table/schema (e.g. Place.id) (Self-referencing)
* **event** is an array of ids from the "Event" table/schema (e.g. event.id)
* **geo** is a numeric id (INT) from the "GeoCoordinates" table/schema (e.g. GeoCoordinates.id)
* **geoContains** is an array of ids from the "Place" table/schema (e.g. Place.id) (Self-referencing)
* **geoCoveredBy** is an array of ids from the "Place" table/schema (e.g. Place.id) (Self-referencing)
* **geoCovers** is an array of ids from the "Place" table/schema (e.g. Place.id) (Self-referencing)
* **geoCrosses** is an array of ids from the "Place" table/schema (e.g. Place.id) (Self-referencing)
* **geoDisjoint** is an array of ids from the "Place" table/schema (e.g. Place.id) (Self-referencing)
* **geoEquals** is an array of ids from the "Place" table/schema (e.g. Place.id) (Self-referencing)
* **geoIntersects** is an array of ids from the "Place" table/schema (e.g. Place.id) (Self-referencing)
* **geoOverlaps** is an array of ids from the "Place" table/schema (e.g. Place.id) (Self-referencing)
* **geoTouches** is an array of ids from the "Place" table/schema (e.g. Place.id) (Self-referencing)
* **geoWithin** is an array of ids from the "Place" table/schema (e.g. Place.id) (Self-referencing)
* **globalLocationNumber** [Global Location Number (GLN)][gln]
* **openingHoursSpecification** is a numeric id (INT) from the "OpeningHoursSpecification" table/schema (e.g. OpeningHoursSpecification.id)
* **photo** is an array of ids from the "Image" table/schema (e.g. Image.id)
* **review** is an array of ids from the "Review" table/schema (e.g. Review.id)
* **specialOpeningHoursSpecification** is a numeric id (INT) from the "OpeningHoursSpecification" table/schema (e.g. OpeningHoursSpecification.id)

#### CreativeWork
Specific notes & information relating to the development of the CreativeWork schema
* **about** is a numeric id (INT) from the "CreativeWork" table/schema (e.g. CreativeWork.id) (Self-referencing)
* **accessibility[X]** [Accessibility Values][accessibility]


### Populating Content (Programming)

#### Rules:

* When a new entity of any type is created, the Thing.id must be the first entry generated and create a new record in Thing table as well as every other table in the database, where the id for that table matches the Thing.id

#### Guidelines:

#### Suggestions:

#### Similar Fields
Please look carefully at the list to make sure your similar fields aren't already included before adding new list items. These lists are to make it easier for programmers to quickly identify similar fields across tables and make sure the capturing of data is thorough, complete and efficient. 

For example, we don't ever need to ask a user to provide a Name, Given Name and Family Name (which would be confusing). If we are creating a new Person in the system, we need only ask them to provide First Name (givenName) and Last Name (familyName) in distinct fields and from that input we can populate the Thing.name (a compound of the two). A thing name could also possibly be exploded to populate the Person.givenName and Person.familyName but this is not the preferred method.

Person.givenName + Person.familyName -> Populates Thing.name

###### References
* [Accessibility Values][accessibility]
* [Dun & Bradstreet DUNS number][duns]
* [Global Location Number (GLN)][gln]
* [Schema.org][schema]

[schema]: https://schema.org
[duns]: https://www.dnb.com/duns-number.html
[gln]: https://www.gs1.org/standards/id-keys/gln
[accessibility]: https://www.w3.org/wiki/WebSchemas/Accessibility

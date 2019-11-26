# Create MySQL tables 
Documentation for creating MySQL tables that correspond to Schema.org structure

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
By creating a thing, that thing then has all the opportunity to become anything.  
So the main identifier of any*thing* in this database, is the Thing.id

When a new entity of any type is created, the Thing.id must generated and create a new record in Thing table as well as every other table in the database, where the id for that table matches the Thing.id

Specific notes & information relating to the development of the Thing schema

* **image** is a text url, *alternatively* this can be a numeric id (INT) from the "Image" table/schema (e.g. Image.id)

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


### Populating Content

#### Rules:

* When a new entity of any type is created, the Thing.id must generated and create a new record in Thing table as well as every other table in the database, where the id for that table matches the Thing.id

#### Guidelines:
#### Suggestions:

###### References
* [Dun & Bradstreet DUNS number][duns]
* [Global Location Number (GLN)][gln]

[duns]: https://www.dnb.com/duns-number.html
[gln]: https://www.gs1.org/standards/id-keys/gln

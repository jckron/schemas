# Create MySQL tables 
Documentation for creating MySQL tables that correspond to Schema.org structure

MYSQL

## Best Practices:
* Name Tables with leading capital (e.g. 'Tables' not 'tables')
	* This helps distinguish between Table names and Column (Cell) names
* Column names should be Camelcase for this project, in order to remain consistenet with Schema.org field name conventions

### Organization
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

###### References
[duns] : https://www.dnb.com/duns-number.html
# Cogip

## Group exercise

This exercise makes us consolidate our knowledge in PHP, databases, SQL queries and collaborate + use professional development skill using the MVC structure.

The project will be evaluated on :

- [X] use of different URL parameters and filename   
- [X] use of sanitization to avoid SQL injections 
- [X] validation of data so that full-admin doesn’t input whatever 
- [X] construction of a functional relational database 
- [X] use of correct joins in SQL 
- [X] use of aliases in SQL requests
- [ ] implementation of a CRUD to read, add, modify and delete data

we should be able by the end of this challenge

- [ ] crypt password in a database 
- [X] use an MVC structure 
- [X] use a router 
- [ ] setup a session 
- [X] allow access to certain page in regards to permissions 

### Collaborators
[Julien](https://github.com/ggbjulien)
[Kiza](https://github.com/Kiza-coder/) 
[Laly] (https://github.com/lalsdev)

## Database relations

![dbrelations](VIVELACOGIP.jpg)

## The mission

The account team's boss Mister Ranu from the Cogip company needs to have access to a DB which will reference all invoices made in the Cogip company, all contacts linked to the transactions, the company, the type of company which had a transaction with Cogip.

The goal is to create a system for the super user (Ranu) which will have access to all CRUD actions, the normal user (his wife) which will have the possibility to CR actions and another access for the normal user which will only have the access to the R action. 10 Days to make this project. Part of BeCode training in Web Development.

## Preview
### Create
### Read
### Update
### Delete

## Methodology

Day 1:
We decide to give some time to planning the project

- Understanding how MVC works
- Creating the files organisations within our project
- Understanding what we need to make this project happen.
  - the tables needed

Day 2:

- Creating the DB
- Drawing how the tables will relate to each other
- Creating the relations with the DB using foreign keys
- Testing the database and exporting it to share it

Day 3:

- create the header common to all pages
- working on displaying elements from db (companies, contacts)
- prepare the router

Day 4:
- everyone working on their on parts (company, contacts, invoices)
    - SQL queries
    - display elements on the global page
    - display elements on the detailled page
- Merge all work to the development branch (Julien)
- Work on the CRUD (Create and Read) 
    - Start work on Insert page invoices (Kiza)

Day 5:
- DEBUGGING a lot before we could do :
- Insert pages invoices, companies, contacts

Day 6:
- Merge all work to development branch and test
- Sanitize inputs with Regex
- Add tables to DB :
    - access
    - user

Day 7:
- Login page + add super-user to db (Kiza)
- Router organisation : url pages for buttons header(Kiza)
- Header and footer creation (Julien)
- Work on the CRUD (Update) Contact Page (Julien)
- Detail for providers and clients page for company part (Laly)
- Start Welcome Page (Laly)

Day 8:
- Design the pages with Bootstrap
- Looking for ways to deploy the site

Day 9 and 10 :
Trying to finish what we can.
- Permissions
- Deployment

## Tools

- HTML, CSS
- PHP
- PHP myadmin
- SQL 
- PDO method
- Docker
- Figma
- Bootstrap
- Heroku

## Progression
- deletion part
- sessions
- display errors

## Credits
Made in Belgium

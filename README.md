# pineapple

To run this project locally:
1) Run web server using Xampp, similar software or virtual environment.
2) Place the folder on the web server.
3) create database on server with table 'subscriptions' with 4 columns- id (int), email (text), provider (text), date (datetime).
You can also use different table name, but then you have to replace 'subscriptions' on sql queries in files in /classes folder.
4) In /classes/database.class.php change database parameters (host,user,password,database name) if needed.
5) Start using by opening index.php page in url.
6) Open viewSubscriptions.php page to see subscriptions, filter, sort, search and delete them.

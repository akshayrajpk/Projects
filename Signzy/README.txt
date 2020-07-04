Application is built using Express Server and Java Script.

Run npm install to install the dependencies

"npm" start will start the project and run the server.

In index.js change the credentials and db name in Create connection section (From Line 12)

Two tables are required in DB

Table: Session
		email,time (float), filename

Table: Login
		email,name,password

Server runs on port 3000
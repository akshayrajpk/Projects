var express = require('express');
const mysql = require('mysql');
var fs = require('fs');
var path = require('path');
var app = express();


app.use(express.static('UI/Main'))
app.use(express.static('UI'))
app.use(express.json());


// Create connection
const db = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'test'
});

var countCheck;
var uname;
var emaili;

app.get('/', function (req, res) {
    res.sendFile(__dirname + '/UI/Main/login.html');
});

app.get('/landing', function (req, res) {
    res.sendFile(__dirname + '/UI/Main/lander.html');
});

app.get('/videoplayer', function (req, res) {
    res.sendFile(__dirname + '/UI/videoplayer.html');
});

app.get('/time', function (req, res) {
    let sql = `SELECT time FROM session WHERE email = "${emaili}"`;
    let query = db.query(sql, (err, result) => {
        if (err) throw err;
        res.json({ time: result });
        console.log(result);
    });
});

app.get('/sessionsave/:time/:filename', function (req, res) {
    let sql = `INSERT INTO session (email,time,filename) VALUES ("${emaili}",${req.params.time},"${req.params.filename}")`;
    let query = db.query(sql, (err, result) => {
        if (err) console.log(err);
        else res.send("success");
    });
});


app.get('/login/:email/:password', function (req, res) {

    let sql = `SELECT COUNT(email) FROM user WHERE email = "${req.params.email}" AND pass = "${req.params.password}"`;
    let query = db.query(sql, (err, result) => {
        if (err) throw err;
        countCheck = Object.keys(result[0]).map(function (key) {
            return parseInt(result[0][key]);
        });
        console.log(countCheck[0]);
        if (countCheck[0] == 0) {
            console.log("Redirect" + countCheck[0]);
            res.redirect("/");
        }
        else {
            console.log("Redirect" + countCheck[0]);
            res.redirect('/landing');
            // res.sendFile(__dirname + '/UI/Main/lander.html');
        }
    });
});

//returns the name
app.get('/username', function (req, res) {
    res.json({ name: uname[0].name });
});

//returns the name
app.get('/name/:email', function (req, res) {
    emaili = req.params.email;
    console.log(emaili);
    let sql = `SELECT name FROM user WHERE email = "${req.params.email}"`;
    let query = db.query(sql, (err, result) => {
        if (err) throw err;
        uname = result;
    });
});


//Start server at port 3000
var server = app.listen(3000, function () {
    console.log('Server running at http://127.0.0.1:3000/ ');
});
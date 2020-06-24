var express = require('express')
var http = require('http')
const path = require('path')
var cors = require('cors')
var bodyParser = require('body-parser')
var app = express()
var port = process.env.PORT || 3000

app.use(express.static(__dirname + 'dist/angular-todolist'))

app.get('/*', (req, res) => res.sendFile(path.join(__dirname)));

const server = http.createServer(app);
server.listen(port, () => console.log("Running @ 3000"))
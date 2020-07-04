const express = require('express');
const graphqlHTTP = require('express-graphql');
const schema = require('./schema/schema');
const mongoose = require('mongoose');

var cors = require('cors');


const app = express();

app.use(cors({
    origin: 'http://localhost:4000/'
}));

// connect to mlab database
mongoose.connect('mongodb+srv://akshay:LqIMNn4Aa5RluoZo@cluster0-qgz4l.mongodb.net/testdb?retryWrites=true&w=majority', { useNewUrlParser: true, useUnifiedTopology: true })
mongoose.connection.once('open', () => {
    console.log('conneted to database');
});

// bind express with graphql
app.use('/graphql', graphqlHTTP({
    schema,
    graphiql: true
}));

//loads homepage (login)
app.get('/log', function (req, res) {
    res.sendFile('D:/Company Works/Dhiyo/server/UI/login.html');
});

//loads homepage (login)
app.get('/query', function (req, res) {
    fetch(schema, {
        method: 'POST',
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
            query: `
      {
        user(mailid:"ar@gmail.com"){
           mailid
           firstName
           lastName
          password
        }
      }`

        })
    }).then(res => res.json())
        .then(data => {
            console.log(data.data);
        })
    // res.render('login',{language: language});
});

app.listen(4000, () => {
    console.log('now listening for requests on port 4000');
});
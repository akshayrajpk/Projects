const mongoose = require('mongoose');
const Schema = mongoose.Schema;

const userSchema = new Schema({
    _id: String,
    mailid: String,
    firstName: String,
    lastName: String,
    password: String
});

module.exports = mongoose.model('User', userSchema);
const mongoose = require('mongoose');
const Schema = mongoose.Schema;

const fileSchema = new Schema({
    name: String,
    userId: String
});

module.exports = mongoose.model('File', fileSchema);
const graphql = require('graphql');
const User = require('../models/user');
const File = require('../models/files');

const {
    GraphQLObjectType,
    GraphQLString,
    GraphQLSchema,
    GraphQLID,
    GraphQLList,
    GraphQLNonNull

} = graphql;


// var arr = [{ name: "as", id: "1", genre: "wq" }];
// var aur = [{ name: "as", id: "1", genre: "wq", authorId: "1" }];


const UserType = new GraphQLObjectType({
    name: 'User',
    fields: () => ({
        mailid: { type: GraphQLID },
        firstName: { type: GraphQLString },
        lastName: { type: GraphQLString },
        password: { type: GraphQLString },
        files: {
            type: new GraphQLList(FileType),
            resolve(parent, args) {
                return File.find({ userId: parent.id });

            }
        }
    })
});

const FileType = new GraphQLObjectType({
    name: 'File',
    fields: () => ({
        id: { type: GraphQLID },
        name: { type: GraphQLString },
        userId: { type: GraphQLID }
    })
});

const RootQuery = new GraphQLObjectType({
    name: 'RootQueryType',
    fields: {
        user: {
            type: UserType,
            args: { mailid: { type: GraphQLID } },
            resolve(parent, args) {

                return User.findById(args.mailid);

            }
        },
        file: {
            type: FileType,
            args: { id: { type: GraphQLID } },
            resolve(parent, args) {
                return File.findById(args.id);
            }
        }
    }
});


const Mutation = new GraphQLObjectType({
    name: 'Mutation',
    fields: {
        addUser: {
            type: UserType,
            args: {
                mailid: { type: GraphQLID },
                firstName: { type: GraphQLString },
                lastName: { type: GraphQLString },
                password: { type: GraphQLString }
                // age: { type: GraphQLInt }
            },
            resolve(parent, args) {
                let user = new User({
                    _id: args.mailid,
                    mailid: args.mailid,
                    firstName: args.firstName,
                    lastName: args.lastName,
                    password: args.password
                    // age: args.age
                });
                return user.save();
            }
        },
        addFile: {
            type: FileType,
            args: {
                name: { type: new GraphQLNonNull(GraphQLString) },
                userId: { type: new GraphQLNonNull(GraphQLID) }
            },
            resolve(parent, args) {
                let book = new File({
                    name: args.name,
                    userId: args.authorId
                });
                return files.save();
            }
        }
    }
});


module.exports = new GraphQLSchema({
    query: RootQuery,
    mutation: Mutation
});
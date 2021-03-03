var MongoClient = require('mongodb').MongoClient;
var url = "mongodb://localhost:27017/";

db.collection('Shirts').find().toArray(function(err, docs) {
    console.log(JSON.stringify(docs));
})

MongoClient.connect(url, function(err, db) {
    if (err) {
        console.log('Sorry unable to connect to MongoDB Error:', err);
    } else {
        console.log("Connected successfully to server", url);
        var collection = db.collection('Shirts');
  
        console.log("Print persons collection:- ");
  
        collection.find({}).toArray(function(err, shirt) {
            console.log(JSON.stringify(shirt, null, 2));
        });
  
        db.close();
    }
});
# mongodb_CRUD
Hello bro i am develop in CRUD operation with using multiple tools like that 1:- core php (xampp,apache server,php version 7.3.10) 2:- mongodb Database 3:- bootstrap 4 4:- html

Just create mongodb Database follow this all Steps

1: just download mongodb database
   https://www.mongodb.com/download-center/community
   
2: install downloadable setup

3: just download robomongo like that Robo 3T
    https://robomongo.org/download
    
4: create new database
 cmd  "use test_db"
 msg => switched to db test_db

5: cmd "db.createCollection("users")"
  msg  => { "ok" : 1 }
  
6:  show collections like show all tables
    cmd   "show collections"
    msg => users
    
7:  insert data
    cmd  "db.users.insert([{
                "name" : "admin1",
                "email" : "admin1@gmail.com",
                "mobile" : 8218683091.0,
                "city" : "noida"
            },
            {
                "name" : "admin1",
                "email" : "admin1@gmail.com",
                "mobile" : 8218683091.0,
                "city" : "noida"
            },
            {
                "name" : "admin1",
                "email" : "admin1@gmail.com",
                "mobile" : 8218683091.0,
                "city" : "noida"
            }
            ])"
            
  8:  show documents like show datatable
      cmd  "db.users.find();"
      
  9: congratulations process completed successfully
  
  
  

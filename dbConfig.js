const mysql = require('mysql');

// Create connection pool
const pool = mysql.createPool({
    connectionLimit: 10,
    host: 'localhost',
    user: 'root',
    password: 'password',
    database: 'myloginapp_db' // Replace with your database name
});

module.exports = pool;

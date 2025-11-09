const mysql = require("mysql2");

const connection = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "",     // senha em branco
  database: "aeo_db"
});

connection.connect(err => {
  if (err) throw err;
  console.log("✅ Conectado ao MySQL!");
});

module.exports = connection;
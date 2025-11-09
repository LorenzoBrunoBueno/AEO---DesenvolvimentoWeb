// backend/server.js
import express from "express";
import db from "./db.js";

const app = express();
app.use(express.json());

app.listen(3000, () => {
  console.log("🚀 Servidor rodando em http://localhost:3000");
});

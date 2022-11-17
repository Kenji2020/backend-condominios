import express from 'express'
const app = express()
import cors from "cors"
import userroutes from "./routes/userroutes.js"


app.use(cors())
app.use(express.json())
app.use(userroutes)

app.listen(4839, () => console.log('Server running on port 4839'))
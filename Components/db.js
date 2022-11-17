import { createPool } from 'mysql2'
import * as dotenv from 'dotenv'
dotenv.config()
import express from 'express'
export const pool = createPool({
        host: process.env.DB_HOST,
        user: process.env.DB_USERNAME,
        password: process.env.DB_PASSWORD,
        database: process.env.DB_DATABASE,
        port: process.env.DB_PORT,
})


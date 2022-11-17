import { createPool } from 'mysql2'
import * as dotenv from 'dotenv'
dotenv.config()
import express from 'express'
export const pool = createPool({
        host: 'condominios.cifm8lfferqz.us-west-2.rds.amazonaws.com',
        user: 'victorinfluencia',
        password: 'colocolo5631',
        database: 'condominios',
        port: '5463',
        headers: {'User-Agent':'request' }
})

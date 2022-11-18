import { Router } from "express"
import { pool } from "../Components/db.js";

import { getUser, getUsers, deleteUser, editUser, createUser } from "../controllers/controllers.js"

const router = Router()
router.get("/", (req, res) => {
    res.send("Hello World!")
    })
router.get('/users', (req, res) => {
    const promisePool = pool.promise();
    const [result] = promisePool.query(
      "select  * from users where id = ?",
      [req.params.id]
    );
    res.json(result);
    })
router.get('/users/:id', getUser)
router.delete('/users/:id', deleteUser)
router.patch('/users/:id', editUser)
router.put('/users/:id', editUser)
router.post('/users', createUser)

export default router
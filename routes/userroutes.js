import { Router } from "express"

import { getUser, getUsers, deleteUser, editUser, createUser } from "../controllers/controllers.js"
import { pool } from "../Components/db.js";

const router = Router()
router.get('/', (req, res) => {
    res.send('Hello World!')
    })

router.get('/users', (req, res) => {
    try {
        const promisePool = pool.promise();
        const [result] = promisePool.query("select  * from users ");
        res.json(result);
      } catch (error) {
        return res.status(500).json({ message: error.message });
      }
    })
router.get('/users/:id', getUser)
router.delete('/users/:id', deleteUser)
router.patch('/users/:id', editUser)
router.put('/users/:id', editUser)
router.post('/users', createUser)

export default router
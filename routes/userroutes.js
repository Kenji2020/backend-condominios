import { Router } from "express"

import { getUser, getUsers, deleteUser, editUser, createUser, getLogin } from "../controllers/controllers.js"

const router = Router()
router.get("/", (req, res) => {
    res.send("Hello World!")
    })
router.get('/users', getUsers)
router.get('/users/:id', getUser)
router.delete('/users/:id', deleteUser)
router.patch('/users/:id', editUser)
router.put('/users/:id', editUser)
router.post('/users', createUser)
router.get('/users/login', getLogin)

export default router
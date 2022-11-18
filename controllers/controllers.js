import { pool } from "../Components/db.js";
import bcrypt from "bcryptjs";
export const getUsers = async (req, res) => {
  try {
    const promisePool = pool.promise();
    const [result] = await promisePool.query("select  * from users ");
    res.json(result);
  } catch (error) {
    return res.status(500).json({ message: error.message });
  }
};

export const getUser = async (req, res) => {
  try {
    const promisePool = pool.promise();
    console.log(req.params.id);
    const [result] = await promisePool.query(
      "select  * from users where id = ?",
      [req.params.id]
    );
    res.json(result);
  } catch (error) {
    return res.status(500).json({ message: error.message });
  }
};

export const deleteUser = async (req, res) => {
  try {
    const promisePool = pool.promise();
    const [result] = await promisePool.query(
      "delete from users where id = ? ",
      req.params.id
    );
    if (result.affectedRows === 0) {
      res.status(404).json({ message: "id not found" });
    } else {
      res.status(200).json({ message: "delete completed " });
    }
  } catch (error) {
    return res.status(500).json({ error: error.message });
  }
};
export const editUser = async (req, res) => {
  try {
    const promisePool = pool.promise();
    const result = await promisePool.query(
      "update users set ? where id = ?",
      [req.body, req.params.id]
    );
    res.json(result);
  } catch (error) {
    return res.status(500).json({ message: error.message });
  }
};

export const createUser = async (req, res) => {
  try {
    const promisePool = pool.promise();
    //hash password
    const hashedPassword = await bcrypt.hash(req.body.password, 10);

    const { name, email, password, numero} = req.body;
    const result = await promisePool.query(
      "insert into users (name,email, password, numero) values (?,?,?,?)",
      [name, email, hashedPassword, numero]
    );
    res.json(result);
  } catch (error) {
    return res.status(500).json({ message: error.message });
  }
};

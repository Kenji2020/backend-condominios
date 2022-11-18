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
    const result = await promisePool.query("update users set ? where id = ?", [
      req.body,
      req.params.id,
    ]);
    res.json(result);
  } catch (error) {
    return res.status(500).json({ message: error.message });
  }
};

export const cryptPassword = function (password, callback) {
  bcrypt.genSalt(10, function (err, salt) {
    if (err) return callback(err);

    bcrypt.hash(password, salt, function (err, hash) {
      return callback(err, hash);
    });
  });
};

export const comparePassword = function (plainPass, hashword, callback) {
  bcrypt.compare(plainPass, hashword, function (err, isPasswordMatch) {
    return err == null ? callback(null, isPasswordMatch) : callback(err);
  });
};
export const createUser = async (req, res) => {
  try {
    const promisePool = pool.promise();
    //hash password
    const hash = cryptPassword(req.body.password, function (err, hash) {
      if (err) {
        throw err;
      }
      return hash;
    });
   
    const [result] = await promisePool.query("insert into users set ?", [
      req.body.name,
      req.body.email,
      hash,
    ]);
    res.json(result);
  } catch (error) {
    return res.status(500).json({ message: error.message });
  }
};

export const getLogin= async (req,res)=>{
  comparePassword(req.body.password, hash, function (err, isPasswordMatch) {
    if (err) {
      throw err;
    }
    console.log(
      "Password: " +
        req.body.password +
        " Hash: " +
        hash +
        " Match: " +
        isPasswordMatch
    );
  });
}
const express = require('express');
const app = express();
const server = require('http').Server(app);
const io = require('socket.io')(server);

const port = process.env.PORT || 3000;
let users = []


app.get('/', (req, res) => {
    res.send('Hello World!')
})
const addUser = (userId, roomId) => {
        users.push({ userId, roomId })
}
const userLeave = (userName) => {
    return users = users.filter(user => user.userName !== userName)
}

const getRoomUsers = (roomId) => {
    return users.filter(user => user.roomId === roomId)
}
io.on('connection', (socket) => {
    console.log('a user connected');
    socket.on('join-room', ({roomId, userName}) => {
        console.log('user joined room');
        console.log(roomId);
        console.log(userName);
        socket.join(roomId);
        addUser(socket.id, roomId);
        socket.to(roomId).emit('user-connected', userName);
        io.to(roomId).emit('all-users', getRoomUsers(roomId));
        socket.on('disconnect', () => {
            console.log('user disconnected');
            socket.leave(roomId);
            userLeave(userName);
            io.to(roomId).emit('all-users', getRoomUsers(roomId));
        }
        )
    });
})





server.listen(port, () => {
    console.log('Server listening at port %d', port);
    }
);


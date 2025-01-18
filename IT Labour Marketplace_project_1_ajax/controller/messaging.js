// Fetch messages from the server
function fetchMessages() {
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "../controller/getMessages.php", true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            const messages = JSON.parse(xhr.responseText);
            const messagesContainer = document.getElementById("chat-messages");
            messagesContainer.innerHTML = ""; // Clear current messages

            messages.forEach((msg) => {
                const messageDiv = document.createElement("div");
                messageDiv.className = `message ${msg.type}`; // 'sent' or 'received'
                messageDiv.textContent = msg.text;
                messagesContainer.appendChild(messageDiv);
            });

            // Auto-scroll to the latest message
            messagesContainer.scrollTop = messagesContainer.scrollHeight;
        }
    };
    xhr.send();
}

// Send a message to the server
function sendMessage() {
    const messageInput = document.getElementById("message-input");
    const messageText = messageInput.value.trim();

    if (messageText === "") {
        alert("Please type a message.");
        return;
    }

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "../controller/sendMessage.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");

    xhr.onload = function () {
        if (xhr.status === 200) {
            messageInput.value = ""; // Clear the input field
            fetchMessages(); // Refresh messages
        }
    };

    const messageData = { text: messageText, type: "sent" }; // Type is 'sent' for now
    xhr.send(JSON.stringify(messageData));
}

// Load messages initially and every 3 seconds
fetchMessages();
setInterval(fetchMessages, 3000);

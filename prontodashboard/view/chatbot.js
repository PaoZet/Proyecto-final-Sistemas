// Lógica para abrir y cerrar el chatbot
document.getElementById("chatbotOpen").click = function() {
    const chatbotDiv = document.getElementById("chatbot");
    chatbotDiv.style.display = (chatbotDiv.style.display === "none" || chatbotDiv.style.display === "") ? "block" : "none";
};
document.getElementById("closeButton").click = function() {
    const chatbotDiv = document.getElementById("chatbot");
    chatbotDiv.style.display = "none"; // Oculta el chatbot
};

// Función para agregar mensajes al chat
function appendMessage(message) {
    const messagesDiv = document.getElementById('messages');
    messagesDiv.innerHTML += '<div>' + message + '</div>';
    messagesDiv.scrollTop = messagesDiv.scrollHeight; // Desplazar hacia abajo
}

// Mensaje de bienvenida
function showWelcomeMessage() {
    appendMessage('Chatbot: ¡Hola! ¿Cómo calificaría su experiencia?');
}

// Manejar la entrada del usuario
document.getElementById('sendButton').addEventListener('click', function() {
    const message = document.getElementById('userInput').value;
    appendMessage('Usuario: ' + message);
    document.getElementById('userInput').value = ''; // Limpiar campo

    // Aquí puedes agregar más lógica para manejar las respuestas.
    sendResponseToServer(message);
    appendMessage('Chatbot: Gracias por tu respuesta.');
});

// Función para enviar los datos al servidor
function sendResponseToServer(response) {
    fetch('process_response.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ response: response })
    }).then(res => res.json())
      .then(data => console.log(data));
}
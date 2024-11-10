<!--Menu Admin-->
<!-- Dropdown Structure -->
<ul id="menuadmin" class="dropdown-content">
  <li><a href="./settings.php" class="black-text"><i class="material-icons black-text">build</i>Configuracion</a></li>
  <li class="divider"></li>
  <li><a href="../controller/assets/salir.php" class="black-text"><i class="material-icons black-text">exit_to_app</i>Salir</a></li>
</ul>
<!--Menu Admin-->
<!-- Dropdown Structure -->

<a id="nivelUser" class="hide"><?php echo $template_tipo; ?></a>

<!-- NAV -->
<ul id="slide-out" class="sidenav sidenav-fixed">
  <li style="height: auto;">
    <div class="user-view" style="width: 100%;">
      <div class="row center">
        <div class="col s12">
          <img width="50%" src="../docs/iconos/pronto.jpg"> <!-- ingresamos la imagen descargada para el icono de menu-->
        </div>
      </div>
    </div>
  </li>
  <li>
    <div class="user-view" style="padding: 0px 32px 0;">
      <center><a><span class="black-text email"><strong><?php echo $template_nombre ?></strong></span></a></center>
    </div>
  </li>
  <li><a class="subheader">Menu</a></li>
  <li><a id="n1" href="./index.php"><i id="i1" class="material-icons">home</i>Inicio</a></li>
  <li><a id="n2" href="./Dashboard.php"><i id="i2" class="material-icons">dashboard</i>Dashboard</a></li>
  <li><a id="n9" href="./Usuario.php"><i id="i9" class="material-icons">people</i>Usuario</a></li>
  <!--<li><a id="n5" href="./Usuario.php"><i id="i5" class="material-icons">get_app</i>Data</a></li>-->
  <li><a id="n4" href="../controller/assets/salir.php"><i id="i5" class="material-icons">exit_to_app</i>Salir</a>

</ul>
<!-- NAV -->


<script type="text/javascript" charset="utf-8" async>
  let tipoUserV = $("#nivelUser").text();

  if (tipoUserV == "Usuario") {
    $("#n1").remove();
  }
    console.info("Bienvenido a la cosola", tipoUserV);
</script>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style>
        #chatbot {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 20px;
            border: 1px solid 
#ccc;
            background-color: 
white;
            z-index: 1000;
        }
        #chatbox {
            border: 1px solid 
#ccc;
            padding: px;
            width: 295px;
            height: 320px;
            overflow-y: auto;
        }
    </style>
</head>
<body>


    <!-- NAV PRINCIPAL -->
    <nav class="colorP borde7 hoverable" style="width: 97% !important; margin-left: 1.5%; margin-top: 1%; margin-bottom: 25px;">
      <div class="nav-wrapper" style="margin: 25px;">
        <a class="brand-logo" href="#"><i id="ocultarnav" class="material-icons hide-on-med-and-down">fullscreen</i><?php echo (new DateTime())->format('l d \d\e F \d\e\l Y'); ?></a>
        <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            <li><a id="zonaBienvenido" class="truncate">Bienvenido</a></li>
        </ul>
      </div>  
    </nav>
    
      <!-- Botón que simula la burbuja de chat -->
    <button class="chat-button" id="chatbotOpen">Abrir Chatbot</button>
<!-- Chatbot Container -->
<div id="chatbot">
        <div id="chatbox">
            <div id="messages"></div>
        </div>
        <input type="text" id="userInput" placeholder="Escribe tu respuesta..."/>
        <button id="sendButton">Enviar</button>
        <button class="chat-button" id="closeButton">Cerrar Chatbot</button>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        // Lógica para abrir el chatbot
        document.getElementById("chatbotOpen").onclick = function() {
            const chatbotDiv = document.getElementById("chatbot");
            chatbotDiv.style.display = (chatbotDiv.style.display === "none" || chatbotDiv.style.display === "") ? "block" : "none";
            if(chatbotDiv.style.display === "block") {
                showWelcomeMessage();
            }
        };

        // Lógica para abrir el chatbot
        document.getElementById("closeButton").onclick = function() {
            const chatbotDiv = document.getElementById("chatbot");
            chatbotDiv.style.display = (chatbotDiv.style.display === "none" || chatbotDiv.style.display === "") ? "block" : "none";
            if(chatbotDiv.style.display === "block") {
                showWelcomeMessage();
            }
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
        if (message.trim() === "") return; // No enviar mensajes vacíos
        appendMessage('Usuario: ' + message);
        document.getElementById('userInput').value = ''; // Limpiar campo
        appendMessage('Chatbot: Gracias por tu respuesta.');
        sendResponseToServer(message);
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
          .then(data => console.log(data))
          .catch(error => console.error('Error:', error));
    }
</script>
</body>
</html>


<script type="text/javascript" charset="utf-8">
  $("#zonaBienvenido").text("Bienvenido");

  var menunavID = <?php echo $nav ?>;
  if (menunavID == "0") {
    $("#n" + menunavID + "").addClass('animated fadeOut');
    setTimeout(function() {
      $("#n" + menunavID + "").addClass('hide');
    }, 500);
  } else {
    $("#n" + menunavID + "").addClass('fontP');
    $("#i" + menunavID + "").addClass('accentfP');
  }

  $("#ocultarnav").click(function(event) {
    event.preventDefault();
    if ($("#slide-out").hasClass('sidenav-fixed')) {
      $("#ocultarnav").text('fullscreen');
      $("#slide-out").removeClass('sidenav-fixed');
      $("#bodyprin").removeClass('responsivo');
      $('.sidenav').sidenav("close");
      actResponsive();
    } else {
      $("#slide-out").addClass('sidenav-fixed');
      $("#bodyprin").addClass('responsivo');
      $('.sidenav').sidenav("open");
      $("#ocultarnav").text('fullscreen_exit');
      actResponsive();
    }
  });
</script>
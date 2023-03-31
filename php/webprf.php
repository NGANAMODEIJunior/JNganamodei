<html>
    <head>
        <title>Qt Messenger - Client Web</title>

        <script>
            var socket = null;

            function onConnect(isSubscription)
            {
                var username = document.getElementById('pseudoInput').value;
                var password = document.getElementById('passwordInput').value;

                socket = new WebSocket("ws://192.168.64.175:54321");
                socket.onopen = function(event) {
                    socket.send((isSubscription ? "SU" : "AU") + username + ";" + password);
                };

                socket.onmessage = function (event) {
                    if(event.data.startsWith("AU"))
                    {
                        document.getElementById("connectForm").style.display = "none";
                        document.getElementById("chatZone").style.display = "block";
                    }
                    else if(event.data.startsWith("MS"))
                    {
                        var messageData = event.data.substring(2);
                        var pseudo = messageData.split(';')[0];
                        var date = messageData.split(';')[1];
                        var message = messageData.substring(pseudo.length + date.length + 2);
                        
                        var textZone = document.getElementById("textZoneContainer");
                        textZone.innerHTML += '<div class="message">' + pseudo + ' (' + date + ') : ' + message + '</div>';
                        textZone.scrollTop = textZone.scrollHeight;
                    }
                };

                socket.onclose = function(event) {
                    document.getElementById("connectForm").style.display = "flex";
                    document.getElementById("chatZone").style.display = "none";
                };
            }

            function onSendMessage()
            {
                var input = document.getElementById('messageInput');
                if(input.value.length > 0)
                {
                    socket.send("MS" + input.value);
                    input.value = "";
                }
            }

            function onMessageTyped(input)
            {
                if(event.key === 'Enter') {
                    onSendMessage();
                }
            }
        </script>


        <style>
            body
            {
                margin: 0 auto;
                background-color: #1E1E1E;
                font: 1.2em "Fira Sans", sans-serif;
                color:#777777;
            }
            
            #appContainer
            {
                margin: 10 auto;
                min-width: 300px;
                max-width: 1200px;
                border: thick double;
                border-color: #777777;
                border-width: 5px;
                border-radius: 5px;
                height: calc(100vh - 20);
                box-sizing: border-box;
                background-color: #252526;
            }

            #header
            {
                font-size: 2em;
                font-weight: bold;
                text-align: center;
                color: #bbbbbb;
            }

            #chatZone
            {
                padding: 10px;
                display: none;
            }

            #textZoneContainer
            {
                height: calc(100vh - 135px);
                border: solid #777777 1px;
                border-radius: 5px;
                padding: 5px;
                overflow-y: auto;
                color: #bbbbbb;
            }

            input[type=text], input[type=password]
            {
                width: 100%;
                background-color: #252526;
                border-radius: 5px;
                border: solid #777777 1px;
                height: 23px;
                color: #bbbbbb;
            }

            input[type=button]
            {
                min-width: 80px;
                background-color: #252526;
                border: solid #777777 1px;
                border-radius: 2px;
                height: 23px;
                color: #bbbbbb;
                margin: 0 auto;
            }

            #messageInputContainer
            {
                width: 100%;
                margin-top: 5px;
                display: inline-flex;
                column-gap: 5px;
            }

            #connectForm
            {
                margin: 20 auto 20 auto;
                max-width: 200px;
                display: flex;
                flex-direction: column;
                row-gap: 5px;
            }

            #connectButtonContainer
            {
                display: flex;
            }

            #connectButton
            {
                margin: 0 auto;
            }
        </style>
    </head>

    <body>
        <div id="appContainer">
            <div id="header">Qt Messenger - Client Web</div>
            
            <div id="connectForm">
                Connexion au chat :
                
                <div id="pseudoInputContainer">
                    <input id="pseudoInput" type="text" placeholder="Pseudo"/>
                </div>
                
                <div id="passwordInputContainer">
                    <input id="passwordInput" type="password" placeholder="Mot de passe"/>
                </div>

                <div id="connectButtonContainer">
                    <input id="connectButton" type="button" value="Connexion" onclick="onConnect(false);"/>
                    <input id="subscribeButton" type="button" value="S'inscrire" onclick="onConnect(true);"/>
                </div>
            </div>

            <div id="chatZone">
                <div id="textZoneContainer">
                                        
                </div>
                <div id="messageInputContainer">
                    <input id="messageInput" type="text" onkeydown="onMessageTyped(this);"/>
                    <input id="sendButton" value="Envoyer" type="button" onclick="onSendMessage();"/>
                </div>
            </div>
        </div>
    </body>
</html>

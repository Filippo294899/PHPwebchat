<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Chat</title>
    <link href="https://fonts.cdnfonts.com/css/minecraft-4" rel="stylesheet">
                
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Chat</h2>
    <div id="container">
        
        <div id="messages"></div>
        <form id="form" method="post" action="send_message.php">
            <input id="input" name="message" autocomplete="off" placeholder="Scrivi un messaggio..." />
        </form>
    </div>

    <script>
    let lastMessageCount = 0; 

    const nickname = localStorage.getItem('nickname');
    
    if (!nickname) {
        alert('Nickname not found, retry to do the login');
        window.location.href = 'login.php';
    }

    document.getElementById('form').addEventListener('submit', function(event) {
        event.preventDefault();
        
        const messageInput = document.getElementById('input');
        const message = messageInput.value.trim();
        
        if (nickname && message) {
            const formData = new FormData(this);
            formData.append('nickname', nickname);
           
            fetch('send_message.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                messageInput.value = '';
                loadMessages(); 
            })
            .catch(error => {
                console.error('Errore durante l\'invio del messaggio:', error);
            });
        } else {
            alert('Inserisci un messaggio e assicurati di essere loggato.');
        }
    });

    function loadMessages() {
        fetch('get_messages.php')
            .then(res => res.text())
            .then(data => {
                const messagesDiv = document.getElementById('messages');
                const previousMessageCount = messagesDiv.children.length; 

                messagesDiv.innerHTML = '';
                data.split('\n').forEach(msg => {
                    if (msg.trim()) {
                        const div = document.createElement('div');
                        div.textContent = msg;
                        messagesDiv.appendChild(div);
                    }
                });

                const newMessageCount = messagesDiv.children.length;

                if (newMessageCount > previousMessageCount) {
                    messagesDiv.scrollTo({ top: messagesDiv.scrollHeight, behavior: 'smooth' });
                }
            })
            .catch(error => {
                console.error('Errore nel caricamento dei messaggi:', error);
            });
    }

    setInterval(loadMessages, 2000); 
    loadMessages(); 
</script>
</body>
</html>

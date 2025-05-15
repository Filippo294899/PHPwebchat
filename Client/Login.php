<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="CSS/Forms.css">

    <script>
 
        function handleLogin(event) {
            event.preventDefault(); 

            const userInput = document.querySelector('input[name="User"]');
            const nickname = userInput.value.trim();

            if (nickname) {

                localStorage.setItem('nickname', nickname);

   
                window.location.href = 'index.php';
            } else {
                alert("Per favore, inserisci un nickname.");
            }
        }

        window.addEventListener('DOMContentLoaded', () => {
            const nickname = localStorage.getItem('nickname');
            if (nickname) {
           
                window.location.href = 'index.php';
            }
        });
    </script>

</head>
<body>
    <div class="Form-Login">
        <form id="Login" method="post" onsubmit="handleLogin(event)">
            <input name="User" autocomplete="off" placeholder="NickName" required />

            <button id="send" name="login" type="submit">Invia</button>
        </form>
    </div>
</body>
</html>

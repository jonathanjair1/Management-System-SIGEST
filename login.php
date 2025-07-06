<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <form action="entrar" method="post">
        <legend>Login</legend>
        <input type="email" id="email" name="email" placeholder="Email">
        <input type="password" id="senha" name="senha" placeholder="Senha">
        <input type="checkbox" onclick="hide()">Show Password
        <script>
            function hide() {
                var x = document.getElementById("eu");
                var y = document.getElementById("eus");
                if (x.type === "password" || y.type === "password") {
                    x.type = "text";
                    y.type = "text";
                } else {
                    x.type = "password";
                    y.type = "password";
                }
            }
        </script>
        <button type="submit">Entrar</button>
        <a href="recuperarSenha.php">Esqueci a palavra-passe</a>
    </form>
</body>

</html>
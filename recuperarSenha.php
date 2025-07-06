<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Recuperação de Senha</title>
</head>

<body>
    <form action="" method="post">
        <legend>Recuperaraçãon de Senha</legend>
        <input type="text" placeholder="Nome de Usuário">
        <input type="email" placeholder="Email">
        <input type="password" id="eu" placeholder="Nova senha">
        <input type="password" id="eus" placeholder="Confirme a nova senha">
        <input type="checkbox" onclick="myFunction()">Show Password
        <script>
            function myFunction() {
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
        <button type="submit">Enviar</button>

    </form>
</body>

</html>
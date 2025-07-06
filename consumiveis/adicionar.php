<?php


/*session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../login.php");
    exit;
}*/

require_once '../conexao/conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome_prod = (string) $_POST['prod'];
    $descricao = (string) $_POST['desc'];
    $fornecedor = (string) $_POST['forn'];
    $data = (string) $_POST['data'];

    $sql = "INSERT INTO consumiveis (producto, descricao, fornecedor, dia) values (?,?,?,?)";
}
?>

<!DOCTYPE html>
<html lang="pt-pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Consumiveis</title>
</head>
<form action="" method="POST">
    <br>
    <div>
        <input type="text" id="prod" name="producto" placeholder="Nome do Producto" required>
        <br><br>
        <input type="text" id="desc" name="descricao" placeholder="Descrição do producto" required>
        <br><br>
        <select name="fornecedores" id="forn">
            <option value="Escolha o Fornecedor"></option>
            <option value="hp">HP</option>
            <option value="dell">Dell</option>

        </select>
        <br><br>
        <label for=""></label>
        <input type="date" id="data" name="data" required>
        <br><br>
        <button type="submit">Guardar</button>
    </div>
</form>

<body>

</body>

</html>

<?php 
$mysqli->close();
?>
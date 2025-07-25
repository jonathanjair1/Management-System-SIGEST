<?php

use function PHPSTORM_META\sql_injection_subst;

session_start();

if (!isset($_SESSION['user'])) {
    header("Location: ../login.php");
}

include "../conexao/conexao.php";

$sql_fornecedores = "SELECT id_fornecedor, nome FROM fornecedor ORDER BY nome ASC";
$result_fornecedores = $conn->query($sql_fornecedores);

$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome_user = (string) $_POST['nome'];
    $producto = (string) $_POST['producto'];
    $quantidade = (int) $_POST['quantidade'];
    $fornecedor = (string) $_POST['fornecedor'];
    $data = (string) $_POST['data'];

    $sql = "INSERT INTO requisicoes (nome_user,producto, quantidade, fornecedor, data_requisicao) values (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Erro ao preparar a query: " . $conn->error);
    }

    $stmt->bind_param("ssiss", $nome_user, $producto, $quantidade, $fornecedor, $data);

    if ($stmt->execute()) {
        $mensagem = "Solicitação enviada com sucesso!";
    } else {
        $mensagem = "Erro ao enviar a solicitação: " . $stmt->error;
        $classe_mensagem = "erro";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitação de Consumiveis</title>
</head>

<body>
    <form action="" method="POST">
        <input type="text" id="nome" name="nome" placeholder="Nome de Usuário" required>
        <br>
        <input type="text" id="producto" name="producto" placeholder="Producto" required>
        <br>
        <input type="text" id="quantidade" name="quantidade" placeholder="Quantidade" required>
        <br>
        <label for="id_fornecedor">Fornecedor:</label>
            <select name="fornecedor" id="fornecedor" required>
                <option value="">Selecione um fornecedor</option>
                <?php while ($fornecedor = $result_fornecedores->fetch_assoc()): ?>
                    <option value="<?= $fornecedor['id_fornecedor'] ?>">
                        <?= htmlspecialchars($fornecedor['nome']) ?>
                    </option>
                <?php endwhile; ?>
            </select>
        <br>
        <input type="date" name="data" id="data" required>
        <br>
        <button type="submit">Enviar</button>

    </form>

    <a href="../menu.php">Voltar ao Menu Principal</a>
</body>

</html>
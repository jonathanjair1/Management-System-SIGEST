<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ../login.php");
    exit;
}

include('../conexao/conexao.php');

$sql = "SELECT * FROM produtos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Consumiveis</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 30px auto;
        }
        th, td {
            border: 1px solid #999;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f0f0f0;
        }
    </style>
</head>

<body>
    <div>
        <h1 style="text-align:center;">Lista de Consumíveis</h1>
        <div style="text-align:center; margin-bottom:20px;">
            <a href="../consumiveis/adicionar.php">Adicionar</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Id Producto</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Data</th>
                    <th>Fornecedor</th>
                    <th>Quantidade</th>
                </tr>
            </thead>

            <tbody>
                <?php if ($result && $result->num_rows > 0) : ?>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                        <tr>
                            <td><?= htmlspecialchars($row["id_producto"] ?? '-') ?></td>
                            <td><?= htmlspecialchars($row["nome"] ?? '-') ?></td>
                            <td><?= htmlspecialchars($row["descricao"] ?? '-') ?></td>
                            <td><?= htmlspecialchars($row["data"] ?? '-') ?></td>
                            <td><?= htmlspecialchars($row["fornecedor"] ?? '-') ?></td>
                            <td><?= htmlspecialchars($row["quantidade"] ?? '-') ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="6">Nenhum produto encontrado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <a href="../menu.php">Voltar para o Menu Principal</a>
</body>

</html>
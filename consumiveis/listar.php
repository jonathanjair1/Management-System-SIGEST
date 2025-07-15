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
</head>

<body>
    <div>
        <h1>Lista de Consumiveis</h1>
        <a href="../consumiveis/adicionar.php">Adicionar</a>
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
                <?php if ($result->num_rows > 0) : ?>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                        
                        <tr>
                            <td><?= htmlspecialchars($row["nome"]) ?></td>
                        </tr>
                        <tr>
                            <td><?= htmlspecialchars($row["descricao"]) ?></td>
                        </tr>
                        <tr>
                            <td><?= $row["data"] ?></td>
                        </tr>
                        <tr>
                            <td><?= htmlspecialchars($row["fornecedor"]) ?></td>
                        </tr>
                        <tr>
                            <td><?= $row["quantidade"] ?></td>
                        </tr>

                    <?php endwhile; ?>
                <?php else : ?>
                    <tr>
                        <td>Nenhum produto encontrdo.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>

</html>
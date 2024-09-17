<?php
session_start();
include_once('./class/Usuario.php');
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.9">
    <link rel="stylesheet" href="./css/global.css">
    <link rel="stylesheet" href="./css/componente.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/lista.css">
    <title>Akademia - Lista</title>
</head>

<body>
    <script src="../assets/js/util.js"></script>
    <?php
        include_once('./components/header.php');
        ?>
    <!-- Seção da lista de usuários -->
    <section class="lista">

        <?php
        $p = new Usuario(); // Criando o objeto da classe Usuário
        $lista = $p->listarUsuario();

        if ($lista !== false) {
            echo "<table>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Data de Nascimento</th>
                    <th>Cidade</th>
                    <th>Ações</th>
                </tr>";

            foreach ($lista as $item) {
                echo "<tr>
                    <td>" . htmlspecialchars($item["nome"]) . "</td>
                    <td>" . htmlspecialchars($item["email"]) . "</td>
                    <td>" . htmlspecialchars($item["dtNascimento"]) . "</td>
                    <td>" . htmlspecialchars($item["cidade"]) . "</td>
                    <td>
                        <a href='deletarUsuario.php?id=" . htmlspecialchars($item["idUsuario"]) . "' onclick=\"return confirm('Tem certeza que deseja excluir este usuário?');\">Excluir</a> | 
                        <a href='EditarUsuario.php?pid=" . htmlspecialchars($item["idUsuario"]) . "'>Editar</a>
                    </td>
                </tr>";
            }

            echo "</table>";
        } else {
            echo "<p>Ocorreu um erro inesperado. Tente novamente mais tarde.</p>";
        }
        ?>
    </section>

    <!-- Footer fixo no final da página -->
    <?php
        include_once('./components/footer.php');
    ?>
</body>

</html>
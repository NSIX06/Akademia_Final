<?php
    include_once('./class/Usuario.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.9">
    <link rel="stylesheet" href="./css/global.css">
    <link rel="stylesheet" href="./css/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700;800;900&family=Roboto:ital,wght@1,500&display=swap"
        rel="stylesheet">

    <title>Akademia - Acessar</title>
</head>

<body>
    <?php
        include_once('./components/header.php');
    ?>

    <main>
        <section class="formulario">

            <div>
                <h2>Área restrita</h2>
                <form method="post" id="formLogin">

                    <label for="email">E-mail:</label>
                    <input type="email" placeholder="Informe seu email" name="email" required>

                    <label for="senha">Senha:</label>
                    <input type="password" placeholder="Informe uma senha com 8 caracteres ou mais" name="senha"
                        required>

                    <?php
                    if (isset($_REQUEST["conectar"])) {
                        $u = new Usuario();

                        if ($u->conectarUsuario($_REQUEST["email"], $_REQUEST["senha"]) == true) {
                            $cookieName = "nome";
                            $cookieValue = $u->getNome();
                            setcookie($cookieName, $cookieValue, time() + 86400, "/");
                            header("Location: acesso.php");               
                        }

                        else {
                            echo "<span class='mensagemErro'>Usuário e/ou senha incorreto(s)</span>"; //redirecionando para outra página
                        }
                    }
                ?>

                    <button type="submit" class="formBotao" name="conectar">Entrar</button>

                    <span>Esqueceu a senha? Clique aqui.</span>
                    <span>Nao tem cadastro? <a href="./cadastrarUsuario.php">Cadastre-se aqui.</a></span>
                </form>
            </div>

            <div class="imagemLogin"></div>
        </section>
    </main>

    <?php
        include_once('./components/footer.php');
    ?>
</body>

</html>
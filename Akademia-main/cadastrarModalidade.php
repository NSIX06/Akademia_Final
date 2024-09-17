<?php
    include_once('./class/Modalidade.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

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

    <title>Akademia - Cadastro de Modalidade</title>
</head>

<body>
    <?php
        include_once('./components/header.php');
    ?>

    <div class="cadastroModalidade">
        <h2>Cadastro de Modalidade</h2>
        <form method="post" id="formModalidade" enctype="multipart/form-data">

            <label for="nome">Nome:</label>
            <input type="text" placeholder="Informe o nome da modalidade" name="nome" required>

            <label for="descricao">Descrição:</label>
            <textarea rows="5" cols="50" id="descricao" placeholder="Informe a descrição da modalidade" name="descricao"
                required></textarea>

            <label for="imagem">Imagem:</label>
            <input type="file" name="imagem" required>

            <div class="botoesModalidade">
                <button type="submit" name="submit">Cadastrar</button>
                <a href="./acesso.php">Voltar</a>
            </div>

            <?php
                if (isset($_POST["submit"])) {

                    // Caminho de upload
                    $target_dir = "assets/upload/";
                    $target_file = $target_dir . basename($_FILES["imagem"]["name"]);
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            
                    // Verifica se é uma imagem real
                    $check = getimagesize($_FILES["imagem"]["tmp_name"]);
                    if ($check !== false) {
                        $uploadOk = 1;
                    } else {
                        echo "O arquivo não é uma imagem válida.";
                        $uploadOk = 0;
                    }
            
                    // Verifica o tamanho do arquivo (limite de 5MB)
                    if ($_FILES["imagem"]["size"] > 5000000) {
                        echo "Desculpe, o arquivo é muito grande. O limite é 5MB.";
                        $uploadOk = 0;
                    }

                    // Permite apenas determinados formatos de imagem
                    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                        echo "Desculpe, apenas arquivos JPG, JPEG, PNG e GIF são permitidos.";
                        $uploadOk = 0;
                    }
                    
                    $target_dir = "assets/upload/";
                            if (!file_exists($target_dir)) {
                            mkdir($target_dir, 0777, true); // Cria o diretório se ele não existir
                            }

                    // Se tudo estiver ok, tenta fazer o upload do arquivo
                    if ($uploadOk == 1) {
                        if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_file)) {
                            echo "O arquivo foi enviado com sucesso.";
                    
                            $m = new Modalidade();
                            $result = $m->cadastroModalidades($_POST["nome"], $_POST["descricao"], $target_file);
                    
                            if ($result) {
                                echo "<span class='mensagemSucesso'>Modalidade cadastrada com sucesso!</span>";
                            } else {
                                echo "<span class='mensagemErro'>Erro ao cadastrar a modalidade no banco de dados.</span>";
                            }
                        } else {
                            echo "Desculpe, houve um erro ao fazer o upload do arquivo.";
                        }
                    } else {
                        echo "Erro ao enviar o arquivo: Tente novamente.";
                    }
                    
                }
            ?>

        </form>
    </div>

    <?php
        include_once('./components/footer.php');
    ?>
</body>

</html>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.9">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700;800;900&family=Roboto:ital,wght@1,500&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="./css/global.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>Akademia - Modalidades</title>
</head>

<body>
    <?php
        include_once('./components/header.php');
    ?>

    <div class="tela-modalidades">
        <h2>Nossas modalidades</h2>

        <div class="componentesCard">
            <?php
                include_once('./components/card.php')
            ?>
        </div>
    </div>

    <?php
        include_once('./components/footer.php');
    ?>
</body>

</html>
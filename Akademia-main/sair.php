<?php
    if (isset($_COOKIE["nome"])) {
        unset($_COOKIE["nome"]);
        setcookie("nome", -1);
    }

    header("Location: areaRestrita.php");
?>
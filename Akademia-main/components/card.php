<link rel="stylesheet" href="components/components.css">

<?php
    include_once("class/Modalidade.php");
    $modalidade = new Modalidade();

        $lista = $modalidade->listarModalidade();

        if ($lista != 0)
        {
        
            foreach($lista as $i)
            {
                $imagem = $i["imagem"];
                $nome = $i["nome"];
                $descricao = $i["descricao"];
                
                echo "
                <article class='card'>
                    <div class='card-interno'>
                        <img src='$imagem' alt='$nome'>
                        <span>$nome</span> 
                    </div>
                    <div class='card-texto'>
                    <p>$descricao</p>
                    </div>
                </article>
                ";
            }
        }
    ?>
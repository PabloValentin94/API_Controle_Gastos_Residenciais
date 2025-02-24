<?php

    // Função que é automaticamente executada toda vez que um objeto de uma classe é instanciado.

    spl_autoload_register(function(string $class) {

        // Obtendo o caminho completo, desde a raíz, do arquivo da classe especificada.

        $file = BASEDIR . $class . ".class.php";

        // Disponibilizando o arquivo, caso exista, e seus recursos para uso da API.

        if(file_exists($file))
        {

            require $file;

        }

        // Exibindo um aviso na tela, caso o arquivo não exista ou não seja encontrado.

        else
        {

            exit("Arquivo não encontrado! Arquivo especificado: $file");

        }

    });

?>
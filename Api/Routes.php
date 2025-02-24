<?php

    use Api\RoutesManager;

    use Api\Controller\
    {

        PessoaController,
        TransacaoController
        
    };

    // Obtendo a rota acionada pela aplicação C#.

    $route = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

    // Nos casos abaixo, as rotas definidas seguem o mesmo padrão do Laravel.

    $routes_manager = new RoutesManager();

    $routes_manager->Define("POST", "/pessoa/salvar", [PessoaController::class, "Save"]);
    $routes_manager->Define("POST", "/pessoa/deletar", [PessoaController::class, "Erase"]);
    $routes_manager->Define("GET", "/pessoa/listar", [PessoaController::class, "List"]);
    
    $routes_manager->Define("POST", "/transacao/salvar", [TransacaoController::class, "Save"]);
    $routes_manager->Define("GET", "/transacao/listar", [TransacaoController::class, "List"]);

    // Verificando se a rota especificada existe. Vá até o método executado abaixo para mais detalhes.

    $routes_manager->Open($route);

?>
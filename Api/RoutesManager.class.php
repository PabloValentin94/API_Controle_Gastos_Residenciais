<?php

    namespace Api;

    // Classe responsável por definir as rotas da aplicação e verificar se as rotas acionadas existem.

    class RoutesManager
    {

        // Campo que armazena as rotas disponíveis para navegação dentro da aplicação.

        private $routes = [

            "GET" => [],

            "POST" => []

        ];

        // Método que define uma rota da aplicação.

        public function Define(string $type, string $route, array $data) : void
        {

            /*

                O funcionamento da linha abaixo é baseado no Laravel, onde, para cada rota, é atribuído um array que 
                contém a classe e o método que devem ser executados quando ela for acionada.

            */

            $this->routes[$type][$route] = $data;

        }

        // Método responsável por verificar se uma rota da aplicação existe e, se sim, executar os processos necessários.

        public function Open(string $route) : void
        {

            // Obtendo o método de requisição utilizado pelo servidor (GET, POST, DELETE, etc.).

            $request_type = $_SERVER["REQUEST_METHOD"];

            $data = $this->routes[$request_type][$route];

            // Verificando se a rota especificada consta na lista de rotas definidas na aplicação.

            if(isset($data))
            {

                // Executando a classe e o método que foram atribuídos à rota especificada.

                $class = $data[0];

                $method = $data[1];

                $class::$method();

            }

            // Exibindo um aviso na tela, caso a rota especificada não exista ou não seja encontrada.

            else
            {

                exit("A rota especificada não existe.");

            }

        }

    }

?>
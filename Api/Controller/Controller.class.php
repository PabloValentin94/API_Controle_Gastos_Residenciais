<?php

    namespace Api\Controller;

    use \Exception;

    abstract class Controller
    {

        protected static function SendReturnAsJSON(mixed $data) : void
        {

            // Configurações do navegador para que a API funcione.

            header("Access-Control-Allow-Origin: *");
            header("Content-type: application/json; charset=utf-8");
            header("Cache-Control: no-cache, must-revalidate");
            header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
            header("Pragma: public");

            // Disponibilizando, encapsulados em um JSON, os dados retornados pela API.

            exit(json_encode($data));

        }

        protected static function SendExceptionAsJSON(Exception $ex) : void
        {

            // Obtendo os dados da excessão gerada.

            $exception = [

                "message" => $ex->getMessage(),
                "code" => $ex->getCode(),
                "file" => $ex->getFile(),
                "line" => $ex->getLine(),
                "traceAsString" => $ex->getTraceAsString(),
                "previous" => $ex->getPrevious()

            ];

            // Configurações do navegador para que a API funcione.

            header("Access-Control-Allow-Origin: *");
            header("Content-type: application/json; charset=utf-8");
            header("Cache-Control: no-cache, must-revalidate");
            header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
            header("Pragma: public");

            // Definindo manualmente o código da resposta HTTP (404 - Não encontrado.).

            http_response_code(404);

            // Disponibilizando, encapsulada em um JSON, a exceção gerada pela API.

            exit(json_encode($exception));

        }

    }

?>
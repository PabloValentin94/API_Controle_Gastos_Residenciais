<?php

    namespace Api\DAO;

    use \PDO;

    abstract class DAO extends PDO
    {

        // Atributo que mantém salva a conexão como o banco de dados, enquanto o objeto ao qual ela pertencer continuar existindo.

        protected $connection;

        public function __construct()
        {

            $dsn = "mysql:host=" . $_ENV["database"]["host"] . ";dbname=" . $_ENV["database"]["db_name"];

            $user = $_ENV["database"]["user"];

            $password = $_ENV["database"]["password"];

            // Estabelendo uma conexão com o SGBD local através do PDO.

            $this->connection = new PDO($dsn, $user, $password);
            
        }

    }

?>
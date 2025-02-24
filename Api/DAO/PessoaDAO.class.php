<?php

    namespace Api\DAO;

    use Api\Model\PessoaModel;

    class PessoaDAO extends DAO
    {

        // Executando o construtor da classe pai através do construtor da classe filha (Herança.).

        public function __construct()
        {

            parent::__construct();
            
        }

        // Método que insere um registro na tabela.

        public function Insert(PessoaModel $model) : bool
        {

            // Criando a consulta SQL.

            $sql = "INSERT INTO Pessoa(nome, idade) VALUES(?, ?)";

            // Preparando a declaração de envio para a instância do PDO.

            $stmt = $this->connection->prepare($sql);

            // Definindo os valores para os campos especificados na consulta SQL.

            $stmt->bindValue(1, $model->nome);

            $stmt->bindValue(2, $model->idade);

            // Executando a consulta SQL e retornando a saída gerada pelo PDO.

            return $stmt->execute();

        }

        // Método que apaga um registro da tabela.

        public function Delete(int $id) : bool
        {

            // Criando a consulta SQL.

            $sql = "DELETE FROM Pessoa WHERE id = ?";

            // Preparando a declaração de envio para a instância do PDO.

            $stmt = $this->connection->prepare($sql);

            // Definindo o valor para o campo especificado na consulta SQL.

            $stmt->bindValue(1, $id);

            // Executando a consulta SQL e retornando a saída gerada pelo PDO.

            return $stmt->execute();

        }

        // Método que obtém todos os registros da tabela.

        public function Select() : array
        {

            // Criando a consulta SQL.

            $sql = "SELECT * FROM Pessoa ORDER BY nome ASC";

            // Preparando a declaração de envio para a instância do PDO.

            $stmt = $this->connection->prepare($sql);

            // Executando a consulta SQL.

            $stmt->execute();

            /*

                Retornando todos os registros da tabela que atendem aos filtros da consulta SQL, se houver. Ao 
                utilizar o PDO::FETCH_CLASS, para cada registro da tabela retornado pelo PDO, será instanciado um objeto 
                da classe especificada, ao qual ele será associado.

            */

            return $stmt->fetchAll(DAO::FETCH_CLASS, "Api\Model\PessoaModel");

        }

        // Método que retorna um registro em específico da tabela.

        public function Search(int $id) : object | false
        {

            // Criando a consulta SQL.

            $sql = "SELECT * FROM Pessoa WHERE id = ? ORDER BY id ASC";

            // Preparando a declaração de envio para a instância do PDO.

            $stmt = $this->connection->prepare($sql);

            // Definindo o valor para o campo especificado na consulta SQL.

            $stmt->bindValue(1, $id);

            // Executando a consulta SQL.

            $stmt->execute();

            /*

                Retornando o primeiro registro que atender ao filtro da consulta SQL, se houver. O registro retornado 
                será associado a um objeto instanciado da classe especificada.

            */

            return $stmt->fetchObject("Api\Model\PessoaModel");

        }

    }

?>
<?php

    namespace Api\DAO;

    use Api\Model\TransacaoModel;

    class TransacaoDAO extends DAO
    {

        // Executando o construtor da classe pai através do construtor da classe filha (Herança.).

        public function __construct()
        {

            parent::__construct();
            
        }

        // Método que insere um registro na tabela.

        public function Insert(TransacaoModel $model) : bool
        {

            // Criando a consulta SQL.

            $sql = "INSERT INTO Transacao(descricao, valor, tipo, fk_pessoa) VALUES(?, ?, ?, ?)";

            // Preparando a declaração de envio para a instância do PDO.

            $stmt = $this->connection->prepare($sql);

            // Definindo os valores para os campos especificados na consulta SQL.

            $stmt->bindValue(1, $model->descricao);

            $stmt->bindValue(2, $model->valor);

            $stmt->bindValue(3, $model->tipo);

            $stmt->bindValue(4, $model->fk_pessoa);

            // Executando a consulta SQL e retornando a saída gerada pelo PDO.

            return $stmt->execute();

        }

        // Método que obtém todos os registros da tabela.

        public function Select() : array
        {

            // Criando a consulta SQL.

            $sql = "SELECT * FROM Transacao ORDER BY id DESC";

            // Preparando a declaração de envio para a instância do PDO.

            $stmt = $this->connection->prepare($sql);

            // Executando a consulta SQL.

            $stmt->execute();

            /*

                Retornando todos os registros da tabela que atendem aos filtros da consulta SQL, se houver. Ao 
                utilizar o PDO::FETCH_CLASS, para cada registro da tabela retornado pelo PDO, será instanciado um objeto 
                da classe especificada, ao qual ele será associado.

            */

            return $stmt->fetchAll(DAO::FETCH_CLASS, "Api\Model\TransacaoModel");

        }

    }

?>
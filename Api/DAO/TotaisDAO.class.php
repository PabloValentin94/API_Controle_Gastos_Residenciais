<?php

    namespace Api\DAO;

    use Api\Model\TotaisModel;

    class TotaisDAO extends DAO
    {

        // Executando o construtor da classe pai através do construtor da classe filha (Herança.).

        public function __construct()
        {

            parent::__construct();
            
        }

        // Método que calcula o total das despesas, das receitas e do saldo de uma pessoa em específico.

        public function Calculate_Totals(int $fk_pessoa) : object | false
        {

            // Criando a consulta SQL.

            $sql = "SELECT (SELECT SUM(valor) FROM Transacao WHERE tipo = 'Despesa' AND fk_pessoa = ?) AS 'total_despesas', " .
                   "(SELECT SUM(valor) FROM Transacao WHERE tipo = 'Receita' AND fk_pessoa = ?) AS 'total_receitas' FROM Transacao transac " .
                   "WHERE fk_pessoa = ? ORDER BY fk_pessoa ASC;";

            // Preparando a declaração de envio para a instância do PDO.

            $stmt = $this->connection->prepare($sql);

            // Definindo o valores para os campos especificados na consulta SQL.

            $stmt->bindValue(1, $fk_pessoa);

            $stmt->bindValue(2, $fk_pessoa);

            $stmt->bindValue(3, $fk_pessoa);

            // Executando a consulta SQL.

            $stmt->execute();

            /*

                Retornando o primeiro registro que atender ao filtro da consulta SQL, se houver. O registro retornado 
                será associado a um objeto instanciado da classe especificada.

            */

            return $stmt->fetchObject("Api\Model\TotaisModel");

        }

    }

?>
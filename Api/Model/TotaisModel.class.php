<?php

    namespace Api\Model;

    use Api\DAO\TotaisDAO;

    class TotaisModel extends Model
    {

        // Atributos da classe.

        public $total_despesas, $total_receitas, $saldo_total;

        // Método que é executado por um objeto desta classe assim que é instanciado.

        public function __construct()
        {

            $this->total_despesas = ($this->total_despesas === null) ? 0.00 : $this->total_despesas;

            $this->total_receitas = ($this->total_receitas === null) ? 0.00 : $this->total_receitas;

            $this->saldo_total = $this->total_receitas - $this->total_despesas;
            
        }

        // Método que interage com a camada DAO.

        public function List(int $fk_pessoa) : void
        {

            // Instanciando um novo objeto DAO e armazenando o conteúdo retornado pelo PDO no atributo herdado "data".

            $this->data = (new TotaisDAO())->Calculate_Totals($fk_pessoa);

        }

    }

?>
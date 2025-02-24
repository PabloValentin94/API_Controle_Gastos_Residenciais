<?php

    namespace Api\Model;

    use Api\DAO\TransacaoDAO;

    class TransacaoModel extends Model
    {

        // Atributos da classe.

        public $id, $descricao, $valor, $tipo, $fk_pessoa, $pessoa;

        // Método que é executado por um objeto desta classe assim que é instanciado.

        public function __construct(int $id = 0, string $descricao = "", float $valor = 0.00, string $tipo = "", int $fk_pessoa = 0)
        {

            /*

                Se os atributos não estiverem vazios, isso significa que o objeto atual foi retornado pelo PDO e já está 
                preenchido, senão, eles serão definidos com base nos parâmetros do construtor.

            */

            if(empty($this->id))
            {

                $this->id = $id;

                $this->descricao = $descricao;

                $this->valor = $valor;

                $this->tipo = $tipo;

                $this->fk_pessoa = $fk_pessoa;
                
            }

            // Associando a transação com seu criador. Isso só é executado se o atributo ID estiver preenchido.

            else
            {

                $proprietario_transacao = new PessoaModel();

                $proprietario_transacao->List($this->fk_pessoa);

                $this->pessoa = $proprietario_transacao->data;

            }
            
        }

        // Métodos que interagem com a camada DAO.

        public function Save() : bool
        {

            // Instanciando um novo objeto DAO, passando um parâmetro para o método executado e retornando seu resultado.

            return (new TransacaoDAO())->Insert($this);

        }

        public function List() : void
        {

            // Instanciando um novo objeto DAO e armazenando o conteúdo retornado pelo PDO no atributo herdado "data".

            $this->data = (new TransacaoDAO())->Select();

        }

    }

?>
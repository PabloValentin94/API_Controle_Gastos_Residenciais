<?php

    namespace Api\Model;

    use Api\DAO\PessoaDAO;

    class PessoaModel extends Model
    {

        // Atributos da classe.

        public $id, $nome, $idade, $valores_totais;

        // Método que é executado por um objeto desta classe assim que é instanciado.

        public function __construct(int $id = 0, string $nome = "", int $idade = 0)
        {

            /*

                Se os atributos não estiverem vazios, isso significa que o objeto atual foi retornado pelo PDO e já está 
                preenchido, senão, eles serão definidos com base nos parâmetros do construtor.

            */

            if(empty($this->id))
            {

                $this->id = $id;

                $this->nome = $nome;

                $this->idade = $idade;
                
            }

            // Obtendo os dados monetários da pessoa ao qual o objeto atual se refere. Isso só é executado se o atributo ID estiver preenchido.

            else
            {

                $objeto_valores_totais = new TotaisModel();

                $objeto_valores_totais->List($this->id);

                if($objeto_valores_totais->data === false)
                {

                    $this->valores_totais = new TotaisModel();

                }

                else
                {

                    $this->valores_totais = $objeto_valores_totais->data;

                }

            }
            
        }

        // Métodos que interagem com a camada DAO.

        public function Save() : bool
        {

            // Instanciando um novo objeto DAO, passando um parâmetro para o método executado e retornando seu resultado.

            return (new PessoaDAO())->Insert($this);

        }

        public function Erase(int $id) : bool
        {

            // Instanciando um novo objeto DAO, passando um parâmetro para o método executado e retornando seu resultado.

            return (new PessoaDAO())->Delete($id);

        }

        public function List(?int $id = null) : void
        {

            // Instanciando um novo objeto DAO.

            $dao = new PessoaDAO();

            /*

                Armazenando o conteúdo retornado pelo PDO no atributo herdado "data". Se o parâmetro "id" for nulo, 
                todos os registros da tabela serão retornados, senão, apenas aquele que atender à condição especificada na DAO.

            */

            $this->data = ($id === null) ? $dao->Select() : $dao->Search($id);

            /*
            
                Caso o valor retornado pelo PDO seja "false", ele será trocado por um objeto vazio, para evitar 
                possíveis erros na aplicação C#.

            */

            if($id !== null && $this->data === false)
            {

                $this->data = new PessoaModel();

            }

        }

    }

?>
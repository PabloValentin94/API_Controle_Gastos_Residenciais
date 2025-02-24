<?php

    namespace Api\Controller;

    use \Exception;

    use Api\Model\PessoaModel;

    class PessoaController extends Controller
    {

        public static function Save() : void
        {

            try
            {

                // Obtendo o JSON enviado pela aplicação C#.

                $json_object = json_decode(file_get_contents("php://input"));

                // Instanciado um novo objeto Model para que os dados sejam salvos.

                $model = new PessoaModel((int) $json_object->id, $json_object->nome, (int) $json_object->idade);
    
                // Retornando o resultado do método "Save" para a aplicação C#.

                parent::SendReturnAsJSON($model->Save());

            }

            catch(Exception $ex)
            {

                // Retornando a exceção gerada para a aplicação C#.

                parent::SendExceptionAsJSON($ex);

            }

        }

        public static function Erase() : void
        {

            try
            {

                // Obtendo o JSON enviado pelo aplicação C#.

                $id = (int )json_decode(file_get_contents("php://input"));

                // Instanciado um novo objeto Model e retornando o resultado do método "Erase" para a aplicação C#.

                parent::SendReturnAsJSON((new PessoaModel())->Erase($id));

            }

            catch(Exception $ex)
            {

                // Retornando a exceção gerada para a aplicação C#.

                parent::SendExceptionAsJSON($ex);

            }

        }

        public static function List() : void
        {

            try
            {

                // Instanciado um novo objeto Model.

                $model = new PessoaModel();

                // Obtendo registros do banco de dados. Vá até o método executado abaixo para mais detalhes.

                $model->List();

                // Retornando o resultado do método "List" para a aplicação C#.

                parent::SendReturnAsJSON($model->data);

            }

            catch(Exception $ex)
            {

                // Retornando a exceção gerada para a aplicação C#.

                parent::SendExceptionAsJSON($ex);

            }

        }

    }

?>
<?php

    namespace Api\Controller;

    use \Exception;

    use Api\Model\TransacaoModel;

    class TransacaoController extends Controller
    {

        public static function Save() : void
        {

            try
            {

                // Obtendo o JSON enviado pelo aplicação C#.

                $json_object = json_decode(file_get_contents("php://input"));

                // Instanciado um novo objeto Model para que os dados sejam salvos.

                $model = new TransacaoModel((int) $json_object->id, $json_object->descricao, (float) $json_object->valor, $json_object->tipo, (int) $json_object->fk_pessoa);

                // Retornando o resultado do método "Save" para a aplicação C#.

                parent::SendReturnAsJSON($model->Save());

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

                $model = new TransacaoModel();

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
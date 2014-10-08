<?php


namespace Libraries;
use Silex\Application;


class VerificaErros
{
    public static function error(Application $app)
    {

        $app->error(function (\Exception $e, $code) use($app) {
            switch ($code) {
                case 404:
                    $message = ['mensagem' => 'A pagina requisitada não existe', 'error_code' => $code];
                    break;
                case 500:
                    $message = ['mensagem' => 'Desculpe, ocorreu um erro no sistema. Tente novamente!', 'error_code' => $code];
                    break;
                default:
                    $message = ['mensagem' => 'Desculpe, ocorreu um erro desconhecido', 'error_code' => $code];
            }

            return $app->json($message);
        });

    }
} 
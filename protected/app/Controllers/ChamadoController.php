<?php

namespace Controllers;

use Silex\Application;
use Silex\Route;
use Silex\ControllerProviderInterface;
use Silex\ControllerCollection;
use Symfony\Component\HttpFoundation\Request;

class ChamadoController implements ControllerProviderInterface {

	public function connect(Application $app) {
		$index = new ControllerCollection(new Route());

        /**
         * Rota Para Listar Tudo
         */
        $index->get('/listar', function() use ($app) {

            try {
                $data = $app['models']->load('ChamadoModel', 'findAll', $app);
                return $app->json($data);
            } catch(\Exception $e) {
                return $app['erros']::error($app);
            }

		});

        /**
         * Rota Para Listar Com Parametro ID
         */
        $index->get('/listar/{id}', function($id) use ($app) {

            try {
                $data = $app['models']->load('ChamadoModel', 'find', $id);
                return $app->json($data);
            } catch(\Exception $e) {
                return $app['erros']::error($app);
            }

        });

        /**
         * Rota Para Deletar Com Parametro ID
         */
        $index->delete('/delete/{id}', function($id) use ($app) {
            try {
                $data = $app['models']->load('ChamadoModel', 'delete', $id);
                return $app->json($data);
            } catch(\Exception $e) {
                return $app['erros']::error($app);
            }
        });

        /**
         * Rota Para Alterar Com Parametro ID
         */
        $index->put('/teste/{id}', function($id) use ($app) {
            /**
             * @var $request \Symfony\Component\HttpFoundation\Request
             */
            $request = $app['request'];
            var_dump($request->query->all() );die;
        });

        /**
         * Rota Para Inserir Dados Via Post deixa eu ver
         */
        $index->post('/insert', function() use ($app) {

            /* Use $_POST Catch Data */
            $data = [/**/];
            if(!empty($data)) {
                try {
                    $data = $app['models']->load('ChamadoModel','insert', $data);
                    return $app->json($data);
                } catch(\Exception $e) {
                    return $app['erros']::error($app);
                }
            };
            return $app['erros']::error($app);


        });

        return $index;
	}
}
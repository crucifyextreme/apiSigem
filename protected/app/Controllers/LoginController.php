<?php

namespace Controllers;

use Silex\Application;
use Silex\Route;
use Silex\ControllerProviderInterface;
use Silex\ControllerCollection;

class LoginController implements ControllerProviderInterface
{

	public function connect(Application $app)
    {
		$index = new ControllerCollection(new Route());

		$index->post('/', function() use ($app) {

            $dataLogin = [
                'user'  => $_POST['user'],
                'password'  => $_POST['password']
            ];


		});


		return $index;
	}
}
<?php
$filename = __DIR__.preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
if (php_sapi_name() === 'cli-server' && is_file($filename)) {
    return false;
}

use Symfony\Component\HttpFoundation\Request;
require_once __DIR__ . '/../protected/vendor/autoload.php';

$app = new Silex\Application();

$app->before(function (Request $request) {
    if (0 === strpos($request->headers->get('Content-Type'), 'application/json')) {
        $data = json_decode($request->getContent(), true);
        $request->request->replace(is_array($data) ? $data : array());
    }
});

/**
 * Ativando o debug do Silex
 */
$app['debug'] = true;

/**
 * Registrando classe Libraries\VeriricaErros
 */
$app['erros'] = function() {
    return new Libraries\VerificaErros();
};

$app->register(new Providers\ModelsServiceProvider(), array(
    'models.path' => __DIR__ . '/../protected/app/models/'
));

$app->mount('/chamados', new Controllers\ChamadoController());
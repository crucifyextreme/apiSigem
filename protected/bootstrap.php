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

/**
 * Registros
 */
$app->register(new Providers\ModelsServiceProvider(), array(
    'models.path' => __DIR__ . '/../protected/app/models/'
));
/* Doctrine */
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'driver'   => 'pdo_mysql',
        'host'      => 'localhost',
        'dbname'    => 'project_people',
        'user'      => 'root',
        'password'  => '392533',
        'charset'   => 'utf8',
        'port'      => 3306
    ),
));

$app->mount('/chamados', new Controllers\ChamadoController());
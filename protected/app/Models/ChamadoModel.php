<?php

class ChamadoModel
{
    public function findAll($app)
    {
        /* Busca todos os chamados */
       //return $app['db']->fetchAll('SELECT * FROM chamados_sac LIMIT 5');
        $qb = $app['db']->createQueryBuilder();

        $qb
        ->select('contrato')
        ->from('chamados_sac');

        return $qb;
    }

    public function find($id, $app)
    {
        /* Busca chamados com parametro */
        return $app['db']->fetchAll('SELECT * FROM chamados_sac LIMIT 5');
    }

    public function findOpen($app)
    {
        /* Listar chamados abertos */
    }

    public function findClose($app)
    {
        /* Listar chamados fechados */
    }

    public function insert()
    {
        return "passou";
    }
}
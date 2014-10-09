<?php

class ChamadoModel
{
    public function findAll($app)
    {
        /* Busca todos os chamados */
       //return $app['db']->fetchAll('SELECT * FROM chamados_sac LIMIT 5');
        $qb = $app['db']->createQueryBuilder();
        $qb->createQueryBuilder()
            ->select('*')
            ->from('chamados_sac')
            ->execute()
            ->fetchAll(\PDO::FETCH_COLUMN);
    }

    public function find($id, $app)
    {

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
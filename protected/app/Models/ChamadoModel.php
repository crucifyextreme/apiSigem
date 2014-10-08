<?php

class ChamadoModel
{
    public function findAll()
    {
        return array(
            "nome" => "joao",
            "email" => "email joao",
            "endereco" => "endereco joao",
            "numero" => "numero joao"

        );
    }

    public function find($id)
    {
        return $id;
    }

    public function insert()
    {
        return "passou";
    }
}
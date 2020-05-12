<?php


namespace App\Contracts;


interface AttributeContract
{
    /**
     * @param int $id
     * @return mixed
     */
    public function findAttributeById(int $id);

    /**
     * @return mixed
     */
    public function listAttributes();
}

<?php

namespace App\Http\Repositories;

interface CreationChampRepositoryInterface
{
    public function getField($libelleEnums);

    public function createField($nom, $type, $longueur, $nullable);

    public function getFieldsAllCategories($tabEnumsCategories);
}
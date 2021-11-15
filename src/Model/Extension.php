<?php

namespace Src\Model;

use Src\Entity\EntityExtension;

class Extension extends Model
{

    protected $table;
    protected $entity;

    function __construct()
    {
        $this->entity = new EntityExtension();
        $this->table = 'modul_extension';
    }
}

<?php

namespace Src\Model;

use Src\Entity\EntityGeneral;

class General extends Model
{

    protected $table;
    protected $entity;

    function __construct()
    {
        $this->entity = new EntityGeneral();
        $this->table = 'general';
    }
}

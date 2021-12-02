<?php

namespace Src\Model;

use Src\Entity\EntityUserRank;

class UserRank extends Model
{

    protected $table;
    protected $entity;

    function __construct()
    {
        $this->entity = new EntityUserRank();
        $this->table = 'user_rank';
    }
}

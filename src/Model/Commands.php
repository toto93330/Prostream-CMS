<?php

namespace Src\Model;

use Src\Entity\EntityCommands;

class Commands extends Model
{

    protected $table;
    protected $entity;

    function __construct()
    {
        $this->entity = new EntityCommands();
        $this->table = 'modul_commands';
    }
}

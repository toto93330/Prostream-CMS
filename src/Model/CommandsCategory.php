<?php

namespace Src\Model;

use Src\Entity\EntityCommandsCategory;

class CommandsCategory extends Model
{

    protected $table;
    protected $entity;

    function __construct()
    {
        $this->entity = new EntityCommandsCategory();
        $this->table = 'modul_commands_category';
    }
}

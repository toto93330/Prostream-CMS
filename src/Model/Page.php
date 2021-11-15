<?php

namespace Src\Model;

use Src\Entity\EntityPage;

class Page extends Model
{

    protected $table;
    protected $entity;

    function __construct()
    {
        $this->entity = new EntityPage();
        $this->table = 'modul_page';
    }
}

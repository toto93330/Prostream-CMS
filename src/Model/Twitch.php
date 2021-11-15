<?php

namespace Src\Model;

use Src\Entity\EntityTwitch;

class Twitch extends Model
{

    protected $table;
    protected $entity;

    function __construct()
    {
        $this->entity = new EntityTwitch();
        $this->table = 'modul_twitch';
    }
}

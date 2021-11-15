<?php

namespace Src\Model;

use Src\Entity\EntityDonation;

class Donation extends Model
{

    protected $table;
    protected $entity;

    function __construct()
    {
        $this->entity = new EntityDonation();
        $this->table = 'modul_donation';
    }
}

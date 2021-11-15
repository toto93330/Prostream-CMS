<?php

namespace Src\Model;

use Src\Entity\EntityCalendarDay;

class CalendarDay extends Model
{

    protected $table;
    protected $entity;

    function __construct()
    {
        $this->entity = new EntityCalendarDay();
        $this->table = 'modul_calendar_day';
    }
}

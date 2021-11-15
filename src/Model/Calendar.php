<?php

namespace Src\Model;

use DateTime;
use Src\Entity\EntityCalendar;

class Calendar extends Model
{

    protected $table;
    protected $entity;

    function __construct()
    {
        $this->entity = new EntityCalendar();
        $this->table = 'modul_calendar';
    }

    /**
     * Find All defined items on database
     *
     * @return object
     */
    public function findAllOrderEventStart()
    {
        $list = [];

        $week = (new DateTime())->getTimestamp();
        $week = date('W', $week);

        $stmt = $this->dbConnect()->prepare("SELECT * FROM $this->table WHERE week = $week ORDER BY dayID, starteventat ASC");
        $stmt->execute();
        $items = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        foreach ($items as $articleRaw) {
            $list[] = $this->getInstance($articleRaw, $this->entity);
        }

        return $list;
    }
}

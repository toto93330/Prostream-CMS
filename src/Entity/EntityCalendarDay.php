<?php

namespace Src\Entity;

/**
 * Entity Calendar Day This Class it's for entity hydrate.
 * @copyright Anthony Alves
 * @link www.anthonyalves.fr
 */

class EntityCalendarDay
{
    protected $id;
    protected $name;

    ////
    // GETTER
    ////

    /**
     * Return unique id
     *
     * @return string
     */
    function getId()
    {
        return $this->id;
    }

    /**
     * Return page title
     *
     * @return string
     */
    function getName()
    {
        return $this->name;
    }

    ////
    // SETTER
    ////

    /**
     * Set Unique id
     *
     * @param string
     * @return void
     */
    function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Set Page Title
     *
     * @param string
     * @return void
     */
    function setName($name)
    {
        $this->name = $name;
    }
}

<?php

namespace Src\Entity;

/**
 * Entity User Rank This Class it's for entity hydrate.
 * @copyright Anthony Alves
 * @link www.anthonyalves.fr
 */

class EntityUserRank
{
    protected $id;
    protected $name;

    ////
    // GETTER
    ////

    /**
     * Return unique id
     *
     * @return int
     */
    function getId()
    {
        return $this->id;
    }

    /**
     * Return rank name
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
     * Set rank name
     *
     * @param string
     * @return void
     */
    function setName($name)
    {
        $this->name = $name;
    }
}

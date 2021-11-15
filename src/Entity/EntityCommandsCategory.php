<?php

namespace Src\Entity;

/**
 * Entity Commands Category This Class it's for entity hydrate.
 * @copyright Anthony Alves
 * @link www.anthonyalves.fr
 */

class EntityCommandsCategory
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
     * Return Category name
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
     * @param int
     * @return void
     */
    function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Set Category name
     *
     * @param string
     * @return void
     */
    function setName($name)
    {
        $this->name = $name;
    }
}

<?php

namespace Src\Entity;

/**
 * Entity Social This Class it's for entity hydrate.
 * @copyright Anthony Alves
 * @link www.anthonyalves.fr
 */

class EntitySocial
{
    protected $id;
    protected $name;
    protected $icon;
    protected $link;

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
     * Return name
     *
     * @return string
     */
    function getName()
    {
        return $this->name;
    }

    /**
     * Return icon
     *
     * @return string
     */
    function getIcon()
    {
        return $this->icon;
    }


    /**
     * Return Link
     *
     * @return string
     */
    function getLink()
    {
        return $this->link;
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
     * Set Name
     *
     * @param string
     * @return void
     */
    function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Set Icon
     *
     * @param string
     * @return void
     */
    function setIcon($icon)
    {
        $this->icon = $icon;
    }

    /**
     * Set Link
     *
     * @param string
     * @return void
     */
    function setLink($link)
    {
        $this->link = $link;
    }
}

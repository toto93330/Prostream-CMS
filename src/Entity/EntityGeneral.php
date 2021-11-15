<?php

namespace Src\Entity;

/**
 * Entity General This Class it's for entity hydrate.
 * @copyright Anthony Alves
 * @link www.anthonyalves.fr
 */

class EntityGeneral
{
    protected $id;
    protected $title;
    protected $description;
    protected $email;
    protected $logo;
    protected $maintenance;

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
     * Return site title
     *
     * @return string
     */
    function getTitle()
    {
        return $this->title;
    }

    /**
     * Return site description
     *
     * @return string
     */
    function getDescription()
    {
        return $this->description;
    }


    /**
     * Return Admin email
     *
     * @return string
     */
    function getEmail()
    {
        return $this->email;
    }

    /**
     * Return WebSite Logo
     *
     * @return string
     */
    function getLogo()
    {
        return $this->logo;
    }

    /**
     * Return if Website is on maintenance
     *
     * @return bool
     */
    function getMaintenance()
    {
        return $this->maintenance;
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
     * Set Site Title
     *
     * @param string
     * @return void
     */
    function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Set Site Description
     *
     * @param string
     * @return void
     */
    function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Set Site Support Email
     *
     * @param string
     * @return void
     */
    function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Set Site Logo
     *
     * @param string
     * @return void
     */
    function setLogo($logo)
    {
        $this->logo = $logo;
    }

    /**
     * Set maintenance is true or false
     *
     * @param bool
     * @return void
     */
    function setMaintenance($maintenance)
    {
        $this->maintenance = $maintenance;
    }
}

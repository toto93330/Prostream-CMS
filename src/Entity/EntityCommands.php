<?php

namespace Src\Entity;

/**
 * Entity Commands This Class it's for entity hydrate.
 * @copyright Anthony Alves
 * @link www.anthonyalves.fr
 */

class EntityCommands
{
    protected $id;
    protected $categoryid;
    protected $command;
    protected $content;
    protected $cost;
    protected $actived;

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
     * Return Category id
     *
     * @return object
     */
    function getCategoryid()
    {
        return $this->categoryid;
    }

    /**
     * Return command
     *
     * @return string
     */
    function getCommand()
    {
        return $this->command;
    }

    /**
     * Return Content for command
     *
     * @return string
     */
    function getContent()
    {
        return $this->content;
    }

    /**
     * Return Cost for command
     *
     * @return int
     */
    function getCost()
    {
        return $this->cost;
    }

    /**
     * Return if commands is active
     *
     * @return int
     */
    function getActived()
    {
        return $this->actived;
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
     * Set Category for command
     *
     * @param int
     * @return void
     */
    function setCategoryid($categoryid)
    {
        $this->categoryid = $categoryid;
    }

    /**
     * Set Command
     *
     * @param string
     * @return void
     */
    function setCommand($command)
    {
        $this->command = $command;
    }

    /**
     * Set Content Command
     *
     * @param string
     * @return void
     */
    function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * Set Command Cost
     *
     * @param int
     * @return void
     */
    function setCost($cost)
    {
        $this->cost = $cost;
    }


    /**
     * Set Command is actived
     *
     * @param int
     * @return void
     */
    function setActived($actived)
    {
        $this->actived = $actived;
    }
}

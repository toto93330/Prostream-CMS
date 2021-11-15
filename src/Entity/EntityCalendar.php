<?php

namespace Src\Entity;

/**
 * Entity Calendar This Class it's for entity hydrate.
 * @copyright Anthony Alves
 * @link www.anthonyalves.fr
 */

class EntityCalendar
{
    protected $id;
    protected $dayID;
    protected $starteventat;
    protected $endeventat;
    protected $name;
    protected $image;
    protected $week;
    protected $isfullday;
    protected $actived;

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
     * Return Day
     *
     * @return object
     */
    function getDayid()
    {
        return $this->dayID;
    }

    /**
     * Return Start Event At 
     *
     * @return string
     */
    function getStarteventat()
    {
        return $this->starteventat;
    }

    /**
     * Return End Event At
     *
     * @return int
     */
    function getEndeventat()
    {
        return $this->endeventat;
    }

    /**
     * Return Event Name
     *
     * @return string
     */
    function getName()
    {
        return $this->name;
    }

    /**
     * Return Event Image
     *
     * @return string
     */
    function getImage()
    {
        return $this->image;
    }

    /**
     * Return Event week number
     *
     * @return int
     */
    function getWeek()
    {
        return $this->week;
    }

    /**
     * Return if event is full day
     *
     * @return int
     */
    function getIsfullday()
    {
        return $this->isfullday;
    }

    /**
     * Return if event is actived
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
     * @param string
     * @return void
     */
    function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Set Day
     *
     * @param string
     * @return void
     */
    function setDayid($dayID)
    {
        $this->dayID = $dayID;
    }

    /**
     * Set hours of Start Event
     *
     * @param int
     * @return void
     */
    function setStarteventat($starteventat)
    {
        $this->starteventat = $starteventat;
    }

    /**
     * Set hours of End Event
     *
     * @param int
     * @return void
     */
    function setEndeventat($endeventat)
    {
        $this->endeventat = $endeventat;
    }

    /**
     * Set name Event
     *
     * @param string
     * @return void
     */
    function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Set image Event
     *
     * @param string
     * @return void
     */
    function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * Set Event Week number
     *
     * @param int
     * @return void
     */
    function setWeek($week)
    {
        $this->week = $week;
    }

    /**
     * Set Is full day event
     *
     * @param int
     * @return void
     */
    function setIsfullday($isfullday)
    {
        $this->isfullday = $isfullday;
    }

    /**
     * Set Is Actived
     *
     * @param int
     * @return void
     */
    function setActived($actived)
    {
        $this->actived = $actived;
    }
}

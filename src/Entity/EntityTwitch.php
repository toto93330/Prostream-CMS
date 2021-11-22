<?php

namespace Src\Entity;

/**
 * Entity Twitch This Class it's for entity hydrate.
 * @copyright Anthony Alves
 * @link www.anthonyalves.fr
 */

class EntityTwitch
{
    protected $id;
    protected $name;
    protected $linksubscribe;
    protected $linkbits;
    protected $linkreplay;
    protected $linkshop;
    protected $installed;

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
     * Return Twitch Name
     *
     * @return string
     */
    function getName()
    {
        return $this->name;
    }

    /**
     * Return Link subscribe
     *
     * @return string
     */
    function getLinksubscribe()
    {
        return $this->linksubscribe;
    }

    /**
     * Return Link Bits
     *
     * @return string
     */
    function getLinkbits()
    {
        return $this->linkbits;
    }

    /**
     * Return Link Replay
     *
     * @return string
     */
    function getLinkreplay()
    {
        return $this->linkreplay;
    }

    /**
     * Return Link Shop
     *
     * @return string
     */
    function getLinkshop()
    {
        return $this->linkshop;
    }

    /**
     * Return if twitch modul is installed
     *
     * @return int
     */
    function getInstalled()
    {
        return $this->installed;
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
     * Set Twitch channel name
     *
     * @param string
     * @return void
     */
    function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Set Twitch channel id
     *
     * @param int
     * @return void
     */
    function setInstalled($installed)
    {
        $this->installed = $installed;
    }


    /**
     * Set Link Subcribe
     *
     * @param string
     * @return void
     */
    function setLinksubcribe($linksubscribe)
    {
        $this->linksubscribe = $linksubscribe;
    }

    /**
     * Set Link Bits
     *
     * @param string
     * @return void
     */
    function setLinkbits($linkbits)
    {
        $this->linkbits = $linkbits;
    }

    /**
     * Set Link Replay
     *
     * @param string
     * @return void
     */
    function setLinkreplay($linkreplay)
    {
        $this->linkreplay = $linkreplay;
    }

    /**
     * Set Link Shop
     *
     * @param string
     * @return void
     */
    function setLinkshop($linkshop)
    {
        $this->linkshop = $linkshop;
    }
}

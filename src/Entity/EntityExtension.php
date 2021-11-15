<?php

namespace Src\Entity;

/**
 * Entity Extension This Class it's for entity hydrate.
 * @copyright Anthony Alves
 * @link www.anthonyalves.fr
 */

class EntityExtension
{
    protected $id;
    protected $title;
    protected $content;
    protected $link_extension_firefox;
    protected $link_extension_chrome;
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
     * Return page title
     *
     * @return string
     */
    function getTitle()
    {
        return $this->title;
    }

    /**
     * Return page content
     *
     * @return string
     */
    function getContent()
    {
        return $this->content;
    }

    /**
     * Return Firefox Extension Link
     *
     * @return string
     */
    function getLinkextensionfirefox()
    {
        return $this->link_extension_firefox;
    }


    /**
     * Return Chrome Extension Link
     *
     * @return string
     */
    function getLinkextensionchrome()
    {
        return $this->link_extension_chrome;
    }


    /**
     * Return if modul page is actived or not
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
     * Set Page Title
     *
     * @param string
     * @return void
     */
    function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Set Page Content
     *
     * @param string
     * @return void
     */
    function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * Set link extension firefox
     *
     * @param string
     * @return void
     */
    function setLinkextensionfirefox($link_extension_firefox)
    {
        $this->link_extension_firefox = $link_extension_firefox;
    }

    /**
     * Set link extension chrome
     *
     * @param string
     * @return void
     */
    function setLinkextensionchrome($link_extension_chrome)
    {
        $this->link_extension_chrome = $link_extension_chrome;
    }

    /**
     * Set Modul si active or not
     *
     * @param int
     * @return void
     */
    function setActived($actived)
    {
        $this->actived = $actived;
    }
}

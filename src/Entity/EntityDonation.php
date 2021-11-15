<?php

namespace Src\Entity;

/**
 * Entity Donation This Class it's for entity hydrate.
 * @copyright Anthony Alves
 * @link www.anthonyalves.fr
 */
class EntityDonation
{
    protected int $id;
    protected string $title;
    protected string $content;
    protected string $linkdonationpaypal;
    protected string $linkdonationstreamlab;
    protected bool $actived;


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
     * Return Paypal Link
     *
     * @return string
     */
    function getLinkdonationpaypal()
    {
        return $this->linkdonationpaypal;
    }


    /**
     * Return Streamlab Link
     *
     * @return string
     */
    function getLinkdonationstreamlab()
    {
        return $this->linkdonationstreamlab;
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
     * Set paypal donation link
     *
     * @param string
     * @return void
     */
    function setLinkdonationpaypal($linkdonationpaypal)
    {
        $this->linkdonationpaypal = $linkdonationpaypal;
    }

    /**
     * Set Streamlab donation link
     *
     * @param string
     * @return void
     */
    function setLinkdonationstreamlab($linkdonationstreamlab)
    {
        $this->linkdonationstreamlab = $linkdonationstreamlab;
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

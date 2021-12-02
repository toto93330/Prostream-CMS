<?php

namespace Src\Entity;

/**
 * Entity User This Class it's for entity hydrate.
 * @copyright Anthony Alves
 * @link www.anthonyalves.fr
 */

class EntityUser
{
    protected $id;
    protected $email;
    protected $avatar;
    protected $password;
    protected $rank;
    protected $banned;

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
     * Return User Email
     *
     * @return string
     */
    function getEmail()
    {
        return $this->email;
    }

    /**
     * Return User Avatar
     *
     * @return string
     */
    function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Return User Password
     *
     * @return string
     */
    function getPassword()
    {
        return $this->password;
    }

    /**
     * Return User Rank
     *
     * @return int
     */
    function getRank()
    {
        return $this->rank;
    }

    /**
     * Return User is banned or not
     *
     * @return int
     */
    function getBanned()
    {
        return $this->banned;
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
     * Set User Email
     *
     * @param string
     * @return void
     */
    function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Set User Avatar
     *
     * @param string
     * @return void
     */
    function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    }


    /**
     * Set User Password
     *
     * @param string
     * @return void
     */
    function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Set User Rank
     *
     * @param int
     * @return void
     */
    function setRank($rank)
    {
        $this->rank = $rank;
    }

    /**
     * Set User Banned
     *
     * @param int
     * @return void
     */
    function setBanned($banned)
    {
        $this->banned = $banned;
    }
}

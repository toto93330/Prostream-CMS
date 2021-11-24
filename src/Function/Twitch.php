<?php

namespace Src\Function;

use Src\Function\Connexion;
use Src\Model\Twitch as ModelTwitch;

/**
 * This Class it's for Twitch TV.
 * @author Anthony Alves <www.anthonyalves.fr>
 * @package App\Functions
 */

class Twitch
{

    private $pseudo;

    function __construct()
    {
        $stmt = self::dbConnect()->prepare("SELECT * FROM modul_twitch");
        $stmt->execute();
        $this->pseudo = $stmt->fetch();
    }

    /**
     * Return dbConnect() for connexion with singleton PDO style.
     * @return object
     */
    static protected function dbConnect()
    {
        return Connexion::dbConnect();
    }

    /**
     * Get Stream Status ONLINE = 1 / OFFLINE = 0
     * @return int 
     */
    function getChannelStatus()
    {
        $statut = file_get_contents('https://decapi.me/twitch/viewercount/' . $this->pseudo['name']);

        if ($statut == $this->pseudo['name'] . " is offline") {
            return 0;
        } else {
            return 1;
        }
    }

    /**
     * Get Stream title
     * @return string|false 
     */
    function getTitle()
    {
        return file_get_contents('https://decapi.me/twitch/title/' . $this->pseudo['name']);
    }

    /**
     * Get Actuel view in live stream
     * @return string|false 
     */
    function getViews()
    {
        $views = file_get_contents('https://decapi.me/twitch/viewercount/' . $this->pseudo['name']);
        if ($views == $this->pseudo['name'] . " is offline") {
            return "Stream Offline";
        } else {
            return $views;
        }
    }

    /**
     * Get channel name
     * @return mixed 
     */
    function getChannelName()
    {
        return $this->pseudo['name'];
    }

    /**
     * Get time to stream
     * @return string|false 
     */
    function getUpTime()
    {
        return file_get_contents('https://decapi.me/twitch/uptime/' . $this->pseudo['name']);
    }

    /**
     * Get number of follow
     * @return string|false 
     */
    function getFollows()
    {
        return file_get_contents('https://decapi.me/twitch/followcount/' . $this->pseudo['name']);
    }

    /**
     * Get last vod link
     * @return string|false 
     */
    function getVOD()
    {
        return file_get_contents('https://decapi.me/twitch/vod_replay/' . $this->pseudo['name']);
    }

    /**
     * Get Total view on channel
     * @return string|false 
     */
    function getTotalViews()
    {
        return file_get_contents('https://decapi.me/twitch/total_views/' . $this->pseudo['name']);
    }

    /**
     * Get Link Subcribe page
     * @return mixed 
     */
    function getLinkSubcribe()
    {
        return $this->pseudo['linksubcribe'];
    }

    /**
     * Get Link Bits page
     * @return mixed 
     */
    function getLinkBits()
    {
        return $this->pseudo['linkbits'];
    }

    /**
     * Get Link Replay page
     * @return mixed 
     */
    function getLinkReplay()
    {
        return $this->pseudo['linkreplay'];
    }

    /**
     * Get Link shop page
     * @return mixed 
     */
    function getLinkShop()
    {
        return $this->pseudo['linkshop'];
    }
}

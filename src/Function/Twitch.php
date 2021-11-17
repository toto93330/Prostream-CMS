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

    function getChannelStatus()
    {
        $statut = file_get_contents('https://decapi.me/twitch/viewercount/' . $this->pseudo['name']);

        if ($statut == $this->pseudo['name'] . " is offline") {
            return 0;
        } else {
            return 1;
        }
    }

    function getTitle()
    {
        return file_get_contents('https://decapi.me/twitch/title/' . $this->pseudo['name']);
    }

    function getViews()
    {
        $views = file_get_contents('https://decapi.me/twitch/viewercount/' . $this->pseudo['name']);
        if ($views == $this->pseudo['name'] . " is offline") {
            return "Stream Offline";
        } else {
            return $views;
        }
    }

    function getChannelName()
    {
        return $this->pseudo['name'];
    }

    function getUpTime()
    {
        return file_get_contents('https://decapi.me/twitch/uptime/' . $this->pseudo['name']);
    }

    function getFollows()
    {
        return file_get_contents('https://decapi.me/twitch/followcount/' . $this->pseudo['name']);
    }

    function getVOD()
    {
        return file_get_contents('https://decapi.me/twitch/vod_replay/' . $this->pseudo['name']);
    }

    function getTotalViews()
    {
        return file_get_contents('https://decapi.me/twitch/total_views/' . $this->pseudo['name']);
    }

    function getLinkSubcribe()
    {
        return $this->pseudo['linksubcribe'];
    }

    function getLinkBits()
    {
        return $this->pseudo['linkbits'];
    }

    function getLinkReplay()
    {
        return $this->pseudo['linkreplay'];
    }

    function getLinkShop()
    {
        return $this->pseudo['linkshop'];
    }
}

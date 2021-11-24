<?php

namespace Src\Model;

use Src\Entity\EntityTwitch;

class Twitch extends Model
{

    protected $table;
    protected $entity;

    function __construct()
    {
        $this->entity = new EntityTwitch();
        $this->table = 'modul_twitch';
    }

    function addlink()
    {

        if (!empty($_POST['link-subcribe']) && !empty($_POST['link-bits']) && !empty($_POST['link-replay'])  && !empty($_POST['link-shop'])) {
            $subcribe = htmlspecialchars($_POST['link-subcribe']);
            $bits = htmlspecialchars($_POST['link-bits']);
            $replay = htmlspecialchars($_POST['link-replay']);
            $shop = htmlspecialchars($_POST['link-shop']);

            $stmt = $this->dbConnect()->prepare("UPDATE $this->table SET linksubcribe=? , linkbits=? , linkreplay=? , linkshop=? WHERE id=1");
            $stmt->execute(array($subcribe, $bits, $replay, $shop));

            //IF SUMITED
            $modified = 1;
        } else {
            header("location: /admin/live?error=1");
        }

        if ($modified == 1) {
            header("location: /admin/live?success=1");
        }
    }


    function addTwitchName()
    {

        if (!empty($_POST['twitch-name'])) {
            $twitch = htmlspecialchars($_POST['twitch-name']);

            $stmt = $this->dbConnect()->prepare("UPDATE $this->table SET `name`=? WHERE id=1");
            $stmt->execute(array($twitch));

            //IF SUMITED
            $modified = 1;
        } else {
            header("location: /admin/twitch-api?error=1");
        }

        if ($modified == 1) {
            header("location: /admin/twitch-api?success=1");
        }
    }
}

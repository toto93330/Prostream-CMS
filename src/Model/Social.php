<?php

namespace Src\Model;

use Src\Entity\EntitySocial;

class Social extends Model
{

    protected $table;
    protected $entity;

    function __construct()
    {
        $this->entity = new EntitySocial();
        $this->table = 'social';
    }

    function addSocial()
    {

        if (!empty($_POST['name']) && !empty($_POST['icon']) && !empty($_POST['link'])) {
            $name = htmlspecialchars($_POST['name']);
            $icon = htmlspecialchars($_POST['icon']);
            $link = htmlspecialchars($_POST['link']);

            $stmt = $this->dbConnect()->prepare("INSERT INTO `social` (`id`, `name`, `icon`, `link`) VALUES (NULL, ?, ?, ?)");
            $stmt->execute(array($name, $icon, $link));

            //IF SUMITED
            $modified = 1;
        }

        if ($modified == 1) {
            header("location: /admin/social-link?add=1");
        }
    }


    function editSocial($id)
    {

        if (!empty($_POST['name'])) {
            $value = htmlspecialchars($_POST['name']);
            $stmt = $this->dbConnect()->prepare("UPDATE $this->table SET `name` = '$value' WHERE `id` = $id");
            $stmt->execute();

            //IF SUMITED
            $modified = 1;
        }

        if (!empty($_POST['icon'])) {
            $value = htmlspecialchars($_POST['icon']);
            $stmt = $this->dbConnect()->prepare("UPDATE $this->table SET `icon` = '$value' WHERE `id` = $id");
            $stmt->execute();

            //IF SUMITED
            $modified = 1;
        }

        if (!empty($_POST['link'])) {
            $value = htmlspecialchars($_POST['link']);
            $stmt = $this->dbConnect()->prepare("UPDATE $this->table SET `link` = '$value' WHERE `id` = $id");
            $stmt->execute();

            //IF SUMITED
            $modified = 1;
        }

        if ($modified == 1) {
            header("location: /admin/social-link/$id?success=1");
        }
    }
}

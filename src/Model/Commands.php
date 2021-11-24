<?php

namespace Src\Model;

use Src\Entity\EntityCommands;

class Commands extends Model
{

    protected $table;
    protected $entity;

    function __construct()
    {
        $this->entity = new EntityCommands();
        $this->table = 'modul_commands';
    }


    function addCommand()
    {

        if (!empty($_POST['category']) && !empty($_POST['command']) && !empty($_POST['content']) && !empty($_POST['cost']) && !empty($_POST['actived'])) {
            $category = htmlspecialchars($_POST['category']);
            $command = htmlspecialchars($_POST['command']);
            $content = htmlspecialchars($_POST['content']);
            $cost = htmlspecialchars($_POST['cost']);
            $actived = htmlspecialchars($_POST['actived']);

            $stmt = $this->dbConnect()->prepare("INSERT INTO $this->table (`id`, `categoryID`, `command`,  `content`, `cost`, `actived`) VALUES (NULL, ?, ?, ?, ?, ?)");
            $stmt->execute(array($category, $command, $content, $cost, $actived));

            //IF SUMITED
            $modified = 1;
        } else {
            header("location: /admin/commandes/add?error=1");
        }

        if ($modified == 1) {
            header("location: /admin/commandes?add=1");
        }
    }


    function editCommand($id)
    {

        if (!empty($_POST['category']) && !empty($_POST['command']) && !empty($_POST['content']) && !empty($_POST['cost']) && !empty($_POST['actived'])) {

            $category = htmlspecialchars($_POST['category']);
            $command = htmlspecialchars($_POST['command']);
            $content = htmlspecialchars($_POST['content']);
            $cost = htmlspecialchars($_POST['cost']);
            $actived = htmlspecialchars($_POST['actived']);

            $stmt = $this->dbConnect()->prepare("UPDATE $this->table SET `categoryID` = '$category' , `command` = '$command' , `content` = '$content' , `cost` = '$cost' , `actived` = '$actived' WHERE `id` = $id");
            $stmt->execute();

            //IF SUMITED
            $modified = 1;
        }

        if ($modified == 1) {
            header("location: /admin/commandes/$id?success=1");
        }
    }
}

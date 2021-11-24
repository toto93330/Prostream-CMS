<?php

namespace Src\Model;

use Src\Entity\EntityCommandsCategory;

class CommandsCategory extends Model
{

    protected $table;
    protected $entity;

    function __construct()
    {
        $this->entity = new EntityCommandsCategory();
        $this->table = 'modul_commands_category';
    }

    /**
     * edit command category in database
     * @param mixed $id 
     * @return void 
     */
    function editCommandsCategory($id)
    {

        if (!empty($_POST['name'])) {
            $value = htmlspecialchars($_POST['name']);
            $stmt = $this->dbConnect()->prepare("UPDATE $this->table SET `name` = '$value' WHERE `id` = $id");
            $stmt->execute();

            //IF SUMITED
            $modified = 1;
        }

        if ($modified == 1) {
            header("location: /admin/commandes/categorie/$id?success=1");
        }
    }

    /**
     * add new command category on database
     * @return void 
     */
    function addCommandsCategory()
    {

        if (!empty($_POST['name'])) {
            $name = htmlspecialchars($_POST['name']);


            $stmt = $this->dbConnect()->prepare("INSERT INTO $this->table (`id`, `name`) VALUES (NULL, ?)");
            $stmt->execute(array($name));

            //IF SUMITED
            $modified = 1;
        }

        if ($modified == 1) {
            header("location: /admin/commandes/categorie?add=1");
        }
    }
}

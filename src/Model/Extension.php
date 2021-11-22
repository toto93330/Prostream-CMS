<?php

namespace Src\Model;

use Src\Entity\EntityExtension;

class Extension extends Model
{

    protected $table;
    protected $entity;

    function __construct()
    {
        $this->entity = new EntityExtension();
        $this->table = 'modul_extension';
    }

    function editExtensionPage()
    {

        if (!empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['firefox']) && !empty($_POST['chrome']) && !empty($_POST['actived'])) {
            $title = htmlspecialchars($_POST['title']);
            $content = htmlspecialchars($_POST['content']);
            $firefox = htmlspecialchars($_POST['firefox']);
            $chrome = htmlspecialchars($_POST['chrome']);
            $actived = htmlspecialchars($_POST['actived']);

            $stmt = $this->dbConnect()->prepare("UPDATE modul_extension SET title=? , content=? , linkextensionfirefox=? , linkextensionchrome=? , actived=? WHERE id=1");
            $stmt->execute(array($title, $content, $firefox, $chrome, $actived));

            //IF SUMITED
            $modified = 1;
        } else {
            header("location: /admin/extension?error=1");
        }

        if ($modified == 1) {
            header("location:  /admin/extension?success=1");
        }
    }
}

<?php

namespace Src\Model;

use Src\Entity\EntityPage;

class Page extends Model
{

    protected $table;
    protected $entity;

    function __construct()
    {
        $this->entity = new EntityPage();
        $this->table = 'modul_page';
    }


    function editPage()
    {

        if (!empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['actived'])) {
            $title = htmlspecialchars($_POST['title']);
            $content = htmlspecialchars($_POST['content']);
            $actived = htmlspecialchars($_POST['actived']);

            $stmt = $this->dbConnect()->prepare("UPDATE $this->table SET title=? , content=? , actived=? WHERE id=1");
            $stmt->execute(array($title, $content, $actived));

            //IF SUMITED
            $modified = 1;
        } else {
            header("location: /admin/page?error=1");
        }

        if ($modified == 1) {
            header("location:  /admin/page?success=1");
        }
    }
}

<?php

namespace Src\Model;

use Src\Function\Connexion;

/**
 * This Class is here for defined direction for all model and this class is abstract.
 * @author Anthony Alves <www.anthonyalves.fr>
 * @package Src\Model
 */

abstract class Model
{

    protected $table;
    protected $entity;


    /**
     * Return dbConnect() for connexion with singleton PDO style.
     * @return object
     */
    static protected function dbConnect()
    {
        return Connexion::dbConnect();
    }


    /**
     * For Hydrate items
     *       
     * @param array $donnees
     * @param string $entity
     * @param int $item
     * @return array
     */
    public function getInstance(array $donnees, $entity)
    {

        $entity = new $entity();

        foreach ($donnees as $key => $value) {
            // On récupère le nom du setter correspondant à l'attribut.
            $method = 'set' . ucfirst($key);
            // Si le setter correspondant existe.
            if (method_exists($entity, $method)) {
                // et si il detect que le setter dois contenir un object
                if (\preg_match('#ID$#', $method)) {

                    $list = null;
                    $table = substr($key, 0, -2);
                    $table = $this->table . "_" . $table;
                    $stmt = $this->dbConnect()->prepare("SELECT * FROM $table WHERE id = $value");
                    $stmt->execute();
                    $items = $stmt->fetchall();

                    foreach ($items as $articleRaw) {
                        $table = explode("_", $table);
                        $list[] = $this->getInstance($articleRaw, '\Src\Entity\Entity' . ucfirst($table[1]) . ucfirst($table[2]));
                    }

                    $method = 'set' . ucfirst($key);

                    $entity->$method($list[0]);
                } else {
                    // On appelle le setter.
                    $entity->$method($value);
                }
            }
        }

        return $entity;
    }

    /**
     * Find All defined items on database
     *
     * @return object
     */
    public function findAll()
    {
        $list = [];

        $stmt = $this->dbConnect()->prepare("SELECT * FROM $this->table");
        $stmt->execute();
        $items = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        foreach ($items as $articleRaw) {
            $list[] = $this->getInstance($articleRaw, $this->entity);
        }

        return $list;
    }


    /**
     * Remove Data
     * @param int
     * @return void
     */
    public function remove($id)
    {
        $stmt = $this->dbConnect()->prepare("DELETE FROM $this->table WHERE id = ?");
        $stmt->execute([$id]);
    }
}

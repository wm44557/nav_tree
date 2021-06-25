<?php

namespace app\tree;

use app\tree\Database;

class Tree
{

    public $data;
    protected $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function getAllItems()
    {
        $this->db->query("SELECT * FROM iai_tree");
        $res = $this->db->resultAll();
        return $res;
    }
    public function addNode($parent_id, $text)
    {
        $this->db->query('INSERT INTO `iai_tree` (`parent_id`, `text`) VALUES (:parent_id,:text)');
        $this->db->bindValue("parent_id", $parent_id);
        $this->db->bindValue("text", $text);
        $this->db->execute();
    }
    public function updateNode($parent_id, $id)
    {
        $this->db->query('UPDATE `iai_tree` SET `parent_id`=:parent_id WHERE `id`=:id');
        $this->db->bindValue("parent_id", $parent_id);
        $this->db->bindValue("id", $id);
        $this->db->execute();
    }
    public function deleteNode($node_id)
    {
        $this->db->query("DELETE FROM `iai_tree` WHERE id = :node_id ");
        $this->db->bindValue("node_id", $node_id);
        $this->db->execute();
    }
}

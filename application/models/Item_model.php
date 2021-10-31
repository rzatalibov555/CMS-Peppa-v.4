<?php

class Item_model extends CI_Model{

    public $tableName = "items";
    public $categoryTableName = "item_category";
    public $statusTableName = "item_status";


    public function __construct()
    {
        parent::__construct();
    }

    public function get_all(){
        return $this->db->get($this->tableName)->result();
    }

    public function get_all_item_category(){
        return $this->db->get($this->categoryTableName)->result();
    }

    public function get_all_item_status(){
        return $this->db->get($this->statusTableName)->result();
    }

}
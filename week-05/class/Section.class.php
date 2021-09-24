<?php

class Section
{
    public $db;
    
    public function __construct()
    {
        $this->db = new database\Database();
    }

    public function FindAll(array $data) // Get all data from table "sections"
    {
        return $this->db->findAll("section",$data);
    }

    public function sectionList() // Get all sections
    {
        return $this->db->all("section");
    }
 
    public function addSection(array $data) // Add new section
    {
        return  $this->db->create("section", $data);
    }

    public function updateSection(mixed $id, array $data) // Update section with given id with given values
    {
        return  $this->db->update("section", $id, $data);
    }

    public function deleteSection(mixed $id) // Delete section with given id
    {
        return $this->db->delete("section", $id);
    }
}
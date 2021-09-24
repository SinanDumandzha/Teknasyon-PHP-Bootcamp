<?php

class Book
{
    public $db;

    public function __construct()
    {
        $this->db = new database\Database();
    }
 
    public function FindAll(array $data){ // Get all data from table "book"
        return $this->db->findAll("book", $data);
    }

    public function bookList() // Get all books
    {
        return $this->db->all("book");
    }
 
    public function addBook(array $data) // Add book with given values
    {  
        return  $this->db->create("book", $data);
    }

    public function updateBook(mixed $id, array $data) // Update book with given values with given id 
    {
        return  $this->db->update("book", $id, $data);
    }
    
    public function deleteBook(mixed $id) // Delete book with given id
    {
        return $this->db->delete("book", $id);
    }
}

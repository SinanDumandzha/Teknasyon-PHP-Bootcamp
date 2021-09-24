<?php

class Post
{
    public $db;
    
    public function __construct()
    {
        $this->db = new database\Database();
    }

    public function FindAll(array $data) // Get all data from table "post"
    {
        return $this->db->findAll("post",$data);
    }
 
    public function  postList() // Get all posts
    {
        return $this->db->all("post");
    }

    public function addPost(array $data) // Add new post with given values
    {
        return  $this->db->create("post", $data);
    }

    public function updatePost(mixed $id, $data) // Update post with given id with given values
    {
        return  $this->db->update("post", $id, $data);
    }

    public function deletePost(mixed $id) // Delete post with given id
    {
        return $this->db->delete("post", $id);
    }
}

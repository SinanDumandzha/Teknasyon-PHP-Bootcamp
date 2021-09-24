<?php
require_once '../autoloader.php';
require_once('../class/Book.class.php');

if($_GET['id'])
{
    $book = new Book;
    $book->deleteBook($_GET['id']);
 
    Header('Location: index.php');
}




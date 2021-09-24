<?php
require_once '../autoloader.php';
require_once('../class/Book.class.php');

$book = new Book;
$books = $book->bookList();

if (isset($_POST['add'])) {

    $fields = [
        'name' => $_POST['name'],
        'summary' => $_POST['summary'],
        'author' => $_POST['author'],
        'page_count' => $_POST['page_count'],
        'image_url' => $_POST['image_url'],
        'created_at' => time(),
        'update_at' => time(),
    ];

    $book->addBook($fields);
    $r = 'New Book Added .';
    Header('Location: index.php');
}
<?php
require_once '../autoloader.php';
$section = new Section;

if(isset($_POST['name'])) {
    $book_id=$_GET['book'];
    $name=(string) $_POST['name'];
    $fields = [
        'book_id' => $book_id,
        'name' => $name,
    ];
    $section->addSection($fields);
    return header("Location: book.php?id=$book_id");
}
else{
    die("Post veri gönderim işlemi gereklidir.");
}
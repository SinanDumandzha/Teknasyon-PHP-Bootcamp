<?php
require_once '../autoloader.php';
require_once('../class/Section.class.php');
$section = new Section;

if(isset($_POST['name'])) {
    $section_id=$_GET['section'];
    $name=(string) $_POST['name'];
    $book_id=$_POST['book_id'];
    $fields = [
        'name' => $name,
    ];
    $section->updateSection($section_id,$fields);
    return header("Location: book.php?id=$book_id");
}
else{
    die("Post veri gönderim işlemi gereklidir.");
}
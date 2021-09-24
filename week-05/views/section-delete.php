<?php
require_once '../autoloader.php';
$section = new Section;
$book = new Book;
$posts = new Post;

if(isset($_GET['section'])) {
    $section_id=$_GET['section'];
    $section=$section->FindAll(["id"=>$section_id]);
    $book_id=$section[0]["book_id"];
    if($book!=false){
        //section id ye ait post var mı varsa section silineceği için onları booka kaydırıyoruz.
        $posts=$posts->FindAll(["section_id"=>$section_id]);
        if ($posts){
        foreach ($posts as $post){
            $post_update = new Post;
            $post_update=$post_update->updatePost($post["id"],["book_id"=>$book_id,"section_id"=>0]);
        }
        }
        //section silme işlemi
        $section = new Section;
        $section->deleteSection($section_id);
        //book sayfasına tekrar yönlendirdik
        return header("Location: book.php?id=$book_id");
    }
    else{
        echo "<div class='alert alert-danger' role='alert'><h4 class='alert-heading'>Error</h4>Section id not found!</div>";
        return header("Location: index.php");
    }
}
else{
    die("Veri gönderim işlemi gereklidir.");
}
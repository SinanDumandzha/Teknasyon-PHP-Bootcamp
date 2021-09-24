<?php
require "../autoloader.php";

$post=new Post;
$section=new Section;

if (isset($_GET["post"])){
    $post_id=$_GET["post"];

    $post=$post->FindAll(["id"=>$post_id]);

    if ($post[0]["book_id"]==0){
        $section=$section->FindAll(["id"=>$post[0]["section_id"]]);
        $book_id=$section[0]["book_id"];
    }
    else{
        $book_id=$post[0]["book_id"];
    }

    $post=new Post;
    $post=$post->deletePost($post_id);
    header("Location: book.php?id=$book_id");
}
else{
    die("Veri gönderimi zorunludur!");
}
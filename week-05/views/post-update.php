<?php
require_once '../autoloader.php';

$post = new Post;
$section = new Section;

if(isset($_POST['content'])) {
    $post_id=$_GET['post'];
    $author=(string) $_POST['author'];
    $content=(string) $_POST['content'];
    $post=$post->FindAll(["id"=>$post_id]);

    if ($post[0]["book_id"]==0){
        $section=$section->FindAll(["id"=>$post[0]["section_id"]]);
        $book_id=$section[0]["book_id"];
    }
    else{
        $book_id=$post[0]["book_id"];
    }

    $fields = [
        'author' => $author,
        'content' => $content,
    ];
    
    $post=new Post;
    $post->updatePost($post_id,$fields);
    return header("Location: book.php?id=$book_id");
}
else{
    die("Post veri gönderim işlemi gereklidir.");
}
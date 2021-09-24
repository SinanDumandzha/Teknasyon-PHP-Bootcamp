<?php
    require_once '../autoloader.php';
    require_once('../class/Post.class.php');
    require_once('../class/Section.class.php');

    $post = new Post;
    $section=new Section;

    if(isset($_POST['content'])) {
        $author=(string) $_POST["author"];
        $content=(string) $_POST["content"];

        if (isset($_GET["section"])){
            $section_id = $_GET['section'];
            $fields = [
                'section_id'=>$section_id,
                'author' => $author,
                'content' => $content,
            ];

            $section=$section->FindAll(["id"=>$section_id]);
            $book_id=$section[0]["book_id"];
        }
        elseif (isset($_GET["book"])){
            $book_id = $_GET['book'];
            $fields = [
                'book_id'=>$book_id,
                'author' => $author,
                'content' => $content,
            ];
        }
        
        $post->addPost($fields);
        return header("Location: book.php?id=$book_id");
}
else{
    die("Post veri gönderim işlemi gereklidir.");
}
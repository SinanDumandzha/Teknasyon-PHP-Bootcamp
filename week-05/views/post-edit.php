<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Post</title>
    <?php include ("header.php"); ?>
    <!-- Form -->
    <div class="container bg-light mb-5">
        <main>
          <h5 class="text-center text-dark p-3 mt-2">Edit Post</h5>
          <hr>
            <?php
            if (isset($_GET["post"]) || isset($_GET["book"])){
                require ("../autoloader.php");
                $post=new Post;
                $book=new Book;
                $section=new Section;
                $post=$post->FindAll(["id"=>$_GET["post"]]);
                
                if (!$post){
                    echo  "<div class='alert alert-danger' role='alert'><h4 class='alert-heading'>Error</h4>Post/Book id is wrong!</div>";
                    die;
                }
                $post_id=$_GET["post"];
            }
            ?>
          <form id="createPostForm" class="d-grid gap-2 col-6 mx-auto my-5" action="post-update.php?post=<?php echo $post_id; ?>" method="post">
            <div class="mb-2">
              <input class="form-control" id="author" type="text" placeholder="Author" name="author" value="<?php echo $post[0]['author']; ?>"/>
            </div>
            <div class="mb-2">
              <textarea class="form-control" id="content" type="text" placeholder="Content" name="content" style="height: 18rem"><?php echo $post[0]['content']; ?></textarea>
            </div>
            <div class="d-grid">
              <button class="btn btn-info text-light" type="submit" name="create" >Update</button>
            </div>
          </form>
        </main>
    </div>
    <!-- Form -->
    <?php include ("footer.php"); ?>
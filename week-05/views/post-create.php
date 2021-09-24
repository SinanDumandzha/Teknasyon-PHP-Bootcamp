<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create Post</title>
    <?php include ("header.php"); ?>
    <!-- Form -->
    <div class="container bg-light mb-5">
        <main>
          <h5 class="text-center text-dark p-3 mt-2">Create Post</h5>
          <hr>
            <?php
            if(!isset($_GET["section"]) && !isset($_GET["book"])){
                echo  "<div class='alert alert-danger' role='alert'><h4 class='alert-heading'>Error</h4>Book/Section id is wrong!</div>";
                die();
            }
            else{
                if (isset($_GET["section"])){
                    $section_id=$_GET["section"];
                    echo "<form id='createPostForm' class='d-grid gap-2 col-6 mx-auto my-5' action='post-store.php?section=$section_id' method='post'>";
                }
                elseif(isset($_GET["book"])){
                    $book_id=$_GET["book"];
                    echo "<form id='createPostForm' class='d-grid gap-2 col-6 mx-auto my-5' action='post-store.php?book=$book_id' method='post'>";
                }
            }
            ?>

            <div class="mb-2">
              <input class="form-control" id="author" type="text" placeholder="Author" name="author" value=""/>
            </div>
            <div class="mb-2">
              <textarea class="form-control" id="content" type="text" placeholder="Content" name="content" style="height: 18rem"></textarea>
            </div>
            <div class="d-grid">
              <button class="btn btn-info text-light" type="submit" name="create" >Create</button>
            </div>
          </form>
        </main>
    </div>
    <!-- Form -->
    <?php include ("footer.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create Section</title>
    <?php include ("header.php"); ?>
    <!-- Form -->
    <div class="container bg-light mb-5">
        <main>
            <h5 class="text-center text-dark p-3 mt-2">Create Section</h5>

            <?php
            if(isset($_GET["book"])){
                require_once '../autoloader.php';
                require_once('../class/Book.class.php');

                $book = new Book;
                $book=$book->FindAll(["id"=>$_GET["book"]]);
                
                if ($book==false){
                    echo  "<div class='alert alert-danger' role='alert'><h4 class='alert-heading'>Error</h4>Book id is wrong!</div>";
                    die;
                }
                else{
                    $book_name=$book[0]["name"];
                    $book_author=$book[0]["author"];
                    $book_image_url=$book[0]["image_url"];
                    $createdate=date('d.m.Y h:mA', strtotime($book[0]['created_at']));
                    echo "
                        <div class='container'>
                            <div class='card mb-12''>
                            <div class='row g-0'>
                                <div class='col-md-2'>
                                <img src='$book_image_url'  class='img-fluid rounded-start' alt='Book Image'>
                                </div>
                                <div class='col-md-10'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$book_name</h5>
                                    <p class='card-text'>Author: $book_author</p>
                                    <p class='card-text'><small class='text-muted'>Created at $createdate</small></p>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>";
                }
            }
            else{
                echo "<div class='alert alert-danger' role='alert'><h4 class='alert-heading'>Error</h4>Book id is wrong!</div>";
                die;
            }
            ?>

            <hr>
            <h5 class="text-center text-dark p-3 mt-2">Add New Section</h5>
            <form id="editSectionForm" class="d-grid gap-2 col-6 mx-auto my-3" action="section-store.php?book=<?php echo $_GET['book'];?>" method="post">
                <div class="mb-2">
                    <input class="form-control" id="name" type="text" placeholder="Section Name" name="name" value=""/>
                </div>
                <div class="d-grid">
                    <button class="btn btn-info text-light" type="submit" name="create" >Save</button>
                </div>
            </form>
        </main>
    </div>
<!-- Form -->
<?php include ("footer.php"); ?>
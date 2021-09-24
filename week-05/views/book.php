<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU"
      crossorigin="anonymous"
    />
      <style type="text/css">
          body {
              height: 100%;
              margin: 0;
          }
          html {
              padding-bottom: 50px;
              min-height: 100%;
              box-sizing: border-box;
              -moz-box-sizing: border-box;
              position: relative;
          }

          footer {
              position: absolute;
              bottom: 0;
              left: 0;
              right: 0;
              height: 73px;
              background-color: red;
          }
      </style>
    <title>Book Page</title>
  </head>
  <body class="bg-light">
      <!-- Header -->
      <nav class="navbar navbar-expand-lg navbar-warning bg-warning">
        <div class="container">
          <a class="navbar-brand text-light" href="index.php">
            <img
              src="https://scontent.fsof10-1.fna.fbcdn.net/v/t1.18169-9/22853144_321854368280724_921982228724781455_n.png?_nc_cat=111&ccb=1-5&_nc_sid=174925&_nc_ohc=uxiBkjhiXJ8AX__96X0&_nc_ht=scontent.fsof10-1.fna&oh=0dfcb8ee3e647bc65838d5ec98c93992&oe=6166FE4A"
              alt=""
              width="30"
              height="32"
              class="d-inline-block align-text-top"
            />
            HW5-Group1
          </a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link text-dark" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link btn btn-info text-dark ms-2" href="book-create.php">Add New Book</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- Header -->
    <div class="container bg-light mb-5">
      <main>
        <!-- Book Info -->
        <section>
          <?php
            require ("../autoloader.php");

            $book = new Book;

            if(isset($_GET["id"])) {
              $book_id = $_GET["id"];
              $book = new Book;
              $book_id = $_GET["id"];
              $book = $book->FindAll(["id"=>$book_id]);

              if (!$book) {
                echo "<div class='alert alert-danger mt-5' role='alert'><h4 class='alert-heading'>Error<h4>Book id is wrong!</div>";
                die();
              } else {
                $name=$book[0]["name"];
                $author=$book[0]["author"];
                $summary=$book[0]["summary"];
                $page_count=$book[0]["page_count"];
                $image_url=$book[0]["image_url"];
                $createdate = date('d.m.Y h:mA', strtotime($book[0]["created_at"]));
                
                echo "
                        <div class='row my-5 justify-content-center'>
                          <div class='col-md-6 text-end px-5'>
                              <img src='$image_url' class='img-fluid' alt='' />
                          </div>
                          <div class='col-md-6 mt-2 px-5'>
                            <div class='book-name'>
                              <h6>Name</h6>
                              <i>$name</i>
                            </div>
                          <div class='author mt-4'>
                            <h6>Author Name</h6>
                            <i>$author</i>
                          </div>
                          <div class='book-info mt-4'>
                            <h6>Summary</h6>
                            <i>$summary</i>
                          </div>
                          <div class='book-pages mt-4'>
                            <h6>Pages:</h6>
                            <i>$page_count</i>
                          </div>
                          <div class='createdAt mt-4'>
                            <h6>Created at:</h6>
                            <i>$createdate</i>
                          </div>
                        </div>
                      </div>
                      <div class='row'>
                        <div class='col-md-6'>
                          <div class='btns d-flex justify-content-end mx-5 p-2'>
                            <a type='button' href='book-edit.php?id=$book_id' class='btn btn-success'>Book Edit</a>
                            <a type='button' href='book-delete.php?id=$book_id' class='btn btn-danger ms-1'>Book Delete</a>
                            </div>
                          </div>
                        <div class='col-md-6'>
                      <div class='addBtn mx-5 p-2'>
                        <a type='button' href='section-create.php?book=$book_id' class='btn btn-info text-light'>Add Section</a>
                        <a type='button' href='post-create.php?book=$book_id' class='btn btn-primary'>Add Post</a>";
                  }
              }
              else{
                  echo "<div class='alert alert-danger mt-5' role='alert'><h4 class='alert-heading'>Error</h4>Book id is wrong!</div>";
                  die();
              }
              ?>

              </div>
        </section>
        <!-- Book Sections -->
        <div class="row mt-5">
          <div class="col-md-12 px-5">
            <section>
                <?php
                    $sections=new Section;
                    $book_id = $_GET["id"];
                    $sections=$sections->FindAll(['book_id'=>$book_id]);

                    if ($sections){
                        echo "<hr><h4 class='text-center'>Book Sections:</h4>";
                        foreach ($sections as $section){
                            $section_id=$section["id"];
                            $section_name=$section["name"];
                            echo "<hr>
                            <h5 class='card-title'>$section_name
                            <a type='button' class='btn btn-success btn-sm' href='section-edit.php?section=$section_id'>Section Edit</a>
                            <a type='button' class='btn btn-danger btn-sm' href='section-delete.php?section=$section_id'>Section Delete</a>
                            <a type='button' class='btn btn-info btn-sm' href='post-create.php?section=$section_id'>Add Post</a>
                            </h5><hr>";

                            $posts=new Post;
                            $posts=$posts->FindAll(['section_id'=>$section_id]);
                            if ($posts){
                              foreach ($posts as $post) {
                                $post_id=$post["id"];
                                $post_author=$post["author"];
                                $post_content=$post["content"];
                                $post_created_at=$post["created_at"];
                                $post_updated_at=$post["updated_at"];

                                echo "
                                  <div class='card-text mt-2' style='border:1px solid gray ;border-radius:10px; padding: 15px;'>
                                    <p class='card-text'><b>Author:</b> <i>$post_author</i>,<b>Creat date:<b> <i>$post_created_at</i>";
                                      if (($post_updated_at)!=0){ echo ",<b>Update date:<b<i>$post_updated_at<i>
                                        </p>";}
                                      echo "
                                      </p><span>$post_content</span>
                                        <p class='mt-3'>
                                          <a type='button' class='btn btn-success btn-sm' href='post-edi php?post=$post_id'>Post Edit</a>
                                          <a type='button' class='btn btn-danger btn-sm href='post-deletephp?post=$post_id'>Post Delete</a>
                                        </p>
                                    </div>";
                                }
                            }
                        }
                    }

                        $posts = new Post;
                        $posts = $posts->FindAll(['book_id' => $_GET["id"]]);
                        
                        if ($posts) {
                            foreach ($posts as $post) {
                                $post_id = $post["id"];
                                $post_author = $post["author"];
                                $post_content = $post["content"];
                                $post_created_at = $post["created_at"];
                                $post_updated_at = $post["updated_at"];

                                echo "
                                    <hr>
                                    <div class='card-text' style='border:1px solid gray ; border-radius:10px; padding: 15px;'>
                                        <p class='card-text'><b>Author:</b> <i>$post_author</i>,<b>Create date:</b> <i>$post_created_at</i>";
                                if (($post_updated_at) != 0) {
                                    echo ",<b>Update date:</b> <i>$post_updated_at</i></p>";
                                }
                                echo "
                                      </p><span>$post_content</span>
                                      <p class='mt-3'>
                                        <a type='button' class='btn btn-success btn-sm' href='post-edit.php?post=$post_id'>Post Edit</a>
                                        <a type='button' class='btn btn-danger btn-sm' href='post-delete.php?post=$post_id'>Post Delete</a>
                                      </p>
                                    </div>";
                            }
                        }
                ?>

              </div>
            </section>
            <!-- Posts Sections-->
          </div>
      </div>

<?php include ("footer.php"); ?>
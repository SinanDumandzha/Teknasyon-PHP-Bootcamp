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
      crossorigin="anonymous"/>
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
    <title>Books App</title>
  </head>
  <body class="bg-light">
      <!-- Header -->
      <nav class="navbar navbar-expand-lg navbar-warning bg-warning mb-5">
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
    <div class="container bg-light">
      <main>
        <!-- Carousel & Banners -->
          <!-- Carousel
          <div class="row">

          <div class="col-md-8 mb-5">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-indicators">
                <button
                  type="button"
                  data-bs-target="#carouselExampleIndicators"
                  data-bs-slide-to="0"
                  class="active"
                  aria-current="true"
                  aria-label="Slide 1"
                ></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
              </div>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <div class="d-flex justify-content-center">
                    <img src="https://m.media-amazon.com/images/I/51Z1TpSzCwS.jpg" class="d-block w-20" alt="" />
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="d-flex justify-content-center">
                    <img src="https://m.media-amazon.com/images/P/B08HHQHSNH.01._SCLZZZZZZZ_SX500_.jpg" class="d-block w-20" alt="" />
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="d-flex justify-content-center">
                    <img src="https://m.media-amazon.com/images/P/B085ZZFKBV.01._SCLZZZZZZZ_SX500_.jpg" class="d-block w-20" alt="" />
                  </div>
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
          <!-- Carousel
          <!-- Banners
          <div class="col-md-4 mt-4">
            <div class="row col-md-12">
              <img src="https://images-na.ssl-images-amazon.com/images/G/01/kindle/Content_Grid2_750x375.jpg" class="img-fluid" alt="" />
            </div>
            <div class="row my-5 col-md-12">
              <img src="https://images-na.ssl-images-amazon.com/images/G/01/kindle/Content_Grid2_750x375-2.jpg" class="img-fluid" alt="" />
            </div>
          </div>
          <!-- Banners
        </div>-->
        <!-- Books List -->
        <section>
          <!-- Title -->
          <h3 class="text-center">Books List</h3>
          <!-- Title -->
          <!-- Cards -->
          <div class="row my-5">
            <?php
            require ("../autoloader.php");
            $books=new Book;
            $books=$books->bookList();
            if (!$books){
                echo "<div class='alert alert-info' role='alert'>
                  <h4 class='alert-heading'>Welcome Book Web Page!</h4>
                  <hr>
                  <p class='mb-0'>There is no book on the site yet</p>
                </div>";
            }
            foreach ($books as $book){
                echo "
                <div class='col-md-3 mb-5'>
              <div class='card mx-auto' style='width: 13rem'>
                <img src='$book[image_url]' class='card-img-top mt-1' alt='' style='height: 14rem' />
                <div class='card-body text-center'>
                  <h5 class='card-title'>$book[name]</h5>
                  <p class='card-text'>$book[author]</p>
                  <a href='book.php?id=$book[id]' class='btn btn-warning'>Details...</a>
                  <p class='mt-3'>
                  <a href='book-edit.php?id=$book[id]' class='btn btn-primary me-3'><i class='bi bi-pencil-square'></i></a>
                  <a href='book-delete.php?id=$book[id]' class='btn btn-danger'><i class='bi bi-trash'></i></a>
                  </p>
                </div>
              </div>
            </div>
                ";
            }
            ?>
            
          </div>
          <!-- Cards -->
        </section>
        <!-- Most Populer Books Section -->

      </main>
    </div>

<?php include ('footer.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Create Book</title>
    <?php include ("header.php"); ?>
    <!-- Form -->
    <div class="container bg-light mb-5">
      <main class="mx-auto">
        <h5 class="text-center text-dark p-3 mt-2">Create Book</h5>
        <hr>
        <form id="book-create" class="d-grid gap-2 col-6 mx-auto my-5" action="book-store.php" method="post">
          <div class="mb-2">
            <input class="form-control" id="name" type="text" placeholder="Name" name="name" value="" />
          </div>
          <div class="mb-2">
            <input class="form-control" id="author" type="text" placeholder="Author" name="author" value="" />
          </div>
          <div class="mb-2">
            <textarea class="form-control" id="summary" type="text" placeholder="Summary" name="summary" style="height: 11rem"></textarea>
          </div>
          <div class="mb-2">
            <input class="form-control" id="page_count" type="number" placeholder="Page Count" name="page_count" value="" />
          </div>
          <div class="mb-2">
            <input class="form-control" id="image_url" type="text" placeholder="Image Url" name="image_url" value="" />
          </div>
          <div class="d-grid">
            <button class="btn btn-info text-light" type="submit" name="add">Add</button>
          </div>
        </form>
    </main>
  </div>
  <!-- Form -->
<?php include("footer.php");
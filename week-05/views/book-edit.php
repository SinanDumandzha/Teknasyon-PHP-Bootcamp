<?php
require_once '../autoloader.php';

if(!isset($_GET['id']))
{
exit("ID bulunamadı.");
}
$book =new Book;
try{
$bookdata = $book->FindAll(["id"=>$_GET['id']]); 
}catch(Exception $e){ 
exit("İçerik bulunamadı.");
}

$bookdata=$bookdata[0];

if($_POST["name"]){
$updateArray = [];
foreach($_POST as $key => $val){
$updateArray[$key] = $val;
}

$checkUpdate = $book->updateBook($_GET['id'],$updateArray);
$bookdata = $book->FindAll(["id"=>$_GET['id']]); 
$bookdata=$bookdata[0];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Book Edit</title>
  <?php include ("header.php"); ?>
  <!-- Form -->
  <div class="container bg-light mb-5">
    <main class="mx-auto">
      <h5 class="text-center text-dark p-3 mt-2">Book Edit</h5>
      <hr>
      <form id="book-create" class="d-grid gap-2 col-6 mx-auto my-5" method="post">
        <div class="mb-2">
          <input class="form-control" id="name" type="text" placeholder="Name" name="name" value="<?= $bookdata["name"] ?>" />
        </div>
        <div class="mb-2">
          <input class="form-control" id="author" type="text" placeholder="Author" name="author" value="<?= $bookdata["author"] ?>" />
        </div>
        <div class="mb-2">
          <textarea class="form-control" id="summary" type="text" placeholder="Summary" name="summary" style="height: 11rem"><?= $bookdata["summary"] ?></textarea>
        </div>
        <div class="mb-2">
          <input class="form-control" id="page_count" type="number" placeholder="Page Count" name="page_count" value="<?= $bookdata["page_count"] ?>" />
        </div>
        <div class="mb-2">
          <input class="form-control" id="image_url" type="text" placeholder="Image Url" name="image_url" value="<?= $bookdata["image_url"] ?>" />
        </div>
        <div class="d-grid">
          <button class="btn btn-info text-light" type="submit">Save</button>
        </div>
      </form>
	  <div class="text-center" style="font-size:30px;">
      <?php 
      if($_POST["name"]){
        if(isset($checkUpdate)){
        echo '<span style="color:green;">Güncellendi...</span>';
        }else{
        echo '<span style="color:red;">Hata =( ...</span>';
      }
      } 
      ?>
      </div>
    </main>
  </div>
<?php include("footer.php");
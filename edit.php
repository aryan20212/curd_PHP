<?php
include "conn.php";
include "navbar.php";

if (isset($_POST['update'])) {
  $title = $_POST['title'];
  $desc = $_POST['desc'];
  $id = $_POST['sno'];

  $sql = "UPDATE `todo_app` SET `title` = '$title', `description` = '$desc' WHERE `todo_app`.`sno` = $id";
  $result = mysqli_query($con,$sql);
  header("location:index.php");
}

if(isset($_GET['id'])){
  $id = $_GET['id'];
  $query = "SELECT * FROM `todo_app` WHERE `sno`=$id";
  $result = mysqli_query($con,$query) ;
  if (!$result) {
    die("Error" . mysqli_error($con));
  }
  $title = mysqli_fetch_assoc($result);
}



  //     $title = $_POST['title'];
//     $desc = $_POST['desc'];
//     $query = "UPDATE `todo_app` SET `title` = '$title' , `description` = '$desc' WHERE `sno` = '$id' ";
//     $result = mysqli_query($con,$query);
//     if ($result) {
//         echo "updated";
//     }
//     else{
//         echo "Failed " . mysqli_error($con);
//     }

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="Bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d3882cfae1.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

    <title>Your -Notes</title>
  </head>
  <body>
<div class="container my-4">
    <form action="/crud/edit.php" method="POST">
    <h1>Add a Note</h1>
  <div class="mb-3">
    <label for="exampleInputEmail1"  class="form-label">Title</label>
    <input type="text" value="<?php echo $title['title']; ?>" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Description</label>
    <textarea name="desc" cols="5" rows="3" class="form-control" id="exampleInputPassword1"><?php echo $title['description']; ?></textarea>
    <input type="text" name="sno" id="sno"  value="<?php echo $title['sno'] ?>" >
  </div>
  <button type="submit" name="update" class="btn btn-secondary mb-4">Save note</button>
</form>
</div>
  </body>
  <style>
  #sno{
    visibility: hidden;
  }
  </style>
</html>

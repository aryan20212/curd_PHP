<?php
include "conn.php";

if(count($_POST)!=0)
{

  extract($_POST);
  $title = $_POST['title'];
  $desc = $_POST['desc'];
  $query = "INSERT INTO `todo_app` (`sno`, `title`, `description`) VALUES (NULL, '$title', '$desc')";
  $result = mysqli_query($con,$query);
} 

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="Bootstrap.css">
    <script src="https://kit.fontawesome.com/d3882cfae1.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Your -Notes</title>
  </head>
  <body>
    <?php include "navbar.php"; 
    ?>

    <div class="container my-4">
    <form action="/crud/index.php" method="POST">
    <h1>Add a Note</h1>
  <div class="mb-3">
    <label for="exampleInputEmail1" autocomplete="off"  class="form-label">Title</label>
    <input type="text" class="form-control col-md-6" name="title" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Description</label>
    <textarea rows="3" cols="10" name="desc" class="form-control" id="exampleInputPassword1"></textarea>
  </div>
  <button type="submit" class="btn btn-secondary mb-4">Add Note</button>
</form>
<a href="export.php"><button class="btn btn-success mb-4">Download Your List</button></a>


<table class="table tableofaa table-striped">
  <thead>
    <tr>
      <th scope="col">Sno</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $query = "SELECT * FROM `todo_app`";
  $result = mysqli_query($con, $query);

  $sno = 0;
    while($data = mysqli_fetch_assoc($result)){
      $sno = $sno+1;
        echo '<tr>
        <th scope="row">'. $sno .'</th>
        <td>'. $data['title'].'</td>
        <td>'. $data['description'] .'</td>
        <td> <a href="edit.php?id='.$data['sno'].'"> <button class="btn btn-success py-1 px-2 ">Edit<i class="fas fa-edit" ></i></button></a>  <a href="delete.php?id='.$data['sno'].'"> <button class="btn btn-danger py-1 px-2 ">Delete<i class="fa fa-trash"></i></button></a></td>
      </tr>';
    }
  ?>

<!-- <a href="/crud/edit.php?id='.$data['sno'].'"><i class="fas fa-edit"></i></a> -->
    <!-- <tr>
      <th scope="row"></th>
      <td>Jacob </td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr> -->
  </tbody>
</table>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

  </body>
  <script>
  $(document).ready( function () {
    $('.tableofaa').DataTable();
} );
  </script>
  <style>
  .odd{
    border-color: #d0dae2;
}
  .even{
    border-color: #d0dae2;
  }
  input{
    width:75%;
    border:2px solid #aaa;
    border-radius:4px;
    outline:none;
    padding:2px;
    box-sizing:border-box;
    transition:.3s;
  }
  input:focus{
    border-color:dodgerBlue;
    box-shadow:0 0 8px 0 dodgerBlue;
  }
  </style>

</html>
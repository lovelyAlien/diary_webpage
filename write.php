<?php
require "lib/db.php";
require "config/config.php";
$conn = db_init($config["host"], $config["duser"], $config["dpw"], $config["dname"]);
$result = mysqli_query($conn, "SELECT * FROM topic");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/diary/style.css">
    <title>My Diary</title>
</head>
<body>
<div class="container">
  <!-- Content here -->
  <header class= "jumbotron text-center" >
    <img src="/diary/me.jpg" alt="profile" class="rounded-circle" id="logo">
    <h1><a href="/diary/index.php">Jaeseung Choun</a></h1>
  </header>

  <div class="row">
    <nav clas="col-md-3">
      <ol>


      </ol>
    </nav>
    <div class="col-md-9">
      <article>


        <form action="process.php?mode=insert" method = "post">
          <div class="form-group">
              <label for="form-author">작성자</label>
              <textarea type="text" class="form-control" name="author" id="form-author" placeholder="작성자를 적어주세요."></textarea>
          </div>

          <div class="form-group">
              <label for="form-content">내용</label>
              <textarea class="form-control" rows="10" name="content" id="form-content" placeholder="내용을 적어주세요."></textarea>
          </div>

          <input type="submit">
        </form> 

        



      </article>
      <hr>
      <div id="control">  
        <input type="button" class="btn btn-light" value="white">
        <input type="button" class="btn btn-dark" value="black">
        <a href="/diary/write.php" class="btn btn-success">쓰기</a>
        
      </div>

    </div>
  </div>
</div>
</body>
 <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</html>

<?php
require "lib/db.php";
require "config/config.php";
$conn = db_init($config["host"], $config["duser"], $config["dpw"], $config["dname"]);
$result = mysqli_query($conn, "SELECT * FROM topic");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
      <ol class="nav flex-column nav-pills">
        <?php
while ($row = mysqli_fetch_assoc($result)) {
    echo '<li><a href= "/diary/index.php?id=' . $row['id'] . '"</li>' .htmlspecialchars(date_format(new DateTime($row['created']), 'Y-m-d')).'</a></li>' . "\n";
}
?>

      </ol>
    </nav>
    <div class="col-md-9">
      <article>
        <?php
if (empty($_GET['id']) === false) {
    $sql = "SELECT topic.id, content, name, created FROM topic LEFT JOIN user ON topic.author=user.id WHERE topic.id=" . $_GET['id'];
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    echo '<h2>' . htmlspecialchars(date_format(new DateTime($row['created']), 'Y-m-d')) . '</h2>';
    echo '<p>' . htmlspecialchars($row['name']) . '</p>';
    echo strip_tags(nl2br($row['content']), '<a><h1><h2><h3><h4><h5><ul><ol><li><br>');

    

}
else{
  echo '<h1>그대도 오늘</h1>';
  echo '<h2>어휜</h2>';
  echo '무한히 낙담하고 <br>자책하는 그대여 <br>끝없이 자신의 쓸모를 <br>의구하는 영혼이여 <br>고갤 들어라 <br>그대는 오늘 누군가에게 위로였다.';
}
?>





      </article>
      <hr>
      
      <div id="control">
        <input type="button" class="btn btn-light" value="white">
        <input type="button" class="btn btn-dark" value="black">
        <a href="/diary/write.php" class="btn btn-success">쓰기</a>
        <?php
          if(!empty($_GET['id'])){
        ?>
        <a href="modify.php?id=<?=$_GET['id']?>" class="btn btn-primary">수정</a> 
        <form action="process.php?mode=delete" method="POST" class="btn btn-danger">
          <input type="hidden" name="id" value="<?=$_GET['id']?>" />
          <input type="submit" value="삭제" style="color : white; background: transparent;  border: none; outline: 0;">
        </form>
        <?php
          }
        ?>
      </div>


    </div>
  </div>
</div>
  <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>
</html>

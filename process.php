<?php
require("lib/db.php");
require("config/config.php");
$conn = db_init($config["host"],$config["duser"],$config["dpw"],$config["dname"]);

switch($_GET['mode'])
{
    case 'insert':
        $sql = "SELECT * FROM user WHERE name='".$_POST['author']."'";
        $result= mysqli_query($conn, $sql);
        if($result->num_rows==0){
            $sql="INSERT INTO user(name, password) VALUES('".$_POST['author']."','111111')";
            mysqli_query($conn, $sql);
            $user_id= mysqli_insert_id($conn);
        }
        
        else{
            $row =mysqli_fetch_assoc($result);
            $user_id= $row['id'];
        }
        
        $sql = "INSERT INTO topic(content, author, created) VALUES('".$_POST['content']."','".$user_id."',now())";
        mysqli_query($conn, $sql);
        header('Location:http://localhost/diary/index.php');
        break;
    case 'delete':
        $sql = "DELETE FROM topic WHERE id=".$_POST['id'];
        mysqli_query($conn, $sql);
        header('Location:http://localhost/diary/index.php');
        break;
    case 'modify': 
        $sql = "SELECT * FROM user WHERE name='".$_POST['author']."'";
        $result= mysqli_query($conn, $sql);
        if($result->num_rows==0){
            $sql="INSERT INTO user(name, password) VALUES('".$_POST['author']."','111111')";
            mysqli_query($conn, $sql);
            $user_id= mysqli_insert_id($conn);
        }
        else{
            $row =mysqli_fetch_assoc($result);
            $user_id= $row['id'];
        }
        $sql="UPDATE topic SET author=".$user_id.", content='".$_POST['content']."' WHERE id=".$_POST['id'];
        mysqli_query($conn, $sql);
        header("Location:http://localhost/diary/index.php?id={$_POST['id']}");
        break;
}
?>
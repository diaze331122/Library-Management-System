<?php
 session_start();
 include '../database/connect_database.php';
 $connection = new mysqli($servername,$database_username,$database_password,$database);
 $title;
 $author;
 $subject;
 $publish_date;
 $status;
 $publisher;
 $language;
 $isbn;
 $issn;
 $description;
 $id = get($connection,'i');
 $media = get($connection,'m');
 
 if ($media == 'book' || $media == 'audio book'){
 $sql = "SELECT title, GROUP_CONCAT(DISTINCT author SEPARATOR ', ') AS author, ".
        "GROUP_CONCAT(DISTINCT subject SEPARATOR ', ') AS subject, publish_date, ".
        "media, status, publisher, language, isbn, description ".
        "FROM book_media_details ".
        "WHERE id='$id' ".
        "GROUP BY id ";
   
     $result = $connection->query($sql);
     $num_results = $result->num_rows;
 
     if ($num_results > 0){
        while($row = $result->fetch_assoc()){
          $title = $row['title'];
          $author = $row['author'];
          $subject = $row['subject'];
          $publish_date = $row['publish_date'];
          $media = $row['media'];
          $status = $row['status'];
          $publisher = $row['publisher'];
          $language = $row['language'];
          $isbn = $row['isbn'];
          $description = $row['description'];
        }
     }
 }
 if ($media == 'article'){
 $sql = "SELECT title, GROUP_CONCAT(DISTINCT author SEPARATOR ', ') AS author, ".
        "GROUP_CONCAT(DISTINCT subject SEPARATOR ', ') AS subject, publish_date, ".
        "media, status, publisher, language, issn, description ".
        "FROM article_media_details ".
        "WHERE id='$id' ".
        "GROUP BY id ";

     $result = $connection->query($sql);
     $num_results = $result->num_rows;
 
     if ($num_results > 0){
        while($row = $result->fetch_assoc()){
          $title = $row['title'];
          $author = $row['author'];
          $subject = $row['subject'];
          $publish_date = $row['publish_date'];
          $media = $row['media'];
          $status = $row['status'];
          $publisher = $row['publisher'];
          $language = $row['language'];
          $issn = $row['issn'];
          $description = $row['description'];
        }
     }
 }

function get($connection,$var){
  $_GET[$var] = trim($_GET[$var]);
  $_GET[$var] = stripslashes($_GET[$var]);
  $_GET[$var] = htmlspecialchars($_GET[$var]);
  return $connection->real_escape_string($_GET[$var]);
}

$connection->close();
?>
<html>
  <head>
     <?php include '../template/template.php';?>
     <link rel='stylesheet' type='text/css' href='../../css/resource.css'>
  </head>
  <body>
     <div class='container'>
        <div class='row'>
           <div class='col-sm-2'>
              <img src='../../images/book_icon.png'>
              <br>
              <?php
               if (isset($_SESSION["login"]) && $_SESSION["login"] == "Ok"){
                  echo '<button id="add_bookmark" onclick="add('.$id.')">Add to Bookmark</button>';
                  echo '<p id="response"></p>';
               } 
              ?>
           </div>
           <div class='col-sm-10'>
              <?php
                 echo '<h2>' .$title .'</h2>';
                 echo '<br>';
                 echo '<ul>';
                 echo '<li class="info">Authors: '. $author .'</li>';
                 echo '<li class="info">Subjects: '. $subject .'</li>';
                 echo '<li class="info">Publisher: '. $publisher .'</li>';
                 echo '<li class="info">Publish Date: '. $publish_date .'</li>';
                 echo '<li class="info">Description: '. $description .'</li>';
                 echo '<li class="info">Media: '. $media .'</li>';
                 echo '<li class="info">Language: '. $language .'</li>';
                 echo '<li class="info">Status: '. $status .'</li>';
                 if ($media == 'book' || $media == 'audio book'){
                    echo '<li class="info">ISBN: '. $isbn .'</li>';
                 }else{
                    echo '<li class="info">ISSN: '. $issn .'</li>';
                 }
                 echo '</ul>';
              ?>
           </div>
        </div>
     </div>
     <script src="../../js/add_bookmark.js"></script>
  </body>
</html>

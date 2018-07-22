<?php
 session_start();
?>
<html>
<head>
 <title>Contact Us</title>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="../../css/contact.css">
</head>
<body>
<?php include '../template/template.php';?>
 <div class="container">
    <div class="row>
         <form>
  	     <div class="form-group">
                <div class="col-sm-6">
                <h3>Contact Us!</h3>
                <p>Have questions? Contact us at (xxx)xxx-xxxx or you can submit the form below.</p>
                <form>
  		<label for="title">Title</label>
  		<input id="title" name="title" type="text" class="form-control"></input><br>
  		<label for="email">Email</label>
  		<input id="email" name="email "type="email" class="form-control"></input><br>
  		<label for="description">Problem Description</label>
  		<textarea id="description" name="description" class="form-control input-lg"></textarea><br>
  		<button type="submit" class="btn btn-default">submit</button>
                </form>
                </div>
  	    </div>
  	</form>
      <div class="col-sm-6">
          <h4>You can also contact us through social media!</h4>
          <a href="#" class="fa fa-facebook"></a>
          <a href="#" class="fa fa-twitter"></a>
      </div>
     </div>
    </div>
</body>
</html>

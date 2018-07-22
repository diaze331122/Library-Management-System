<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
          <div class="row">
                <div class="col-sm-2">
		<div class="navbar-header">
		 	<a class="navbar-brand" href="home.php">BookShare!</a>
		</div>
                </div>
                <div class="col-sm-7">
		<form class="navbar-form navbar-left" action="search_page.php" method="post">
        	   <input id="search_bar" type="text" class="form-control" placeholder="Search" name="search">    	
      	 	   <button type="submit" class="btn btn-default">search</button>
    	        </form>
                </div>
                <div class="col-sm-3">
		<ul class="nav navbar-nav">
                           <?php
                              if (!(isset($_SESSION["login"]) && $_SESSION["login"] == "Ok")){
                                 echo '<li class="text-center">Hello, guest!&nbsp;</li>';
                                 echo '<li class="text-center"><a data-toggle="modal" href="#form-modal">Login/Sign Up</a></li>';
                                 include 'login_register_modal.php';
                              }else{
                                 echo '<li>Hello, '. $_SESSION["username"] .'</li>';
                                 echo '<li><a href="../website_main_pages/account_details.php">My Account</a></li>';
                                 echo '<li><a href="../database/logout.php">Logout</a></li>';
                              }
                          ?>
	       </ul>
               </div>
           </div>
	</div>
</nav>

<!--This is the file which is used for the add data front end -->

<!-- Check if what was entered was an error (missing info usually because the form is validated with JS -->
<?php
  if (!empty($_GET["error"]))
    $error = $_GET["error"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>World Contacts - Add Data</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>


<!-- Nav Bar Start -->
<nav class="teal darken-1" role="navigation">
  <a id="logo-container" href="index.html" class="brand-logo" style = "position:absolute; left:80px">
    <i class="material-icons">contacts</i>
  </a>
  <div class="nav-wrapper container">
      <form method = "post" action="searchResults.php">
        <div class="input-field">
          
          <input id="search" type="search" name = "searchTerm" required>
          <label for="search"><i class="material-icons" style="position:relative; bottom: 7px">search</i></label>
          <i class="material-icons" style="position:relative; left: 876px; top: -67px; max-width:24px; max-height:24px ">close</i>

        </div>
      </form>
  </div>

</nav>
<!-- Nav Bar End -->

<!-- Information before form start -->
<div class="section no-pad-bot" id="index-banner">
  <div class="container">
    <br><br>
    <h1 class="header center black-text">Add Data</h1>
    <div class="row center">
      <!-- Here is where the check to see if you came here by error is made-->
      <?php
        global $error;
          if(!$error)
            echo "<h5 class=\"header col s12 light\">Here you can put data for other users to search</h5>";
          else
            echo "<h5 class=\"header col s12 light\" style=\"color: red\">It seems that there was an error with your last entry, please reenter your data</h5>";
      ?>
    </div>
    <br><br>

  </div>
</div>
<!-- Information before form end -->

<!--input form start--> 
<div class="row container">
    <form class="col s12" action="backendAddData.php" method = "post">
      <div class="row">
        <div class="input-field col s6">
          <input id="first_name" type="text" class="validate" name = "firstName">
          <label for="first_name">First Name</label>
        </div>
        <div class="input-field col s6">
          <input id="last_name" type="text" class="validate" name = "lastName">
          <label for="last_name">Last Name</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="email" type="email" class="validate" name = "email">
          <label for="email">Email</label>
        </div>
      </div>
      <div class="row">
        <div class="col s5"><p></p></div>
          <button class ="btn waves-effect waves-light red darken-1" type = "submit" name = "action">Submit
            <i class ="material-icons right">send</i>
          </button>
      </div> 

    </form>
  </div>
<!-- input form end -->

<!-- Start of Footer -->
  <footer class="page-footer purple lighten-1">
    <div class="container">
      <div class="row">
        <div class="col l9 s12">
          <h5 class="white-text">Creator Bio</h5>
          <p class="grey-text text-lighten-4">My name is Joseph Villanueva and I am a new graduate from Santa Clara University in the field of Computer Engineering. I am still looking for full-time employment. This was a test web app made for an interview and was made with Materialize, a CSS Framework, PHP, and mySQL. Please contact me if you have any further questions</p>


        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Connect</h5>
          <ul>
            <li><a class="white-text" href="https://www.linkedin.com/in/javillanueva1">LinkedIn</a></li>
            <li><p class="white-text" href="#!">Email: javillanueva1@gmail.com</p></li>
            <li><p class="white-text" href="#!">Phone #: (206)306-5853</p></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Made by Joseph Villanueva
      </div>
    </div>
  </footer>

<!--End of Footer-->


  <!--  Scripts (Put at end to increase performance)-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>

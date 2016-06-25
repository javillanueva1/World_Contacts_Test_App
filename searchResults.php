<!--This is used for the search results front end page-->
<?php 
  include 'backendSearch.php';
?>

<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Starter Template - Materialize</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>

<!--Start of Nav bar-->
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
<!-- End of Nav bar-->

<!-- Start of header information (what page your on, what you searched)-->
<div class="section no-pad-bot" id="index-banner">
  <div class="container">
    <br><br>
    <h1 class="header center black-text">Search Results</h1>
    <div class="row center">
      <h5 class="header col s12 light">Here are your search results for <?php echo $searchTerm; ?></h5>
    </div>
    <br><br>

  </div>
</div>
<!--End of header information-->

<!--Start of search results table-->
<div class = "container">
  <table cellspacing='0' style = "margin-bottom: 3cm" class = "centered">
<!--This is what is called to print the table. The table function is in backendSearch.php-->
        <?php printSearchResults(); ?>
  </table>
</div>
<!--End of search results table-->


<!--Start of footer-->
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


  <!-- Scripts (Add at the end of file for increased performance)-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>

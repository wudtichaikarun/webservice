<?php session_start();
$userID = $_SESSION["UserId"];
//echo "userName:".$_SESSION['UserName']." id:".$_SESSION["UserId"]." level:".$_SESSION["UserLevel"] ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>index admin</title>
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" type="text/css" href="css/styleMenu.css">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
  <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
  <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
  <link rel="stylesheet" href="css/nav.css">
  <link rel="stylesheet" href="css/content.css">
  <link rel="stylesheet" href="css/footer.css"> 
  
  <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css" >

</head>
<body onresize="myFunction()">
  <?php
  // Condition check userlevel
  // if (!isset($_SESSION["UserName"]) || $_SESSION["UserLevel"] != 'A') {
  //   echo "<script>";
  //   echo "alert('Error Please Log in');";
  //   echo "window.location = 'iBookLogin.php';";
  //   echo "</script>";
  // } else {
    // Connect database
    include("./inc/connectionSecure.inc.php");

    function db_query ($query) {
      // Connect to the database
      $connection = db_connect(); 
      // Query the database
      $result = mysqli_query($connection,$query);    
      return $result;
    }

    // Nav menu
    include_once('./inc/navAdmin.inc.php')
    ?>

    <article class="article-box">
        <?php
        
        $result = db_query("SELECT * FROM books");
        include_once('./inc/whileLoop.inc.php');
    echo "</article>"; // End of container

    // Close connection
    mysqli_close(db_connect());

  // } // End of else condition check userlevel

  // Footer
  include_once('./inc/footer.inc.php');

  ?>

  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <script src="./node_modules/jquery/dist/jquery.slim.min.js"></script>
  <script src="./node_modules/tether/dist/js/tether.min.js"></script>
  <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

  <script src="dist/sweetalert.min.js"></script>
  <script src="js/jquery.blockUI.js"></script>
  <script src="js/jquery-crud.js" type="text/javascript"></script>

  <script>
    function myFunction() {
      var w = window.outerWidth;
      var h = window.outerHeight;
      if (w <= 700) {
        console.log('width <= 500px')
        $('#carouselExampleControls').hide()
      } else {
        $('#carouselExampleControls').show()
      }
    }
    myFunction()
  </script>
  
</body>
</html>

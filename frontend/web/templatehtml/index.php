<!DOCTYPE html>
<html lang="en">
<head>
	<title> Document  </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 	
  <link rel="stylesheet" href="vendor/angular-material.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="vendor/font-awesome.css">
  <link rel="stylesheet" href="css/1.css">
</head>
<body>
  <div class="container">
    <div class="row menu-top">

      <?php require('widgets/top-nav.php'); ?>
    </div>
    <div class="row">
      <?php require('widgets/main-menu-fix.php'); ?>

    </div>
    <div class="row">
      <div class="col-md-12">
        <?php require('widgets/banner.php'); ?>
      </div>
    </div>

    <div class="row" id="main">
        <div class="col-md-9" id="main-left">
          <?php require('widgets/left-main.php'); ?>
        </div>
        <div class="col-md-3" id="main-right">
          <?php require('widgets/right-main.php'); ?>
        </div>
    </div>

    <footer class="row" id="footer">
      <?php require('widgets/footer.php'); ?>
    </footer>

  </div>

<!-- <img src="https://via.placeholder.com/350x150"> -->
<!-- <img src="https://placehold.it/950x150"> -->

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="vendor/angular-1.5.min.js"></script>				
  <script type="text/javascript" src="vendor/jquery.min.js"></script>
  <script type="text/javascript" src="js/1.js"></script>
</body>
</html>
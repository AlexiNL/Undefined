<!DOCTYPE html>
<?php
  session_start();
      $dbhost = "localhost";
      $dbuser = "root";
      $dbpass = "";
      $dbname = "alexzon";
      $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
        if (mysqli_connect_errno()) {
          die("Database connection failed: " .
            mysqli_connect_error() . 
            " (" . mysqli_connect_errno() . ")"
          );
        }
        $query = "SELECT * FROM producten";
        $result = mysqli_query($connection, $query);
        
        if (!$result) {
          die("Database query failed");
        } 
        
    ?>
<html lang="en">
<head>
  <title>Alexzon</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }
    .panel-footer{
      height: 70px;
      overflow-y:scroll;
    }
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }

  </style>
</head>
<body>


<nav class="navbar navbar-expand-lg nabar-light" style="background-color: #232f3e;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>                
      </button>
      <a><img src="img/amazon-logo.png" class="navbar-brand" href="#"></a>
    </div>
    <div class="kakki collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Products</a></li>
        <li><a href="#">Deals</a></li>
        <li><a href="#">Stores</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">

<?php error_reporting(E_ERROR | E_PARSE); if($_SESSION['admin'] == true){ ?>
        <li><a href="logout.php"><span class="glyphicon glyphicon-user"></span> Logout</a></li>
        <?php } else { ?>
          <li><a href="login.php"><span class="glyphicon glyphicon-user"></span> Login</a></li>
        <?php } ?>

        <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
      </ul>
    </div>
  </div>
</nav>
 <?php
  if($_SESSION['admin'] == true){?>
    <div style="position: fixed;  right:10px;
    bottom:10px; z-index: 1;">
    <a href="add.php"><img style="width: 200px;" src="img/add.png"></a>
    </div>
  <?php } ?>
<div class="container">    
  <div class="row col-sm-12">
    <?php
      while($producten = mysqli_fetch_assoc($result)) { ?>
     <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading"> <?php echo ($producten['naam']); ?> <?php error_reporting(E_ERROR | E_PARSE); if($_SESSION['admin'] == true){ ?> <a href="edit.php?edit=<?php echo ($producten['id']); ?>"><img  src="img/edit.png" style="width: 20px;"></a><img href="edit.php?edit=<?php echo $producten['id']; ?>" src="img/prul.png" style="width: 20px;"><?php }?> </div>
        <div class="panel-body"><img src="img/<?php echo ($producten['img']); ?>" style="width: 100%;"></div>
        <div class="panel-footer"> <?php echo ($producten['beschrijving']); ?></div>
      </div>
    </div>

     <?php }?>
</div>
</div>
<br><br>
<footer class="container-fluid text-center">
  <p>Alexzon.com Copyright</p>  
  <form class="form-inline">Get deals:
    <input type="email" class="form-control" size="50" placeholder="Email Address">
    <button type="button" class="btn btn-danger">Sign Up</button>
  </form>
</footer>

</body>
</html>

<?php
/*
<a href="editarticle.php?editarticle=<?php echo $row['article-id']; ?>">
   if( isset($_GET['delete']) );{
  $id = $_GET['delete'];

$sql = "DELETE from dfgdfh  WHERE id = "$id""
*/
?>
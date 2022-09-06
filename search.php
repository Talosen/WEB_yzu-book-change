<!DOCTYPE html>
<html lang="en">

<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>YZU Book Change</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/clean-blog.min.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="index.html">Home</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="about.html">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.html">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/Library.png') ; margin-bottom:25px">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-heading">
            <h1><i>YZU Public Library</i></h1>
            <!-- <h2 class="subheading">You can choose the book you intrested in and land them from their owner</h2> -->
            <span class="meta">You can choose the book you interested in and land them from their owner</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Post Content -->

  
  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          
          <?php
            $book=$_POST["search"];//

            $database = mysqli_connect( "localhost", "root", "xax123456789" );
            mysqli_select_db($database,"finalproject");
            mysqli_query($database,"SET CHARACTER SET UTF8");
            $query = "SELECT id,content,isbn,photo,email FROM book";
            $query = "SELECT id,content,isbn,photo,email FROM book where id like '%$book%'";
            $con = mysqli_query($database, $query);

            $check=0;
            if (mysqli_num_rows($con) > 0) {
                // 输出数据
                while($row = mysqli_fetch_assoc($con)) {
                    //if($row["id"]==$book){
                        if($check==1)
                          echo "<hr>";
                        echo "<div style='float: left;'>"."<img src='http://192.168.43.181/final_project/".$row["photo"]."' width:'100px' height='100px'>"."</div>"."<div >";
                        echo "書名： " . $row["id"]."<br>"."ISBN：".$row["isbn"]."<br>"."Content: ".$row["content"]. "<br>"."email： " . $row["email"]."</div>";
                        $check=1;
                    //}
                }
            } 
            if($check==0){
              echo "Can't find the book QQ"."<a class='nav-link' href='Library.php'>Return to the back page</a>"/*."<br>"."Or try to use the ISBN"*/;
              /*echo "<form method = 'POST' action = 'searchISBN.php'>
              <input type='text' placeholder = ' search the ISBN of the book in this page...' id = 'search' name = 'search' style = 'width:500px;'>
              <input class = 'button'  type = 'submit' value = 'Search' />
              </form>";*/
          }

          ?>
        </div>
      </div>
    </div>
  </article>
  <hr> 

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <ul class="list-inline text-center">
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
          </ul>
          <p class="copyright text-muted">Copyright &copy; Your Website 2019</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/clean-blog.min.js"></script>

</body>

</html>

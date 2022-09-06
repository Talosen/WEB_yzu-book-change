
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

	<script src="//code.jquery.com/jquery-2.1.4.min.js"></script>	
      <script>
        $(document).ready(function(){
		$("#add").submit(function(e){
			e.preventDefault()
					var book = $('#book').val();
					var content = $('#content').val();
					var isbn = $('#isbn').val();
                    var photo = $('#photo').val();
                    var email = $('#email').val();
					$.ajax({
					  data: {
					  book: book,
					  content:content,
					  isbn:isbn,
                      photo:photo,
                      email:email
						},

					  type: "POST",
					  url: "ajax1.php",
					  //data: "url="+data,
					})
					.success(function(data) {
					    $("#result")[0].innerHTML=data;
					    $("#result").attr("div",data)
					 })
				});
		})
      </script>


</head>

<body id="page-top">

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
<header class="masthead" style="background-image: url('img/change.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-heading">
            <h1>Upload Your Book</h1>
            <span class="meta">Please input the information to upload your book</span>
          </div>
        </div>
      </div>
    </div>
</header>

<article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">

			<section id="signup" class="signup-section">

			<?php
      /**
       * 表單接收頁面
       */
      // 網頁編碼宣告（防止產生亂碼）
      header('content-type:text/html;charset=utf-8');
      // 封裝好的單一 PHP 檔案上傳 function
      include_once 'upload.func.php';
      // 取得 HTTP 文件上傳變數
      $fileInfo = $_FILES['myFile'];
      // 呼叫封將好的 function
      $newName = uploadFile($fileInfo);
      echo($newName);
      echo("<br>".'請將這上面的字串貼到圖檔文字框裡')
      //print_r($newName);
      ?>
					
					<form class = "form" method = "post" action = "#" id="add">
		      	<p class = "headertext">請輸入書名：</p>
            <input type = "text" id="book" name = "book" required /><br>
            <p class = "headertext">圖檔：</p>
		      	<input type = "text" id="photo" name = "photo" required /><br>
	      		<p class = "headertext">ISBN：</p>
			      <input type = "text" id="isbn" name = "isbn" required /><br>
		      	<p class = "headertext">內容</p>
            <textarea style="width:300px;height:100px;"type = "text" id="content" name = "content" required></textarea><br>
            <p class = "headertext">上傳人請輸入自己的email：</p>
		      	<input type = "email" id="email" name = "email" required /><br>
		      	<div>
		      	<input class = "button"  type = "submit" value = "送出(Submit)" />
		      	<input class = "button" type = "reset" value = "清除(Clear)" />
			      <p> <div id="result"></div></span></p>
            </form></div>
            <form class = "form" method = "post" action = "sendmail.php">
              <p class = "headertext">將刪除碼寄至此信箱：</p>
              <input type = "email" id="email" name = "email" required /><br>
              <p class = "headertext">刪除碼：</p>
		        	<input type = "text" id="" name = "deletecode" required /><br>
              <input class = "button"  type = "submit" value = "寄信(Sendmail)" />
              <input class = "button" type = "reset" value = "清除(Clear)" />
              <p>按下寄信按鈕，會自動寄信至您的信箱</p>
             </form>
			    </section>
		    </div>
      </div>
    </div>
  </article>

  
</body>

</html>
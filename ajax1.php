<?php
$book=$_POST['book'];
$content=$_POST['content'];
$isbn=$_POST['isbn'];
$photo=$_POST['photo'];
$email=$_POST['email'];
$result="";


$database = mysqli_connect( "localhost", "root", "xax123456789" );
mysqli_select_db($database,"finalproject");
 mysqli_query($database,"SET CHARACTER SET UTF8");
$query = "SELECT id,content,isbn,photo,email FROM book";
$con = mysqli_query($database, $query);
$check=1;
if (mysqli_num_rows($con) > 0) {
    // 输出数据
    while($row = mysqli_fetch_assoc($con)) {
        //echo "已有書籍： " ."<img src='http://192.168.43.181/". $row["photo"]."'alt='book' height='300' width='250'>"."<br>".$row["id"]."<br>"."ISBN：".$row["isbn"]."<br>"."Content: ".$row["content"]. "<br>"."Email：".$row["email"]. "<br>";
		if($row["isbn"]==$isbn&&$row["email"]==$email){
			//echo "<br>"."same"."<br>";
            $check=0;
            echo "已有書籍： " ."<img src='http://192.168.43.181/final_project/". $row["photo"]."'alt='book' height='300' width='250'>"."<br>".$row["id"]."<br>"."ISBN：".$row["isbn"]."<br>"."Content: ".$row["content"]. "<br>"."Email：".$row["email"]. "<br>";
	
			//echo "<br>"."你的短網址:"."http://web4.gotdns.ch".$row["id"];
		}

    }
} 
if($check==1){
$result=rand();
$doublecheck=0;
    if (mysqli_num_rows($con) > 0) {
        while($row = mysqli_fetch_assoc($con)) {
		    if($row["deletecode"]==$result){
                $doublecheck=1;
                $result=rand();
			//echo "<br>"."你的短網址:"."http://web4.gotdns.ch".$row["id"];
		    }
        }
    } 
    while($doublecheck==1){
        if (mysqli_num_rows($con) > 0) {
            while($row = mysqli_fetch_assoc($con)) {
                if($row["deletecode"]==$result){
                    $doublecheck=1;
                    $result=rand();
                //echo "<br>"."你的短網址:"."http://web4.gotdns.ch".$row["id"];
                }
                else{
                    $doublecheck=0;
                }
            }
        } 
    }


$sql = "INSERT INTO book (id,content,isbn,photo,email,deletecode)
VALUES ('$book','$content','$isbn','$photo','$email','$result')";
 
if ($database->query($sql) === TRUE) {
    echo "<br>"."成功上傳新書"."<br>";
    echo "<img src='http://192.168.43.181/final_project/".$photo."'alt='book' height='300' width='250'>"."<br>"."書名：".$book."<br>"."ISBN：".$isbn."<br>"."Content: ".$content. "<br>"."Email：".$email. "<br>";
} else {
    echo "Error: " . $sql . "<br>" . $database->error;
}

echo "刪除碼：".$result;
//echo "<br>"."你的短網址:"."http://web.cse.org/".$a;
}

?>
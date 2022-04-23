 <?php 
 $server = "localhost";
 $username = "root";
 $password = "";
 $dbname = "testing";
 
 $conn = mysqli_connect($server,$username,$password,$dbname);
 if(!$conn){
     echo 'connection error' . mysqli_connect_error();
 }

 ?>
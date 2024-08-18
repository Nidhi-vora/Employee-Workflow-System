<html>
    <head>
    <body>
      <body>
        <head>
          <style>
             p{
                color:white;
                border-style:solid;
                border-color:#105469;
                background-color:rgb(92,155,250);
                background-color:;
                padding-left:100px;
                margin-left:50px;
                padding:50px;
                margin-right:100px;
                margin-bottom:10px;
                border-radius:20px;
                width:550px;
            }
            </style>
</head>
</body>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</body>
</html>
<?php
$page_name="diaplaydetails";
require 'authentication.php';
//include("include/header_ews.php"); 
include("include/sidebar.php");
include("include/header_ews.php");

?>
  <img src="img_dis.jpg" width="250" height="200" style="margin-left:470px;margin-bottom:30px">
<?php
$uid = $_SESSION['admin_id'];
  $COUNT=1;
  $conn=mysqli_connect("localhost","root","","etmsh")or die("connection failer");
   $sql="SELECT * FROM tbl_admin WHERE user_id=$uid";
   $result=$conn->query($sql);
   if($result->num_rows>0)
   {
     while($row=$result->fetch_assoc())
     { //`user_id`, `fullname`, `username`, `email`, `password`
        echo "<center><tr><p>";
          echo "<th>user id   :    ".$row["user_id"]."</th>";
          echo "<th> <br> user name :  ".$row["username"]."</th>";
          echo "<th> <br> full name : ".$row["fullname"]."</th>";
          echo "<th> <br> email id : ".$row["email"]."</th>";
          if($row["user_role"]==1)
          {
            $ur="ADMIN";

          }
          else{
            $ur="EMPLOYEE";
          }
          echo "<th><br> user role : ".$ur."</th>";
          
          echo "<br><br></p></tr></center>";
        //  $COUNT=$row["id"];
     }
   }
   
   else{
    echo "0 result found ";
   }
    $COUNT=$COUNT+1;
    $max=$COUNT;
    if(isset($_POST['send']))
    {
        if(isset($_POST['username']))
        {
        $name=$_POST['username'];
        $msg=$_POST['msg'];
        //$msg1=$_SESSION["chatname"];
        
$msg1 = $_SESSION['name'];
        
        $res=mysqli_query($conn,"INSERT INTO tbl_chh VALUES($COUNT,'$msg1','$msg')");


        
        }
        
    }
   $conn->close();
?>
<!-- <form>
    <center>
    <input type="text" name="username" ><br><br>
    <input type="text" name="msg">
    <input type="submit" name="send">
</center>
</form> -->

</body>
</html>
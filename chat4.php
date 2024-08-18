<html>
    <head>
        <style>
            body
            {
                background-color:black;
                color:white;
            }
            div{
                color:white;
                background-color:grey;
                padding-left:100px;
                margin-left:50px;
                margin-right:100px;
                margin-bottom:10px;
            }
            </style>
</head>
    <body>
        <h2><center> GROUP CHAT </center> </h2>
        <form action="" method="POST">
    <center>
    <!-- <input type="text" name="username" ><br><br> -->
    <input type="text" name="msg"> 
    <input type="submit" name="send">
</center>
</form>
<?php

require 'authentication.php'; 
include("include/header_ews.php");
  $COUNT=1;
  $conn=mysqli_connect("localhost","root","","etmsh")or die("connection failer");
   $sql="SELECT * FROM tbl_chh ORDER BY ID";
   $result=$conn->query($sql);
   if($result->num_rows>0)
   {
     while($row=$result->fetch_assoc())
     {
        echo "<div>";
          echo "".$row["username"];
          echo " : ".$row["msg"];
          echo "<br><br></div>";
          $COUNT=$row["id"];
     }
   }
   
   else{
    echo "0 result found ";
   }
    $COUNT=$COUNT+1;
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
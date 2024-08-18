<html>
    <?php
    $page_name="chat2.php";
    require 'authentication.php'; 
    include("include\sidebar.php");
   // include("include/header_ews.php");
    
    ?>
    <head>
        <style>
            body
            {
                background-color:grey;
                color:white;
            }
            p{
                color:white;
                border-style:solid;
                border-color:white;
                background-color:#105469;
                padding:20px;
                margin-left:550px;
                margin-right:100px;
                margin-bottom:10px;
                font-weight:bold;
                border-radius:20px;
                width:550px;
            
            }
            .admin{
                border-style:solid;
                border-color:#105469;
                margin-left:50px;
                background-color:white;
                color:#105469;
            }
            .employee
            {

            }
            </style>
</head>
    <body>
        <h2><center style="color:white"> GROUP CHAT </center></h2>
        <form action="" method="POST">
    <center>
    <!-- <input type="text" name="username" ><br><br> -->
    <input type="text" name="msg" style="color:black;border-radius:10px;padding-left:50px;padding-right:50px"> 
    <input type="submit" name="send" style="color:#105469;font-weight:bold;" value="send">
</center><br><br><br> 
</form>
<?php
// $page_name="chat2.php";
// require 'authentication.php'; 
// include("include\sidebar.php");
// include("include/header_ews.php");
  $COUNT=1;
  $conn=mysqli_connect("localhost","root","","etmsh")or die("connection failer");
   $sql="SELECT * FROM tbl_chh ORDER BY ID";
   $result=$conn->query($sql);
   if($result->num_rows>0)
   {
     while($row=$result->fetch_assoc())
     {
        $class=$row["username"];
        echo "<p class=$class>";
          echo "".$row["username"];
          echo " : ".$row["msg"];
          echo "<br><br></p>";
          $COUNT=$row["id"];
     }
   }
   
   else{
    echo "0 result found ";
   }
    $COUNT=$COUNT+1;
    if(isset($_POST['send']))
    {
        if(isset($_POST['msg']))
        {
       // $name=$_POST['username'];
        $msg=$_POST['msg'];
        //$msg1=$_SESSION["chatname"];
        
$msg1 = $_SESSION['name'];
        
        $res=mysqli_query($conn,"INSERT INTO tbl_chh VALUES($COUNT,'$msg1','$msg')");
        }
    }
   // include("include/footer.php");
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